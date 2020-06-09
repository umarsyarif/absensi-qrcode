<?php
$title = 'Data Mata Pelajaran';
?>
@extends('layouts.main')

@section('header')
<link rel="stylesheet" type="text/css" href="css/bootstrap-editable.css">
@stop

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
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ $message }}
                  </div>
                @endif
                
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <button type="button" style="float: right" class="btn btn-success" data-toggle="modal" data-target="#modal-md">
                       + Tambah Data
                    </button>
                    {{-- <a href="{{ route('data-guru.create') }}">Tambah</a> --}}
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Singkatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row -> nama }}</td>
                                <td>{{ $row -> singkatan }}</td>
                                <td><a href="#" class="btn btn-danger delete" mapel_id="{{ $row -> id }}"><i class="fas fa-trash mr-1"></i>Hapus</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Data Mapel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('data-mapel.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Mapel">
                        </div>
                        <div class="form-group">
                            <label>Singkatan</label>
                            <input type="text" class="form-control" name="singkatan" placeholder="Singkatan">
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection
@push('scripts')
{{-- <script type="text/javascript">

    
</script> --}}
<script type="text/javascript">


$('.delete').click(function(){
    var mapel_id = $(this).attr('mapel_id');
    swal({
        title: "Apakah Anda Yakin?",
        text: "Mau Di Hapus Data Ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
          window.location = "data-mapel/"+ mapel_id +"/hapus-mapel";  
        } 
    });
});



    @if ($errors->any())
        $('#modal-md').modal('show');
    @endif

</script>
@endpush
