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
            <div class="col-md-4">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="images/user.png"
                         alt="User profile picture">
                  </div>
                  <hr style="border: 0.5pt dashed gray">

                  <div class="form-group row mt-3">
                    <label class="col-sm-4 col-form-label">NIP / NKTAM :</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="{{ $user->identity  }}" readonly>
                    </div>
                </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-8">

                <div class="card card-primary card-outline">
                <div class="card-header">
                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#modal-md">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </button>
                </div>
                <div class="card-body">
                <h5 class="card-title">Biodata</h5>

                <br><hr style="border: 0.5pt dashed gray">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $user->name  }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $user->guru->jenis_kelamin  }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $user->guru->alamat  }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Hp :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $user->guru->no_hp  }}" readonly>
                    </div>
                </div>
                </div>
                </div><!-- /.card -->
            </div>
          </div>
    </div>
</div>

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Ubah Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-profil.guru', $user->id) }}" method="POST">
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
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="{{ $user->guru->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="No.Hp/Whatsapp" value="{{ $user->guru->no_hp}}" required>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file border" name="foto">
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
