@extends('front.layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>before & after</title>
    <link rel="stylesheet" href="Before&after.css" />
    <link rel="stylesheet" href="Style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="	https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <style>.btn-1 {
        background-color: #f7ca0d !important;
        border: none !important;
      }
      .arr-1 {
        color: black !important;
      }
      .body-1 {
        background-color: #f7ca0d !important;
      }
      .text-2 {
        font-weight: bold !important;
        text-align: center !important;
        font-size: 30px;
      }
      .text-1 {
        font-weight: bold !important;
        text-align: center !important;
        font-size: 30px;
      }
      .heading {
        color: black;
      }
      .card-border {
        border: 2px solid #f7ca0d !important;
      }
      
        </style>
  </head>
  <body>
    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h3 class="mb-3 heading">Bafore & After</h3>
          </div>
          <div class="col-6 text-right">
            <a
              class="btn btn-primary mb-3 mr-1 btn-1"
              href="#carouselExampleIndicators2"
              role="button"
              data-slide="prev"
            >
              <i class="fa fa-arrow-left arr-1"></i>
            </a>
            <a
              class="btn btn-primary mb-3 btn-1"
              href="#carouselExampleIndicators2"
              role="button"
              data-slide="next"
            >
              <i class="fa fa-arrow-right arr-1"></i>
            </a>
          </div>

          <div class="col-12">
            <!-- <div class="col-md-2">Before</div> -->
            <div
              id="carouselExampleIndicators2"
              class="carousel slide"
              data-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="card card-border">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="{{ asset('front-assets/images/before-1.jpg') }}"
                        />
                        <div class="card-body body-1">
                          <h4 class="card-title text-1">BEFORE</h4>
                          <p class="card-text text-2">Back Seats</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="card card-border">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="{{ asset('front-assets/images/before-2.jpg') }}"
                        />
                        <div class="card-body body-1">
                          <h4 class="card-title text-1">BEFORE</h4>
                          <p class="card-text text-2">Front Seats</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="card card-border">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="{{ asset('front-assets/images/before-3.jpg') }}"
                        />
                        <div class="card-body body-1">
                          <h4 class="card-title text-1">BEFORE</h4>
                          <p class="card-text text-2">Cup Holder</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="card card-border">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="{{ asset('front-assets/images/after-1.jpg') }}"
                        />
                        <div class="card-body body-1">
                          <h4 class="card-title text-1">After</h4>
                          <p class="card-text text-2">Back Seats</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="card card-border">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="{{ asset('front-assets/images/after-2.jpg') }}"
                        />
                        <div class="card-body body-1">
                          <h4 class="card-title text-1">After</h4>
                          <p class="card-text text-2">Front Seats</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="card card-border">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="{{ asset('front-assets/images/after-3.jpg') }}"
                        />
                        <div class="card-body body-1">
                          <h4 class="card-title text-1">After</h4>
                          <p class="card-text text-2">Cup Holder</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <imgs
                          class="img-fluid"
                          alt="100%x280"
                          src="images/after-3.jpg"
                        />
                        <div class="card-body">
                          <h4 class="card-title">Special title treatment</h4>
                          <p class="card-text">
                            With supporting text below as a natural lead-in to
                            additional content.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129"
                        />
                        <div class="card-body">
                          <h4 class="card-title">Special title treatment</h4>
                          <p class="card-text">
                            With supporting text below as a natural lead-in to
                            additional content.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <img
                          class="img-fluid"
                          alt="100%x280"
                          src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6"
                        />
                        <div class="card-body">
                          <h4 class="card-title">Special title treatment</h4>
                          <p class="card-text">
                            With supporting text below as a natural lead-in to
                            additional content.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="	https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  </body>
</html>

@endsection
