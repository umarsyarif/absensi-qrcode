@extends('layouts.app')

@section('content')

{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Absensi QR - Code
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Panduan') }}</a>
                    </li>
                    
            </ul>
        </div>
    </div>
</nav> --}}


<div class="limiter" style="">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">              
                <span class="login100-form-title p-b-43">
                        {{-- <img  class="navbar-brand" src="images/86181582_2246228212145737_5765633088210075648_o.jpg" style="width: 70%"><br> --}}
                    {{-- Login to continue --}}
                    Assalamualaikum, Silahkan Login
                </span>
                
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Identity</span>
                </div>
                
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>      

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('images/36268100_1336237513144816_2704337195992350720_n.jpg');">
            </div>
        </div>
    </div>
</div>
