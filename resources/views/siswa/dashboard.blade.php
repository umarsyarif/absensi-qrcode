<?php
$title = 'Dashboard';
?>
@extends('layouts.main')

@section('title', $title)

@section('content')
<div id="app">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- Page Title -->
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$title}}</h1>
                    </div>
                    {{-- @include('partials.breadcrumb', ['breadcrumbs' => ['search.index' => 'Pencarian']]) --}}
                </div>
            </div>
        </div>
    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                            src="images/user.png"
                            alt="User profile picture">

                      </div>
                      <h3 class="profile-username text-center mt-5">NISN : {{ $user -> identity }}</h3>

                      {{-- <p class="text-muted text-center">Software Engineer</p>  --}}
                      <div class="text-center">
                      {!! QrCode::size(150)->generate($user -> identity); !!}
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-9">

                    <div class="card card-primary card-outline">
                    <div class="card-body">
                    <h5 class="card-title">Biodata</h5>

                    <br><hr>
                    {{-- @foreach ($user as $row) --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name  }}" readonly>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->siswa->jenis_kelamin  }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->siswa->alamat  }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Hp :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->siswa->no_hp  }}" readonly>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    </div>
                    </div><!-- /.card -->
                </div>
              </div>
        </div>
</div>
@endsection
