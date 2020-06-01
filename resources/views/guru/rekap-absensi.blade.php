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
                        <form action="rekap-absensi.store" method="POST">
                            @csrf
                        <h3 class="card-title mt-2 mr-3">Filter Pencarian :</h3>
                        <div class="btn-group mb-2 mr-2" class="in-line">
                            <select class="custom-select" name="mapel_id">
                                <option selected class="">-- Pilih Mapel --</option>
                                @foreach ($mapel as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>    
                                @endforeach
                            </select>
                        </div>

                        <div class="btn-group mb-2 mr-2" class="in-line">
                            <select class="custom-select" name="kelas_id">
                                <option selected>-- Pilih Kelas --</option>
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
                                  <th class="tg-0lax">No</th>
                                  <th class="tg-0pky">Nama</th>
                                  <th class="tg-0pky">NISN</th>
                                  <th class="tg-0lax" colspan="2">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($absensi as $row)                                
                                <tr>
                                  <td class="tg-0lax"></td>
                                  <td class="{{ $row->siswa->user->nama }}"></td>
                                  <td class="tg-0lax"></td>
                                  <td class="tg-0lax"></td>
                                  <td class="tg-0lax"></td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td class="tg-0lax"></td>
                                  <td class="tg-0lax"></td>
                                  <td class="tg-0lax"></td>
                                  <td class="tg-0lax"></td>
                                  <td class="tg-0lax"></td>
                                </tr>
                              </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->

            </div>
        </div>
    </div>
@endsection
