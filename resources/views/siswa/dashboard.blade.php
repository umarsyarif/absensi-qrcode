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
                            <img class="profile-user-img img-circle" 
                            src="{{ ('/images/'.$user->siswa->foto) }}"
                            alt="User profile picture" style="width: 140px; height: 160px">

                      </div>
                      <h3 class="profile-username text-center mt-5">NISN : {{ $user -> identity }}</h3>

                      {{-- <p class="text-muted text-center">Software Engineer</p>  --}}
                      <div class="text-center">
                      {!! QrCode::size(220)->generate($user -> identity); !!}
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
            <div class="col-md-8">

                <div class="card card-primary card-outline">
                <div class="card-header">
                    <a href="{{ route('id-card.show') }}" target="_BLANK" class="btn btn-outline-primary float-right ml-3">
                        <i class="fas fa-print"></i>
                        Cetak Id-Card
                    </a>
                    <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </button>
                </div>
                <div class="card-body">
                <h5 class="card-title">Biodata</h5>

                <br><hr>
                {{-- @foreach ($user as $row) --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{ $user->name  }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $user->siswa->jenis_kelamin  }}" readonly>
                </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $user->siswa->alamat }}" readonly>
                </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No Hp :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $user->siswa->no_hp }}" readonly>
                </div>
                </div>
                <hr><br>

                <h5 class="">Data Orang Tua</h5>
                <hr>

                <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Ayah :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $user->siswa->nama_ibu }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Hp Ibu :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $user->siswa->no_hp_ibu }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Ayah :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $user->siswa->nama_ayah }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Hp Ayah :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $user->siswa->no_hp_ayah }}" readonly>
                    </div>
                </div>
                {{-- @endforeach --}}
                </div>
                </div><!-- /.card -->
            </div>
          </div>
    </div>
</div>

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-profil.siswa', $user->id) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ $user->name }}" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" value="{{ $user->siswa->jenis_kelamin }}">
                                        <option>-- Jenis Kelamin --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="{{ $user->siswa->alamat }}" required>
                                </div>
                                <div class="form-group">
                                    <label>No Hp</label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="No.Hp/Whatsapp" value="{{ $user->siswa->no_hp}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="form-control-file border" name="foto">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu" value="{{ $user->siswa->nama_ibu}}" required>
                                </div>
                                <div class="form-group">
                                    <label>No Hp Ibu</label>
                                    <input type="text" class="form-control" name="no_hp_ibu" placeholder="No.Hp/Whatsapp Ibu" value="{{ $user->siswa->no_hp_ibu}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah" value="{{ $user->siswa->nama_ayah}}" required>
                                </div>
                                <div class="form-group">
                                    <label>No Hp Ayah</label>
                                    <input type="text" class="form-control" name="no_hp_ayah" placeholder="No.Hp/Whatsapp Ayah" value="{{ $user->siswa->no_hp_ayah }}" required>
                                </div>
                            </div>
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
