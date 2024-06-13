@extends('front.layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .fixed-size-img {
  width: 500px;
  height: 500px;
  object-fit: cover;
}
.content-section {
  padding: 50px 0;
}
.text-content {
  display: flex;
  align-items: center;
}

        </style>
    <title>about us</title>
</head>
<body>

<div class="container content-section">
    <div class="row">
      <div class="col-md-6 text-content">
        <div>
          <h2 style="background-color: #f7ca0d">About Us</h2>
          <p>
            We are a distinguished Pakistani brand, proudly based in Lahore, offering exceptional car wash services and a curated selection of premium automotive products. Our mission is to provide superior car care solutions that meet the highest standards of excellence.
        </p>
        <p>
            Our dedication to quality extends beyond services to our carefully selected range of car care products. We offer high-performance waxes, polishes, cleaning agents, and accessories that complement our services, enabling car owners to maintain their vehicles with ease and confidence.
        </p>
        <p>
            Choose us for a comprehensive car care experience that combines expertise, quality, and a deep understanding of automotive needs. Whether you require routine washing or specialized care, we are here to keep your vehicle in top condition, making us a leading choice for car enthusiasts in Lahore.
        </p>
        
        </div>
      </div>
      <div class="col-md-6">
        <img
          src="{{ asset('front-assets/images/about.jpg') }}"
          alt="Sample Image"
          class="fixed-size-img"
        />
      </div>
    </div>
  </div>

  
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
</script>

@endsection

    
</body>
</html>