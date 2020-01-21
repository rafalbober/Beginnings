<head>
    <style>
        body{
            background-image: url({{ URL::asset('images/b1.jpg') }});
            background-attachment: fixed;
            background-size: cover;

        }
        h1{
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
    <div class="container-fluid" s>
        <div class="row justify-content-center">
            <div class="col-md-4" style="background: rgba(0,0,0,0.4); margin-top: 90px; height: 500px; box-shadow: 1px 4px 40px black">
                <div class="">
                    <div class=""><h2 class="text-center text-white-50" style="font-weight: 700;padding-top: 10px">Login Student</h2></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('student.login.submit') }}">
                            @csrf

                            <div class="form-group row" style="margin-top: 20px;">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail adress" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px " >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px ">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-center" style="padding-top: 15%">
                                    <button type="submit" class="btn" style="margin-bottom:5%;font-size: 25px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%" id="login_button">
                                        {{ __('Sign in') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-lg" href="{{ route('password.request') }}">
                                        </a>
                                    @endif


                                </div>
                                <a class="btn btn-link text-center col-md-12 text-center" href="/faq">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

