<?php
$title = 'Absensi Siswa';
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
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ $message }}
                  </div>
                @endif --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <button type="button" style="float: right" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                       + Tambah Data
                    </button>
                    {{-- <a href="{{ route('data-guru.create') }}">Tambah</a> --}}
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $row)
                                <tr>
                                    <td></td>
                                    <td>{{ $row -> mapel-> nama }}</td>
                                    @foreach ($row->kelas as $kelas)
                                    <td>{{ $kelas -> nama }}</td>    
                                    @endforeach
                                    
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
</div>

    </div>
</div>
@endsection
