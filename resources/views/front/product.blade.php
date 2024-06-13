@extends('front.layouts.app')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0" style="
                padding-top: 2rem !important;
            }
            ">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Shop</a></li>
                <li class="breadcrumb-item">{{ $product->title }}</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-7 pt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('front-assets/images/product-1.jpg') }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('front-assets/images/product-1.jpg') }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('front-assets/images/product-1.jpg') }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{ asset('front-assets/images/product-1.jpg') }}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="bg-light right">
                    <h1>{{ $product->title }}</h1>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">( Reviews)</small>
                    </div>
                    @if($product->compare_price > 0)
                        <h2 class="price text-secondary"><del>{{ $product->compare_price }}</del></h2>
                    @endif
                    <h2 class="price">PKR {{ $product->price }}</h2>
                    {{-- <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab"> --}}
                        <p>At Service It, our exterior car wash service is designed to give your vehicle a thorough clean, removing dirt, grime, and other contaminants from the exterior surfaces. Our trained professionals use high-quality cleaning products and equipment to ensure a sparkling finish without causing any damage to your vehicle's paintwork.</p>
                    {{-- </div> --}}
                    
                    <a href="javascript:void(0);" onclick="addToCart({{ $product->id }});" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> &nbsp;Book Now</a>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="bg-light">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            {{ $product->description }}
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            <h3>Shipping Policy</h3>
                            <p>At Service It, we strive to provide prompt and reliable shipping services to our valued customers. Once your order is confirmed, we aim to dispatch it within 24 hours. Delivery times may vary depending on your location, but we work tirelessly to ensure your products reach you in a timely manner. For any inquiries regarding shipping, feel free to contact our customer service team.</p>
                        
                            <h3>Return Policy</h3>
                            <p>We want you to be completely satisfied with your purchase from Service It. If for any reason you are not happy with your order, you may return it within 30 days for a full refund or exchange. Please ensure the item is in its original condition with all packaging intact. For detailed instructions on how to initiate a return, please visit our Returns page or contact our customer service team.</p>
                        
                            <h3>Cash on Delivery (COD) Policy</h3>
                            <p>Service It offers a convenient Cash on Delivery (COD) option for customers who prefer to pay upon receiving their order. Simply select the COD option at checkout, and our delivery personnel will collect payment when delivering your items. Please note that COD is available for orders within certain regions and may be subject to additional charges. For any questions regarding COD, please contact our customer service team.</p>
                        </div>
                        
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        </div>
                    </div>
                </div>
            </div> 
        </div>           
    </div>
</section>
@endsection

@section('customjs')
<script type="text/javascript">

</script>
@endsection
