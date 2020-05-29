<?php
$title = 'Data Siswa';
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
                                <th>QR Code</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! QrCode::size(80)->generate($row -> user -> identity); !!}</td>
                                <td>{{ $row -> user -> identity }}</td>
                                <td>{{ $row -> user -> name }}</td>
                                <td>{{ $row -> jenis_kelamin }}</td>
                                <td>{{ $row -> alamat }}</td>
                                <td>{{ $row -> no_hp }}</td>
                                <td>{{ $row -> kelas -> nama }}</td>
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
                <h4 class="modal-title">Tambah Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('data-siswa.store') }}" method="POST">
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
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin')}}">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat')}}">
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="No.Hp/Whatsapp" value="{{ old('no_hp')}}">
                            </div>
                            <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control" name="identity" placeholder="Nomor Induk Siswa Nasional(10 digit angka)" value="{{ old('identity')}}">
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas_id" value="{{ old('name')}}">
                                    <option>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $row)
                                    <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file border" name="foto">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu" value="{{ old('nama_ibu')}}">
                            </div>
                            <div class="form-group">
                                <label>No Hp Ibu</label>
                                <input type="text" class="form-control" name="no_hp_ibu" placeholder="No.Hp/Whatsapp Ibu" value="{{ old('no_hp_ibu')}}">
                            </div>
                            <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah" value="{{ old('nama_ayah')}}">
                                </div>
                                <div class="form-group">
                                    <label>No Hp Ayah</label>
                                    <input type="text" class="form-control" name="no_hp_ayah" placeholder="No.Hp/Whatsapp Ayah" value="{{ old('no_hp_ayah')}}">
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
<script type="text/javascript">

    @if ($errors->any())
        $('#modal-lg').modal('show');
    @endif

</script>
@endpush

