<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Order_items;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index($id=null){
        if($id){
            $where="  where category_id=".$id;
        }else{
            $where='';
        }
       
        $cat = DB::table('product_categories')->get();
        // $product = DB::table('products').$where.->get();
        $sql = "SELECT * FROM products".$where;
        $product = DB::select($sql);
        $data['cat']=$cat;
        $data['product']=$product;
        if(!empty($data)){
            
            return view('frontend.shop',['data'=>$data]);
        }else{
            return redirect()->route('/shop')->with('error', 'No Data Found');
        }
    }

    public function getcatgories(){
        $cat = DB::table('product_categories')->get();
        return view('frontend.shop',['cat'=>$cat]);
        // return $users;
    }
  
    
    public function saveCart(Request $request)
    {
        try {
            // Decode JSON payload
            $formData = $request->json()->all();
    
            // Validate the request data
            $validated = $request->validate([
                'username' => 'required|max:255',
                'location' => 'required',
                'mobile' => 'required|regex:/^[0-9]{10,15}$/',
                'qty' => 'required|integer',
               
            ]);
    
            // $user = 
            // DB::table('users')->where('mobile', $formData['mobile'])->first();
            $user = User::where('mobile', $formData['mobile'])->first();
           
            if(empty($user)){
                $user = new User();
                $user->name = $formData['username'];
                $user->mobile = $formData['mobile'];
            }
            $user->location = $formData['location'];
           

            if ($user->save()) {
               
                // If user saved successfully, save cart details
                $cart = new Cart();
                $cart->product_id = $formData['product_id'];
                $cart->unit_per_item    = $formData['unit_per_item'];
                $cart->total_price      = $formData['total_price'];
                $cart->user_id = $user->id;
                $cart->qty = $formData['qty'];
                $cart->status = 1; // Assuming 1 means 'active' or 'in cart'
                $cart->save();
    
                $response=['user_id'=>$user->id];
                // Return success response
                return response()->json(['msg' => 'Cart saved successfully!', 'data' => $response], 201);
            } else {
                // If user save failed, return an error response
                return response()->json(['msg' => 'Failed to save user!'], 500);
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error saving cart: ' . $e->getMessage());
    
            // Return an error response
            return response()->json(['msg' => 'Internal Server Error', 'error' => $e->getMessage()], 500);
        }
    }


    public function cart(Request $req){

        $userId=$req->user_id;
        $cartItems = DB::table('cart as c')
                    ->join('products as p', 'p.id', '=', 'c.product_id')
                    ->join('users as u', 'u.id', '=', 'c.user_id')
                    ->select('u.id as user_id', 'u.name', 'u.mobile', 'c.qty', 'c.id as cart_id', 'c.total_price', 'p.id as product_id', 'p.product_name', 'c.total_price as total_price', 'c.unit_per_item','p.image_path')
                    ->where('u.id', $userId)
                    ->get();

                    $sql = "SELECT SUM(c.total_price) AS total_price
                    FROM cart AS c 
                    WHERE c.user_id = :userId";
    
            $cartSummary = DB::select($sql, ['userId' => $userId]);
            $shipping = 100;
            $total= $cartSummary['0']->total_price + $shipping;

            $users=User::find($userId);
            $loc  = $users->location;
            $mobile = $users->mobile;

        // return  view('frontend.cart',['cartdata'=>$cartItems]);
        return view('frontend.cart',['cartdata'=>$cartItems,'cart_total'=>$total,'location'=>$loc,'mobile'=>$mobile,'loc'=>$loc,'shipping'=>$shipping]);
        
    }

    public function checkout(Request $req){

      try{
        $formData = $req->json()->all();

       
        $validated = $req->validate(
            [
                'user_id'=>'required',
                'address'=>'required',
                'town'=>'required',
                'country'=>'required',
                'zip'=>'required',
                'mobile'=>'required',
                'payment_type'=>'required',                   
            ]
        );

     

        $users = User::find($formData['user_id']);
        if(empty($users)){
            return response()->json(['error' => 'User Not Found', 500]);
        }else{
 
            $cartItem = DB::table('cart as c')
                   ->where('c.user_id', $formData['user_id'])
                   ->where('c.status', 1)
                   ->get();
            $total = 0;
            $shipping = 100;
        
            if(!empty($cartItem)){

                $sql = "SELECT SUM(c.total_price) AS total_price,count(qty) as qty
                FROM cart AS c 
                WHERE c.user_id = :userId and c.status=1";

                $cartSummary = DB::select($sql, ['userId' => $formData['user_id']]);
                $shipping = 100;
                $total= $cartSummary['0']->total_price + $shipping;
                $qty  = $cartSummary['0']->qty;
                
             $order1= new Order();
             $order1->user_id=$formData['user_id'];
             $order1->qty=$qty;
             $order1->total_price=$total;
             if($order1->save()){

                foreach($cartItem as $val){
                    $order = new Order_item();
                    $order->cart_id=$val->id;
                    $order->user_id=$val->user_id;
                    $order->unit_price=$val->unit_per_item;
                    $order->qty=$val->qty;
                    $order->total_price=$val->total_price;
                    $order->order_id=$order1->id;
                    $order->save();

                    $cart = Cart::find($val->id);
                    $cart->status=2;
                    $cart->save();

                 } 

                 return response()->json(['msg' => 'Your order placed successfully!'], 201);

             }

            }
        }


      }catch(Exception $e){
         // Log the error for debugging
         Log::error('Error saving cart: ' . $e->getMessage());
    
         // Return an error response
         return response()->json(['msg' => 'Internal Server Error', 'error' => $e->getMessage()], 500);
      }


    }

    public function checkoutpage(Request $req){

        $userId=$req->user_id;
        $cartItems = DB::table('cart as c')
                    ->join('products as p', 'p.id', '=', 'c.product_id')
                    ->join('users as u', 'u.id', '=', 'c.user_id')
                    ->select('u.id as user_id', 'u.name', 'u.mobile', 'c.qty', 'c.id as cart_id', 'c.total_price', 'p.id as product_id', 'p.product_name', 'c.total_price as total_price', 'c.unit_per_item','p.image_path')
                    ->where('u.id', $userId)
                    ->get();

    //    return view('frontend.checkout');

            $sql = "SELECT SUM(c.total_price) AS total_price,count(qty) as qty
            FROM cart AS c 
            WHERE c.user_id = :userId";

            $cartSummary = DB::select($sql, ['userId' => $userId]);
            $shipping = 100;
            $total= $cartSummary['0']->total_price + $shipping;
            $qty  = $cartSummary['0']->qty;

            return view('frontend.checkout',['cartdata'=>$cartItems,'cart_total'=>$total,'qty'=>$qty]);

    }


}
