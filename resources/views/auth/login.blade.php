@extends('layouts.app')

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body text-center">
            
        <h4 class="login-logo">Login</h4>
        <img src="/images/logo.jpg" height="200px">
        <form action="../../index3.html" method="post">
            <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
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