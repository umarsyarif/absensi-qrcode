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
                  <h3 class="card-title">Data TU</h3>
                  <button type="button" style="float: right" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                       + Tambah Data
                      </button>
                      <a href="{{ route('kepsek.tu.create') }}">Tambah</a>
                </div>
                        
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>User id</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tu as $row)                   
                    <tr>
                      <td>{{ $row -> user->id }}</td>  
                      <td>{{ $row -> nip }}</td>
                      <td>{{ $row -> nama }}</td>
                      <td>{{ $row -> jenis_kelamin }}</td>
                      <td>{{ $row -> alamat }}</td>
                      <td>{{ $row -> no_hp }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div>

        <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Large Modal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('kepsek.tu') }}" method="POST">
                        @csrf
                    <div class="modal-body">
                          <div class="row">
                              <div class="col-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Jabatan">
                                        <span class="invalid-feedback">Name Wajib Di isi</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Identity</label>
                                        <input type="text" class="form-control" name="identity" placeholder="Enter identity">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="nip" placeholder="Enter NIP">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
                                    </div>
                              </div>
                              <div class="col-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Enter Alamat">
                                    </div>
                                    <div class="form-group">
                                        <label>No Hp</label>
                                        <input type="text" class="form-control" name="no_hp" placeholder="Enter No Hp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Confirmation Password</label>
                                        <input type="password" class="form-control" name="confirmation" placeholder="ConfirmationPassword">
                                    </div>
                              </div>
                          </div>          
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </form>
@endsection