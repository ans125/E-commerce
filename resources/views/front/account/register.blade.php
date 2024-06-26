@extends('front.layouts.app')

@section('content')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0" style="padding-top: 2rem !important;}">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Register</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            <div class="login-form">    
                <form action="" method="post" name="registrationForm" id="registrationForm">
                    @csrf
                    <h4 class="modal-title"> Register Now</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="phone" class="form-control" placeholder="phone" id="phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Register</button>
                </form>			
                <div class="text-center small">Already have an account? <a href="{{ route('account.login') }}">Login Now</a></div>
            </div>
        </div>
    </section>
@endsection

@section('customjs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $("#registrationForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '{{ route("account.processRegister") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                var errors = response.errors;
                if(response.status==false){

                }else{

                    window.location.href="{{ route('account.login') }}";
                }
            },
            error: function(jqXHR, exception){
                console.log("something went wrong");
            }
        });
    });
</script>
@endsection

