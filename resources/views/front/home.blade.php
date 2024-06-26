@extends('front.layouts.app')

@section('content')
    <section class="section-1">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('front-assets/images/carousel-1.jpg') }}" class="d-block w-100" alt=""> 

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-1-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-1.jpg') }}" />
                        <img src="{{ asset('front-assets/images/carousel-1.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Car Product</h1>
                            <p class="mx-md-5 px-5">Experience the best car wash service in Pakistan with state-of-the-art equipment and unparalleled customer care. Get your car cleaned to perfection, right at your doorstep.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#CATEGORIES">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    
                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-2-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-2.jpg') }}" />
                        <img src="{{ asset('front-assets/images/carousel-2.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Car Detailing</h1>
                            <p class="mx-md-5 px-5">Transform your car with our premium detailing services, offering meticulous cleaning and restoration for every vehicle. Enhance your driving experience with a spotless finish, inside and out.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#FEATURED_PRODUCTS">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                     <img src="{{ asset('front-assets/images/carousel-3.jpg') }}" class="d-block w-100" alt=""> 

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-3-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-3.jpg') }}" />
                        <img src="{{ asset('front-assets/images/carousel-2.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Book Online and Get Flat 40% Off on Services & Products</h1>
                            <p class="mx-md-5 px-5">Enjoy an exclusive 40% discount when you book our car wash services or purchase products online. Elevate your car care routine with premium services and top-quality products at unbeatable prices.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#CATEGORIES">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Quality Services</h2>
                    </div>                    
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Fast Service</h2>
                    </div>                    
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">1-Day Trial</h2>
                    </div>                    
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">24/7 Support</h2>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <section id="CATEGORIES" class="section-3">
        <div class="container">
            <div class="section-title">
                <h2>Car Categories</h2>
            </div>           
            <div class="row pb-3">
                @if(getCategories()->isNotEmpty())
                @foreach(getCategories() as $category)

                <div class="col-lg-3">
                    <div class="cat-card">
                        <div class="left">
                            @if ($category->image != " ")
                            <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" class="img-fluid">
                                
                            @endif
                        </div>
                        <div class="right">
                            <div class="cat-data">
                                <h2>{{ $category->name }}</h2>
                                {{-- <p>100 Products</p> --}}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif
                
                
                </div>
            </div>
        </div>
    </section>
    
    <section id="FEATURED_PRODUCTS" class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Featured Services/Products</h2>
            </div>    
            <div class="row pb-3">
                @if (isset($featuredProducts) && $featuredProducts->isNotEmpty())
                    @foreach ($featuredProducts as $product)
                        <div class="col-md-3">
                            <div class="card product-card">
                                <div class="product-image position-relative">
                                    <a href="{{ route("front.product",$product->slug) }}" class="product-img">
                                        <!-- Manually specify the image paths here -->
                                        @if($loop->iteration == 1)
                                            <img class="card-img-top" src="{{ asset('front-assets/images/product-1.jpg') }}" alt="">
                                        @elseif($loop->iteration == 2)
                                            <img class="card-img-top" src="{{ asset('front-assets/images/product-2.jpg') }}" alt="">
                                        @elseif($loop->iteration == 3)
                                            <img class="card-img-top" style="height: 24.5rem;" src="{{ asset('front-assets/images/product-3.jpg') }}" alt="">

                                        @elseif($loop->iteration == 4)
                                        <img class="card-img-top" src="{{ asset('front-assets/images/product-4.jpg') }}" alt="">
                                    @endif
                                    </a>
                                    
                                    <a class="wishlist" href="222"><i class="far fa-heart"></i></a>                            
                                    <div class="product-action">
                                        <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $product->id }});">
                                            <i class="fa fa-shopping-cart"></i> book in Quantity
                                        </a>                            
                                    </div>
                                </div>                        
                                <div class="card-body text-center mt-3">
                                    <a class="h6 link" href="product.php">{{ $product->title }}</a>
                                    <div class="price mt-2">
                                        <span class="h5"><strong>PKR-{{ $product->price }}</strong></span>
                                        @if($product->compare_price > 0)
                                            <span class="h6 text-underline">
                                                <del>{{ $product->compare_price }}</del>
                                            </span>
                                        @endif
                                    </div>
                                </div>                        
                            </div>                                               
                        </div>
                    @endforeach
                @else
                    <p>No featured products available.</p>
                @endif
            </div>  
        </div>
    </section>

@endsection
