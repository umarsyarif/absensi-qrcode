<?php
$title = 'Rekap Absensi';
?>
@extends('layouts.main')

@section('title', $title)

@section('header')
  {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
@endsection

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
                        @include('partials.breadcrumb', ['breadcrumbs' => ['absensi-siswa.show' => 'Absensi']])
                    </div>
                </div>
            </div>
            <!-- Main content -->
        <div class="container">

            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <form action="">
                            <h3 class="card-title mt-2 mr-3">Filter Pencarian :</h3>
                            <div class="btn-group mb-2 mr-2" class="in-line">
                                <select class="custom-select" name="mapel" required>
                                    <option value="" selected>-- Pilih Mapel --</option>
                                    @foreach ($mapel as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="btn-group mb-2 mr-2" class="in-line">
                                <select class="custom-select" name="kelas" required>
                                    <option value="" selected>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-search mr-2"></i>Cari</button>
                        </form>
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th class="text-center" rowspan="2">No</th>
                                  <th class="text-center" rowspan="2">Nama</th>
                                  <th class="text-center" rowspan="2">NISN</th>
                                  <th class="text-center" colspan="3">Status</th>
                                  <th class="text-center" rowspan="2">Actions</th>
                                </tr>
                                <tr>
                                  <th class="text-center">Hadir</th>
                                  <th class="text-center">Sakit</th>
                                  <th class="text-center">Alpha</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @if (is_null($siswa) || $siswa->count() == 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            {{ 'Tidak ada data' }}
                                        </td>
                                    </tr>
                                  @else
                                    @foreach ($siswa as $row)
                                        <tr>
                                            <td class="tg-0lax">{{ $loop->iteration }}</td>
                                            <td class="tg-0lax">{{ $row->user->name }}</td>
                                            <td class="text-center">{{ $row->user->identity }}</td>
                                            <td class="text-center">{{ $row->absensi->where('status', 'Hadir')->count() }}</td>
                                            <td class="text-center">{{ $row->absensi->where('status', 'Sakit')->count() }}</td>
                                            <td class="text-center">{{ $row->absensi->where('status', 'Tidak Hadir')->count() }}</td>
                                            <td class=""><a href="#" class="btn btn-success">Lihat Absensi</a></td>
                                        </tr>
                                    @endforeach
                                  @endif
                              </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->

            </div>
        </div>
    </div>
@endsection
