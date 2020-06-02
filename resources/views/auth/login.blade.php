@extends('layouts.app')

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body text-center">
            
        <h4 class="login-logo">Login Presensi</h4>
        <img src="/images/logo.jpg" height="200px">
        <form action="{{ route('login') }}" method="post">
            @csrf
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="input-group mb-3">
            <input type="text" placeholder="{{ __('User ID') }}" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" required autocomplete="identity" autofocus>
            @error('identity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
    <!-- /.login-box -->