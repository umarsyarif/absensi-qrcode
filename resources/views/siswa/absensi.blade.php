<?php
$title = 'Absensi';
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
                        @include('partials.breadcrumb', ['breadcrumbs' => ['' => 'Absensi']])
                    </div>
                </div>
            </div>
            <!-- Main content -->
        <div class="container">

            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('absen.show') }}" method="GET">
                            <h3 class="card-title mt-2 mr-3">Filter Pencarian :</h3>
                            <div class="btn-group mb-2 mr-2" class="in-line">
                                <select class="custom-select" name="mapel" required>
                                    <option value="" selected>-- Pilih Mapel --</option>
                                    @foreach ($mapel as $row)
                                    <option value="{{ $row->id }}"}}>{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" id="cari" class="btn btn-success mb-2"><i class="fas fa-search mr-2"></i>Cari</button>
                        </form>
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th class="text-center">No</th>
                                  <th class="text-center">Nama</th>
                                  <th class="text-center">NISN</th>
                                  <th class="text-center">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach ($jadwals as $row)
                                        <tr>
                                            <td class="tg-0lax">{{ $loop->iteration }}</td>
                                            <td class="tg-0lax">{{ $biodata->name }}</td>
                                            <td class="text-center">{{ $biodata->identity }}</td>    
                                            <td class="text-center">{{ $row->status }}</td>
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
<script type="text/javascript">

</script>
@endpush
