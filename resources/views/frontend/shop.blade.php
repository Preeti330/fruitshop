@extends('frontend.layouts.main')

@section('main-container')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container-fluid py-5 mb-5 mt-5 furits">
    <div class="container py-5">

        <h1 class="mb-4 text-warning">Fresh fruits shop</h1>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">

                <div class="input-group w-100 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
            <div class="col-6"></div>
            <div class="col-xl-3">
                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                    <label for="fruits">Default Sorting:</label>
                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                        <option value="volvo">Nothing</option>
                        <option value="saab">Popularity</option>
                        <option value="opel">Organic</option>
                        <option value="audi">Fantastic</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <h4>Categories</h4>
                    <ul class="list-unstyled fruite-categorie">
                        @foreach($data['cat'] as $category)
                        <li class="pb-3">
                            <div class="d-flex justify-content-between fruite-name">
                                <a href="{{ url('/shop/' . $category->id) }}" class="category-link" data-category-id="1"><span>{{ $category->category_name }}</span></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    @foreach($data['product'] as $prod)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{url($prod->image_path)}}" class="img-fluid w-100 rounded-top" alt="{{$prod->product_name}}">
                            </div>
                            <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>{{$prod->product_name}}</h4>
                                <p>{{$prod->desc}}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">{{$prod->points}}</p>
                                    <!-- <a href="" class="btn border border-secondary rounded-pill px-3 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-shopping-bag me-2 text-primary" data-product-id="{{$prod->id}}"></i> Add to cart</a> -->
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-product-id="{{$prod->id}}" data-price="{{$prod->price}}">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add To Cart</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="myFrom">
                        @csrf
                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Add Qty You Want to order in kgs</div>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="product_id" class="form-label">Product ID</label>
                            <input type="number" class="form-control" id="product_id" readonly>
                        </div>


                        <div class="mb-3">
                            <label for="product_id" class="form-label">Price Per Unit</label>
                            <input type="number" class="form-control" id="price" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="product_id" class="form-label">Total Price</label>
                            <input type="number" class="form-control" id="total_price" readonly>
                        </div>


                        <h4>Please add your details to procced</h4>
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile_Number</label>
                            <input type="text" class="form-control" id="mobile">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location">
                        </div>

                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveCart()">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @endsection