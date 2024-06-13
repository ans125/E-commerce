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
	<meta name="csrf-token" content="{{ csrf_token()}}">
	<style>
		.navbar-brand img {
			/* Adjust the size of the logo */
			height: 100px; /* Set your desired height */
			width: auto; /* Keeps the aspect ratio */
			max-width: 100%; /* Ensures the image doesn’t overflow */
		}
		.text-white {
    --bs-text-opacity: 1;
	color: #f7ca0d !important;
}
.img-fluid {
    max-width: auto;
    height: 4rem;
    /* width: 6rem; */
}

.btn-outline-light {
    color: #f7ca0d !important;
    border-color: #f7ca0d;
}
.section-1 .carousel .carousel-inner .carousel-caption div {
    width: 800px;
    background-color: #00000054;
    border-radius: 2rem;
}
.carousel-caption {
    position: absolute;
    right: 15%;
    bottom: 1.25rem;
    left: 15%;
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
    color: #f7ca0d;
    text-align: center;
}
		.navbar .nav-link {
            color: #333; /* Dark text for contrast */
            /* font-weight: bold; */
        }
		.navbar-nav .nav-item {
            margin-left: 15px; /* Space between nav items */
        }
		.navbar-light .navbar-nav .nav-link {
    color: #212529;
}

        .navbar-nav .nav-link {
            text-transform: uppercase;
        }
		@media (min-width: 992px) {
    .navbar-expand-lg {
        flex-wrap: nowrap;
        justify-content: flex-start;
        margin-bottom: -40px;
        margin-top: -12px;}
		@media (min-width: 992px) {
    .navbar-expand-lg .navbar-nav {
        flex-direction: row;
        background-color: #f7ca0d;
    }
	
}
}
	</style>
</head>
<body data-instant-intensity="mousedown">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container nav-con">
		  <a class="navbar-brand" href="#">
			<img height="500px" width="500px" src="{{ asset('front-assets/images/logo.png') }}" alt="" />
		  </a>
		  <div class="nav-center">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link link-color" href="{{ route('front.home') }}">HOME</a>
				  </li>
			  <li class="nav-item">
				<a class="nav-link link-color" href="#CATEGORIES">BOOK NOW</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link link-color" href="{{ route('front.beforeafter') }}">BEFORE & AFTER</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link link-color" href="{{ route('front.contactus') }}">CONTACT US</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link link-color" href="{{ route('front.aboutus') }}">ABOUT US</a>
			  </li>
			</ul>
		  </div>
		  <div class="ml-auto">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link link-color" href="{{ route('account.login') }}">Login</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link link-color" href="{{ route('account.register') }}">Register</a>
			  </li>
			  <a href="{{ route('front.cart') }}" class="ml-3 pt-2">
				<i class="fas fa-truck text-danger"></i> </a>
			
			
			</ul>
		  </div>
		</div>
	  </nav>
  
<header>
	<div class="container">
		<nav class="navbar navbar-expand-xl" id="navbar">
			<a href="index.php" class="text-decoration-none mobile-logo">
				<span class="h2 text-uppercase text-primary bg-dark">Online</span>
				<span class="h2 text-uppercase text-white px-2">SHOP</span>
			</a>
			<button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<!-- <span class="navbar-toggler-icon icon-menu"></span> -->
				  <i class="navbar-toggler-icon fas fa-bars"></i>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        			<!-- <li class="nav-item">
          				<a class="nav-link active" aria-current="page" href="index.php" title="Products">Home</a>
        			</li> -->
                    {{-- @if(getCategories()->isNotEmpty())
                    @foreach (getCategories() as $category)
                        

					<li class="nav-item dropdown">
						<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							{{ $category->name }}
						</button>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item nav-link" href="#">Mobile</a></li>
							<li><a class="dropdown-item nav-link" href="#">Tablets</a></li>
							<li><a class="dropdown-item nav-link" href="#">Laptops</a></li>
							<li><a class="dropdown-item nav-link" href="#">Speakers</a></li>
							<li><a class="dropdown-item nav-link" href="#">Watches</a></li>
						</ul>
					</li>
                    @endforeach
                    @endif --}}
					{{-- <li class="nav-item dropdown">
						<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Men's Fashion
						</button>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item" href="#">Shirts</a></li>
							<li><a class="dropdown-item" href="#">Jeans</a></li>
							<li><a class="dropdown-item" href="#">Shoes</a></li>
							<li><a class="dropdown-item" href="#">Watches</a></li>
							<li><a class="dropdown-item" href="#">Perfumes</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Women's Fashion
						</button>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item" href="#">T-Shirts</a></li>
							<li><a class="dropdown-item" href="#">Tops</a></li>
							<li><a class="dropdown-item" href="#">Jeans</a></li>
							<li><a class="dropdown-item" href="#">Shoes</a></li>
							<li><a class="dropdown-item" href="#">Watches</a></li>
							<li><a class="dropdown-item" href="#">Perfumes</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Appliances
						</button>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item" href="#">TV</a></li>
							<li><a class="dropdown-item" href="#">Washing Machines</a></li>
							<li><a class="dropdown-item" href="#">Air Conditioners</a></li>
							<li><a class="dropdown-item" href="#">Vacuum Cleaner</a></li>
							<li><a class="dropdown-item" href="#">Fans</a></li>
							<li><a class="dropdown-item" href="#">Air Coolers</a></li>
						</ul>
					</li>
					
					 --}}
      			</ul>      			
      		</div>   
				
      	</nav>
  	</div>
