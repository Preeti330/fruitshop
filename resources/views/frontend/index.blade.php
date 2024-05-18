@extends('frontend.layouts.main')

@section('main-container')
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-warning">100% Organic Foods</h4>
                <h1 class="mb-5 display-12 text-success">Organic Veggies & Fruits Foods</h1>
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" placeholder="Search">
                    <button type="submit" class="btn btn-success border-2 border-secondary py-1 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;text-align: center;">Submit Now</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('frontend/img/hero-img-1.png')}}" class="d-block w-100" alt="Fruits">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>

                        </div>

                        <div class="carousel-item">
                            <img src="{{asset('frontend/img/hero-img-2.jpg')}}" class="d-block w-100" alt="Flowers">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Vegitables</a>
                        </div>
                    </div>
                    <button class="carousel-control-prev curbtn" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next curbtn" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Free Shipping</h5>
                        <p class="mb-0">Free on order over $300</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Security Payment</h5>
                        <p class="mb-0">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>30 Day Return</h5>
                        <p class="mb-0">30 day money guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>24/7 Support</h5>
                        <p class="mb-0">Support every time fast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->


<!-- Fruits Shop Start-->
<!-- <div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-3">
                <h1 class="text-warning">Our Organic Products</h1>
            </div>
            <div class="col-9 serach">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Fruits</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Vegitbles</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">reedy</div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">preeti</div>
                    <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">preeti</div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Fruits Shop End-->


     <!-- Featurs Start -->
     <div class="container-fluid service py-5">
            <div class="container py-5">
              <div class="row ">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="backgroundimg border border-bottom-0 rounded">
                        <img src="{{asset('frontend/img/featur-1.jpg')}}" alt="" class="img-fluid rounded-top w-100">

                    </div>
                    <div class="text text-center bg-warning rounded">
                        <div class="overply bg-success">
                            <h5 class="text-white">Fresh Apples</h5>
                            <h3 class="mb-0">20% OFF</h3>
    
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="backgroundimg border border-bottom-0 rounded">
                        <img src="{{asset('frontend/img/featur-2.jpg')}}" alt="" class="img-fluid rounded-top w-100">

                    </div>
                    <div class="text text-center bg-dark rounded">
                        <div class="overply bg-light">
                            <h5 class="text-sucess">Fresh Apples</h5>
                            <h3 class="mb-0">20% OFF</h3>
    
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="backgroundimg border border-bottom-0 rounded">
                        <img src="{{asset('frontend/img/featur-3.jpg')}}" alt="" class="img-fluid rounded-top w-100">

                    </div>
                    <div class="text text-center bg-success rounded">
                        <div class="overply bg-warning">
                            <h5 class="text-white">Fresh Apples</h5>
                            <h3 class="mb-0">20% OFF</h3>
    
                        </div>
                    </div>
                </div>


              </div>
            </div>
        </div>
        <!-- Featurs End -->



@endsection