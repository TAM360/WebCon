@extends('layouts.app')

@section('content')
<style scoped>
    body {  
           font-family: 'Roboto', sans-serif;
       }
       .form-control {
           font-size: 16px;
           transition: all 0.4s;
           box-shadow: none;
       }
       .form-control:focus {
           border-color: #5cb85c;
       }
       .form-control, .btn {
           border-radius: 50px;
           outline: none !important;
       }
       .signup-form {
           width: 480px;
           margin: 0 auto;
           padding: 30px 0;
           background-color: #ffe000;
       }
       .signup-form form {
           border-radius: 5px;
           margin-bottom: 20px;
           background: #fff;
           box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
           padding: 40px;
       }
       .signup-form a {
           color: #5cb85c;
       }    
       .signup-form h2 {
           text-align: center;
           font-size: 34px;
           margin: 10px 0 15px;
       }
       .signup-form .hint-text {
           color: #999;
           text-align: center;
           margin-bottom: 20px;
       }
       .signup-form .form-group {
           margin-bottom: 20px;
       }
       .signup-form .btn {        
           font-size: 18px;
           line-height: 26px;
           font-weight: bold;
           text-align: center;
       }
       .signup-btn {
           text-align: center;
           border-color: #5cb85c;
           transition: all 0.4s;
       }
       .signup-btn:hover {
           background: #5cb85c;
           opacity: 0.8;
       }
       .or-seperator {
           margin: 50px 0 15px;
           text-align: center;
           border-top: 1px solid #e0e0e0;
       }
       .or-seperator b {
           padding: 0 10px;
           width: 40px;
           height: 40px;
           font-size: 16px;
           text-align: center;
           line-height: 40px;
           background: #fff;
           display: inline-block;
           border: 1px solid #e0e0e0;
           border-radius: 50%;
           position: relative;
           top: -22px;
           z-index: 1;
       }
       .social-btn .btn {
           color: #fff;
           margin: 10px 0 0 15px;
           font-size: 15px;
           border-radius: 50px;
           font-weight: normal;
           border: none;
           transition: all 0.4s;
       }	
       .social-btn .btn:first-child {
           margin-left: 0;
       }
       .social-btn .btn:hover {
           opacity: 0.8;
       }
       .social-btn .btn-primary {
           background: #507cc0;
       }
       .social-btn .btn-info {
           background: #64ccf1;
       }
       .social-btn .btn-danger {
           background: #df4930;
       }
       .social-btn .btn i {
           float: left;
           margin: 3px 10px;
           font-size: 20px;
       }
   </style>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="signup-form">
    <form method="POST" action="{{ route('login') }}">
        <h2>Login to Existing Account</h2>
        <div class="social-btn text-center">
            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="#" class="btn btn-info btn-lg"><i class="fa fa-twitter"></i> Twitter</a>
            <a href="#" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> Google</a>
        </div>
        <div class="or-seperator"><b>or</b></div>
        @csrf

        <div class="form-group row">
            
            <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group row">

            <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group row ">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            <br>
        </div>
    </form>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 14px;">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</div>
@endsection