</header>

<main>
@yield('content')
@yield('customjs')
</main>
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h2 class="text-center mb-4 text-uppercase" >Car Wash Services, Pakistan</h2>
            <div class="p-4 bg-light" style="border-radius: 15px;">
                <p class="lead ">In Pakistan, cars are a primary mode of transport for most residents, and some might even consider them their second home. This makes it crucial to keep them clean and well-maintained. While many car owners prefer to clean their vehicles at home to save money, professional cleaning not only ensures a thorough clean but also prolongs the life of the vehicle without risking damage.</p>
                <p class="lead ">Our Mobile Car Wash service in Pakistan often encounters customers who are firm believers in DIY car washing. However, our service and affordability often change their minds. At Washmycar.pk, we go beyond just professional cleaning; we focus on providing exceptional service to each customer. Hours on the road can affect your vehicle, no matter where you are in Pakistan.</p>
                <p class="lead ">We understand the routes in all the areas we serve and have the necessary tools to leave your car in top condition once we are done. Beyond major cities like Karachi, our Mobile Car Valeting in Lahore ensures the same high standard of service that you won't find elsewhere.</p>
                <p class="lead ">Looking for Mobile Car Valeting in Islamabad? Washmycar.pk is here for you. The services we offer and the time needed to restore your vehicle to its gleaming condition depend on its current state. Some vehicles require more attention than others based on their age and usage. But we come prepared with the right tools and equipment to clean your car, making a noticeable difference in its before and after condition.</p>
                <p class="lead ">Additionally, we offer mobile car valeting in cities like Lahore with the quality we promise throughout Pakistan. For every order booked through our website or on call, our customer service team ensures all necessary details are gathered to prepare for your car wash. As a mobile service, we come to your doorstep, bringing over a decade of experience in providing the exclusive attention each of our customers deserves.</p>
                <p class="lead ">The same principles of service and quality apply to our Mobile Car Valeting in Karachi. For most of our external valeting services, customers don’t need to be present. Our expert will arrive at your provided address and complete the job. Once the service is rendered, you will receive an email with before and after pictures of your vehicle confirming the job is done. You can also book an internal cleaning even if you are not available in person by leaving a note with your requirements and personal items. Our expert will complete the job as promised, and you will receive an email afterward.</p>
                <p class="lead ">You don’t need to worry about providing us with anything except the location of your car. Our expert will be fully equipped with all the tools needed to get the job done without the need for you to supply water or electricity.</p>
                <p class="lead ">If you are searching for a company that offers Mobile Car Valeting in Lahore with all the above-mentioned services, book your service with us today. We are also available in Karachi and Islamabad and will provide you the best valeting service your car has ever received. Our aim is to help improve the overall lifespan of your vehicle, not just clean it once. A well-maintained vehicle can go a long way, and we are here to assist you in maintaining your car.</p>
            </div>
        </div>
    </div>
</div>



<footer class="text-center text-white" style="background-color: #094d89;">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Iframe -->
      <section class="">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="ratio ratio-16x9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/m-TQyYOV2fY?si=j5mvUuQ2mVQcZCf1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </section>
      <!-- Section: Iframe -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-white" href="Service It.html">Service it </a> All Rights Reserved
    </div>
    <!-- Copyright -->
  </footer>
<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			function addToCart(id) {
    $.ajax({
        url:'{{ route("front.addToCart") }}',
        type:'post',
        data:{id:id},
        datatype:'json',
        success:function(response){ 
         if(response.status == true){
            window.location.href = "{{ route('front.cart') }}";
         }
         else{
            alert(response.message);
         }
    }
    });
}
</script>
</body>
</html>
