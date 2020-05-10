<?php
$title = 'Data Kurikulum';
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
                  {{-- <h3 class="card-title">Data Kurikulum</h3> --}}
                      <a href="{{ route('kepsek.kurikulum.create') }}" style="float: right" class="btn btn-success">+ Tambah Data</a>
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
                    @foreach ($kurikulum as $row)                   
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


@endsection