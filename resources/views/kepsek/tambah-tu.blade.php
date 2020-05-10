<?php
$title = 'Data TU';
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
                            <form action="{{ route('kepsek.tu.create') }}" method="post">
                                    @csrf
                        <div class="row">
                            <div class="col-6">
                                    <h4>* Akun</h4>
                                    <hr>
                                <div class="form-group">
                                    <label>Name :</label>
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
                            <div class="col-6">
                                    <h4>* Data Diri</h4>
                                    <hr>
                                <div class="form-group">
                                        <label>NIP</label>
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
