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
                    <h3 class="card-title">Data Jadwal</h3>
                    <button type="button" style="float:right" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
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
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $row)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $row ->mapel-> nama }}</td>
                                    <td>{{ $row -> kelas -> nama }}</td>
                                    <td>{{ $row -> created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger mr-2"><i class="fas fa-trash mr-1"></i></a>
                                        <a href="{{ route('absensi-siswa.show-scan', $row->id) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i>Edit Absensi</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->

        </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('absensi-siswa.store') }}" method="POST">
            @csrf
        <div class="modal-body">
        <div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="mapel_id">
                <option>-- Pilih Mata Pelajaran --</option>
                @foreach ($mapel as $row)
                <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas_id">
                <option>-- Kelas --</option>
                @foreach ($siswa as $row)
                <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  @endsection
