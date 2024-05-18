@extends('frontend.layouts.main')
@section('main-container')

<!-- Checkout Page Start -->
<div class="container-fluid py-5" style="margin-top: 100px;">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">First Name<sup>*</sup></label>
                                <input type="text" id="f_name"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Last Name<sup>*</sup></label>
                                <input type="text" class="form-control" id="l_name">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-item">
                        <label class="form-label my-3"> Name<sup>*</sup></label>
                        <input type="text" class="form-control" "">
                    </div> -->
                    <div class="form-item">
                        <label class="form-label my-3">Address <sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="House Number Street Name" id="address" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Town/City<sup>*</sup></label>
                        <input type="text" class="form-control" id="city" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Country<sup>*</sup></label>
                        <input type="text" class="form-control" id="cn" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                        <input type="text" class="form-control" id="zip" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Mobile<sup>*</sup></label>
                        <input type="tel" class="form-control" id="mobile" required>
                    </div>
                    <!-- <div class="form-item">
                        <label class="form-label my-3">Email Address<sup>*</sup></label>
                        <input type="email" class="form-control" >
                    </div> -->
                  
                    <hr>
                   
                    <div class="form-item">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Oreder Notes (Optional)" id="fb"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartdata as $data)
                                <tr>
                                    <td scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $data->image_path }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="{{ $data->product_name }}">
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $data->product_name }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $data->qty }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $data->unit_per_item }} Rs</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $data->total_price }} Rs</p>
                                    </td>

                                </tr>
                                @endforeach


                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark py-3">Total QTY</p>
                                    </td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">{{$qty}}</p>
                                        </div>
                                    </td>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark py-3">Subtotal</p>
                                    </td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">{{$cart_total}}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <!-- <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-4">Shipping</p>
                                            </td>
                                            <td colspan="3" class="py-5">
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping-1" value="Shipping">
                                                    <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                                </div>
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-2" name="Shipping-1" value="Shipping">
                                                    <label class="form-check-label" for="Shipping-2">Flat rate: $15.00</label>
                                                </div>
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-3" name="Shipping-1" value="Shipping">
                                                    <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                                </div>
                                            </td>
                                        </tr> -->
                                <!-- <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">$135.00</p>
                                                </div>
                                            </td>
                                        </tr> -->
                            </tbody>
                        </table>
                    </div>


                        <div class="form-check form-check-inline" style="margin-top: 20px;">
                            <input class="form-check-input bg-primary border-0" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" onchange="paymentType(event)">
                            <label class="form-check-label" for="inlineRadio1">Direct Bank Transfer</label>
                            <p class="text-start text-dark">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                        <hr>
                    <div class="form-check form-check-inline" style="margin-top: 20px;">
                        <input class="form-check-input bg-primary border-0" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" onchange="paymentType(event)">
                        <label class="form-check-label" for="inlineRadio2">Check Payments</label>

                    </div>
                    <hr>
                    <div></div>
                    <div class="form-check form-check-inline" style="margin-top: 20px;">
                        <input class="form-check-input bg-primary border-0" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" onchange="paymentType(event)">
                        <label class="form-check-label" for="inlineRadio3">Cash On Delivery</label>
                    </div>
                    <hr>
                    <div></div>

                    <div class="form-check form-check-inline text-start my-3"" style=" margin-top: 20px;">
                        <input class="form-check-input bg-primary border-0" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4" onchange="paymentType(event)">
                        <label class="form-check-label" for="inlineRadio3">PayPal</label>
                    </div>
                    <hr>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4 mt-10" style="margin-top: 20px;">
                        <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" onclick="order()">Place Order</button>
                    </div>
                </div>


            </div>
    </div>
    </form>
</div>
</div>

@endsection