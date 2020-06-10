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

                  <h3 class="profile-username text-center">Nina Mcintire</h3>

                  <p class="text-muted text-center">Software Engineer</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-9">

                <div class="card card-primary card-outline">
                <div class="card-header">
                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#modal-md">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </button>
                </div>
                <div class="card-body">
                <h5 class="card-title">Biodata</h5>

                <br><hr>
                {{-- @foreach ($user as $row) --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $user->name  }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin :</label>
                    {{-- <input type="text" class="form-control" name="name" value="{{ $row->name  }}"> --}}
                </div>

                <div class="form-group">
                    <label>Alamat :</label>
                    {{-- <input type="text" class="form-control" name="name" value="{{ $row->name  }}"> --}}
                </div>

                <div class="form-group">
                    <label>No Hp :</label>
                    {{-- <input type="text" class="form-control" name="name" value="{{ $row->name  }}"> --}}
                </div>

                {{-- @endforeach --}}
                </div>
                </div><!-- /.card -->
            </div>
          </div>
    </div>
</div>

<div class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Data Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-profil.admin', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Singkatan</label>
                                <input type="text" class="form-control" name="singkatan" placeholder="Singkatan">
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->

@endsection
