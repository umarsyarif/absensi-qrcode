<?php
$title = 'Create Data Siswa';
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
                    @include('partials.breadcrumb', ['breadcrumbs' => ['search.index' => 'Pencarian']])
                </div>
            </div>
        </div>
        <!-- Main content -->

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3></h3>
                    </div>

                    <div class="card-body">
                            <form action="{{ route('data-siswa.store') }}" method="post">
                                    @csrf


                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data siswa</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data Orang Tua</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin')}}">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat')}}">
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="No.Hp/Whatsapp" value="{{ old('no_hp')}}">
                            </div>
                            <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control" name="identity" placeholder="Nomor Induk Siswa Nasional(10 digit angka)" value="{{ old('identity')}}">
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas_id" value="{{ old('name')}}">
                                    <option>-- Pilih Kelas --</option>
                                    {{-- @foreach ($kelas as $row)
                                    <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file border" name="foto">
                            </div>
                        </div>

                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ old('name')}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin')}}">
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat')}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Hp</label>
                                                            <input type="text" class="form-control" name="no_hp" placeholder="No.Hp/Whatsapp" value="{{ old('no_hp')}}">
                                                        </div>
                                                        <div class="form-group">
                                                                <label>NISN</label>
                                                                <input type="text" class="form-control" name="identity" placeholder="Nomor Induk Siswa Nasional(10 digit angka)" value="{{ old('identity')}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <select class="form-control" name="kelas_id" value="{{ old('name')}}">
                                                                <option>-- Pilih Kelas --</option>
                                                                {{-- @foreach ($kelas as $row)
                                                                <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Foto</label>
                                                            <input type="file" class="form-control-file border" name="foto">
                                                        </div>
                                                    </div>
                            
                                        </div>
                                        
                                    </div>


                        <div class="row">
                            <div class="col-md-6">
                                    <h4>* Akun</h4>
                                    <hr>
                                <div class="form-group">
                                    <label>Nama :</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
                                    <span class="invalid-feedback">Name Wajib Di isi</span>
                                </div> 
                                <div class="form-group">
                                    <label>Identity :</label>
                                    <input type="text" class="form-control @error('identity') is-invalid @enderror" name="identity">
                                    <span class="invalid-feedback">Identity Wajib Di isi</span>
                                </div>

                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    <span class="invalid-feedback">Password Wajib Di isi</span>
                                </div>
                                    
                                <div class="form-group">
                                    <label>Konfimasi Password :</label>
                                    <input type="password" class="form-control @error('confirmation') is-invalid @enderror" name="confirmation">
                                    <span class="invalid-feedback">Konfimasi Password Wajib Di isi</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <h4>* Data Diri</h4>
                                    <hr>
                                <div class="form-group">
                                        <label>NISN</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" placeholder="Enter NIP">
                                        <span class="invalid-feedback">NIP Wajib Di isi</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Enter Nama">
                                        <span class="invalid-feedback">Nama Wajib Di isi</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control @error('name') is-invalid @enderror" name="jenis_kelamin">
                                            <option>-- Jenis Kelamin --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <span class="invalid-feedback">Jenis Kelamin Wajib Di isi</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Enter Alamat">
                                        <span class="invalid-feedback">Alamat Wajib Di isi</span>
                                    </div>
                                    <div class="form-group">
                                        <label>No Hp</label>
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="Enter No Hp">
                                        <span class="invalid-feedback">No Hp Wajib Di isi</span>
                                    </div> 
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                    <h4>* Data Orang Tua</h4><br>
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" placeholder="Enter No Hp">
                                    <span class="invalid-feedback">No Hp Wajib Di isi</span>
                                </div>
                                <div class="form-group">
                                    <label>No Hp Ibu</label>
                                    <input type="text" class="form-control @error('no_hp_ibu') is-invalid @enderror" name="no_hp_ibu" placeholder="Enter No Hp">
                                    <span class="invalid-feedback">No Hp Wajib Di isi</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <br>
                                <br>
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" placeholder="Enter No Hp">
                                    <span class="invalid-feedback">No Hp Wajib Di isi</span>
                                </div>
                                <div class="form-group">
                                    <label>No Hp Ayah</label>
                                    <input type="text" class="form-control @error('no_hp_ayah') is-invalid @enderror" name="no_hp_ayah" placeholder="Enter No Hp">
                                    <span class="invalid-feedback">No Hp Wajib Di isi</span>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success" style="float: right">Simpan</button>
                        
                        </form>
                        </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
