@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-53">
                    Sign In With
                </span>
                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        {{ __('E-Mail Address') }}
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="example@example">
                    <span class="focus-input100"></span>
                </div>
                <br>
                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Password
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input id="password" type="password"
                        class="input100 form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" placeholder="">
                    <span class="focus-input100"></span>
                </div>

                <a href="#" class="txt2 bo1 m-l-5 mt-2">
                    Forgot password?
                </a>
                <br>
                <div class="container-login100-form-btn m-t-17">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="w-full text-center p-t-55">
                    <span class="txt2">
                        Not a member?
                    </span>

                    <a href="{{route('register')}}" class="txt2 bo1">
                        Sign up now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>
@endsection

@section('link')
<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
@endsection
