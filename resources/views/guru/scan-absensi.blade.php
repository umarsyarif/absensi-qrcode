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
            {{-- <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="navbar-form navbar-left">
                        <h4>Live Scan QR-Code</h4>
                    </div>
                    <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                         </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="col-md-6">
                        <div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                        <div class="navbar-form navbar-right">
                            <select class="form-control" id="camera-select"></select>
                            <div class="form-group">
                                <input id="image-url" type="text" class="form-control" placeholder="Image url">
                                <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                                <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                                <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                                <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                                <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        <div class="col-md-6">
                            <div class="well" style="position: relative;display: inline-block;">
                                <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                                <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                                <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                                <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                                <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                            </div>
                            <div class="well" style="width: 100%;">
                                <label id="zoom-value" width="100">Zoom: 2</label>
                                <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                                <label id="brightness-value" width="100">Brightness: 0</label>
                                <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                                <label id="contrast-value" width="100">Contrast: 0</label>
                                <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                                <label id="threshold-value" width="100">Threshold: 0</label>
                                <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                                <label id="sharpness-value" width="100">Sharpness: off</label>
                                <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                                <label id="grayscale-value" width="100">grayscale: off</label>
                                <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                                <br>
                                <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                                <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                                <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                                <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumbnail" id="result">
                                <div class="well" style="overflow: hidden;">
                                    <img width="320" height="240" id="scanned-img" src="">
                                </div>
                                <div class="caption">
                                    <h3>Scanned result</h3>
                                    <p id="scanned-QR"></p>
                                    <p>Randi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <qrscanner-component
            id-jadwal = {{$jadwal->id}}
            ></qrscanner-component>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jadwal</h3>
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
                                        <td>{{ $row -> status == 1 ? 'Hadir' : 'Tidak Hadir' }}</td>
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
