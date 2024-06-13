<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
      text-align: center;
    }
    .icon {
      font-size: 100px;
      color: #28a745;
    }
    h2 {
      margin-top: 20px;
    }
    p {
      margin-top: 10px;
    }
    .btn-custom {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #f7ca0d;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="icon">
    <i class="fas fa-check-circle"></i>
  </div>
  <h2>Order Confirmed!</h2>
  <p>Your Booking has been confirmed successfully.Our Team will contact you shortly. Thank you for choosing us!</p>
  <a href="{{ route('front.home') }}" class="btn btn-custom">Home</a>
</div>

</body>
</html>
