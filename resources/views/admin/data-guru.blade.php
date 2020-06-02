<?php
$title = 'Data Guru';
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guru as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row -> user -> identity }}</td>
                                <td>{{ $row -> user -> name }}</td>
                                <td>
                                    <a href="#" class="jenis_kelamin" data-name="jenis_kelamin" data-type="select" data-value="{{$row->jenis_kelamin}}" data-pk="{{ $row -> id }}" data-url="/api/profil/guru/{{$row->id}}" 
                                    data-title="Pilih Jenis Kelamin">{{ $row -> jenis_kelamin }}</a>
                                </td>
                                <td>{{ $row -> alamat }}</td>
                                <td>{{ $row -> no_hp }}</td>
                                <td><a href="#" class="btn btn-danger delete" guru_id="{{ $row -> id }}"><i class="fas fa-trash mr-1"></i>Hapus</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Guru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('data-guru.store') }}" method="POST">
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
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="No.Hp/Whatsapp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="identity" placeholder="Nomor Induk Pengajar(10 digit angka)">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password(min.6 karakter)">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmation Password</label>
                                <input type="password" class="form-control" name="confirmation" placeholder="Konfirmasi Password">
                            </div>
                        </div>
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

    $(document).ready(function() {
    $('.jenis_kelamin').editable(
        {
            mode: 'popup', 
            value: $(this).data('value'),
            source: [
              {value: 'Laki-Laki', text: 'Laki-Laki'},
              {value: 'Perempuan', text: 'Perempuan'}
           ]

    });

});

$('.delete').click(function(){
    var guru_id = $(this).attr('guru_id');
    swal({
        title: "Apakah Anda Yakin?",
        text: "Mau Di Hapus Data Ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
          window.location = "data-guru/"+ guru_id +"/hapus-guru";  
        } 
    });
});



    @if ($errors->any())
        $('#modal-lg').modal('show');
    @endif

</script>
@endpush
