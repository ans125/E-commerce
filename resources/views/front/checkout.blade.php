<!DOCTYPE html>
<html class="no-js" lang="en_AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Service It</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />
	

	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/service.css') }}" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
{{-- @section('content') --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0" style="padding-top: 2rem !important;}">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Shop</a></li>
                <li class="breadcrumb-item">Checkout</li>
                <ul style="display: flex; align-items: center; margin: -12px 40px; padding: 0px 0px;">
                    <!-- Other menu items -->
                    @auth
                    <li style="margin-right: 10px;">Welcome, {{ auth()->user()->name }}</li>
                    <li style="margin-right: 10px;">
                        <form method="POST" action="{{ route('account.logout') }}">
                            @csrf
                            <button style="background-color: #f7ca0d; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;" type="submit">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </ol>
        </div>
    </div>
    
</section>

<section class="section-9 pt-4">
    <div class="container">
        <form id="orderForm" name="orderForm" action="{{ route('front.processCheckout') }}" method="post">
            @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="sub-title">
                    <h2>Shipping Address</h2>
                </div>
                <div class="card shadow-lg border-0">
                    <div class="card-body checkout-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                    <p></p>
                                </div>            
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                    <p></p> </div>            
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    <p></p></div>            
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="mb-3">
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select a Country</option>
                                        <option value="1">India</option>
                                        <option value="2">UK</option>
                                    </select>
                                </div>            
                            </div> --}}
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea name="address" id="address" cols="30" rows="3" placeholder="Address" class="form-control"></textarea><p></p>
                                </div>            
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" name="appartment" id="appartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)">
                                </div>            
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="city" id="city" class="form-control" placeholder="City">
                                    <p></p> </div>            
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="state" id="state" class="form-control" placeholder="State">
                                    <p></p></div>            
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip">
                                    <p></p></div>            
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    <p></p></div>            
                            </div>
                            <!-- Booking Time Input -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="booking_time">Booking Time</label>
                                    <input type="time" name="booking_time" id="booking_time" class="form-control" min="05:00" max="21:00" required>
                                    <p></p>
                                </div>            
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    </div>            
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="col-md-4">
                <div class="sub-title">
                    <h2>Order Summary</h2>
                </div>
                <div class="card cart-summary">
                    <div class="card-body">
                        @foreach (Cart::content() as $item)
                            <div class="d-flex justify-content-between pb-2">
                                <div class="h6">{{ $item->name }} X {{ $item->qty }}</div>
                                <div class="h6">PKR {{ $item->price * $item->qty }}</div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between summary-end">
                            <div class="h6"><strong>Subtotal</strong></div>
                            <div class="h6"><strong>PKR {{ Cart::subtotal() }}</strong></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="h6"><strong>Shipping</strong></div>
                            <div class="h6"><strong>PKR 0</strong></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2 summary-end">
                            <div class="h5"><strong>Total</strong></div>
                            <div class="h5"><strong>PKR {{ Cart::subtotal() }}</strong></div>
                        </div>
                    </div>
                </div>   
                <div class="card payment-form">
                    <h3 class="card-title h5 mb-3">Payment Method</h3>
                    <div class="card payment-form">
                        <div class="">
                            <input checked type="radio" name="payment_method" value="cod" id="payment_method_one">
                            <label for="payment_method_one" class="form-check-label">Cash After Work</label>
                        </div>
                        {{-- <div class="form-check">
                            <input type="radio" name="payment_method" value="stripe" id="payment_method_two">
                            <label for="payment_method_two" class="form-check-label">Stripe</label>
                        </div> --}}
                    </div>                        
                    {{-- <div class="card-body p-0 ">
                        <div class="mb-3">
                            <label for="card_number" class="mb-2">Card Number</label>
                            <input type="text" name="card_number" id="card_number" placeholder="Valid Card Number" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="expiry_date" class="mb-2">Expiry Date</label>
                                <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYYY" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="mb-2">CVV Code</label>
                                <input type="text" name="cvv" id="cvv" placeholder="123" class="form-control">
                            </div>
                        </div> --}}
                        <div class="pt-4">
                            {{-- <a href="#" class="btn-dark btn btn-block w-100">Pay Now</a> --}}
                            <button class="btn-dark btn btn-block w-100" type="submit">Book Now</button>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
{{-- @endsection --}}
@section('customjs')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $("#orderForm").submit(function(event){
            event.preventDefault();

            $('button[type="submit"]').prop('disabled',true);

            $.ajax({
                url:'{{ route('front.processCheckout') }}',
                type:'post',
                data: $(this).serializeArray(),
                dataType : 'json',
                success:function(response){
                    var errors = response.errors;


            $('button[type="submit"]').prop('disabled',false);

                    // front.thankyou
                    if(response.status == false){


                    if(errors.first_name){
                        $("#first_name").addClass('is-invalid')
                        .siblings("p")
                        .addClass('invalid-feedback')
                        .html(errors.first_name);


                    } else {
                        $("#first_name").removeClass('is-invalid')
                        .siblings("p")
                        .removeClass('invalid-feedback')
                        .html('');
                    }
                    if(errors.last_name){
                        $("#last_name").addClass('is-invalid')
                        .siblings("p")
                        .addClass('invalid-feedback')
                        .html(errors.last_name);


                    }else{
                        $("#last_name").removeClass('is-invalid')
                        .siblings("p")
                        .removeClass('invalid-feedback')
                        .html('');
                    }
                    if(errors.email){
                        $("#email").addClass('is-invalid')
                        .siblings("p")
                        .addClass('invalid-feedback')
                        .html(errors.email);


                    }else{
                        $("#email").removeClass('is-invalid')
                        .siblings("p")
                        .removeClass('invalid-feedback')
                        .html('');
                    }

                    }  else  {
                        window.location.href="{{ route('front.thankyou') }}";
                    }

                }
                

            });
         });

    </script>

@endsection
</body>
</html>
