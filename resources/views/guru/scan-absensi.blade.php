<?php
$title = 'Edit Absensi';
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
        <div class="container" id="QR-Code">
            <qrscanner-component
            id-jadwal = {{$jadwal->id}}
            ></qrscanner-component>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Absensi Siswa</h3>
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Update At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $row)
                                    <tr>
                                        <td>{{ $loop -> iteration }}</td>
                                        <td>{{ $row -> siswa -> user-> name }}</td>
                                        <td>{{ $row -> status }}</td>
                                        <td>{{ $row -> created_at }}</td>
                                        <td>{{ $row -> updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script type="text/javascript" src="{{asset('js/filereader.js')}}"></script>
    <!-- Using jquery version: -->
    <script type="text/javascript" src="{{asset('js/qrcodelib.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/webcodecamjs.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main-qr.js')}}"></script> --}}
@endpush
