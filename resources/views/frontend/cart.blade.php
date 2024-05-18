@extends('frontend.layouts.main')
@section('main-container')
<br>
<!-- Cart Page Start -->
<div class="container-fluid py-10 " style="margin-top: 100px;">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price Per Item</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- {{$cartdata}} -->
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
                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div> -->

        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart<span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">{{$cart_total}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping</h5>
                            <div class="">
                                <p class="mb-0">Flat rate: {{$shipping}} Rs,</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping Location</h5>
                            <div class="">
                                <p class="mb-0">Location:{{$loc}}</p>
                         
                            </div>
                        </div>

                        </div>
                        
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4"> {{$cart_total}}</p>
                    </div>
                    <!-- <a class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" onclick="cartClick(2)"  id="checkout"  onclick="cartClick(2)">Proceed Checkout</a> -->

                    <a id="checkout" class="dropdown-item" onclick="cartClick(2)">Chackout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

@endsection