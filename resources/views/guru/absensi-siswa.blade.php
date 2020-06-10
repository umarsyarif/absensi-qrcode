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
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $row)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $row ->mapel-> nama }}</td>
                                    <td>{{ $row -> kelas -> nama }}</td>
                                    <td>{{ $row -> created_at -> format('l, j F Y') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger delete" jadwal_id="{{ $row -> id }}"><i class="fas fa-trash mr-1"></i>Hapus</a>
                                        <a href="{{ route('absensi-siswa.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i>Edit Absensi</a>
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
        <div class="modal-header text-center">
          <h4 class="modal-title text-center">Form Tambah Jadwal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('absensi-siswa.store') }}" method="POST">
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
            <div class="form-group {{$errors->has('mapel_id') ? ' has-error ' : '' }}">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="mapel">
                <option value="">-- Pilih Mata Pelajaran --</option>
                @foreach ($mapel as $row)
                <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                @endforeach
            </select>
            @if ($errors->has('mapel_id'))
            <span class="help-block">{{ $errors->first('mapel_id') }}></span>
            @endif
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas">
                <option value="">-- Kelas --</option>
                @foreach ($siswa as $row)
                <option value="{{ $row -> id }}">{{ $row -> nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group {{$errors->has('mapel_id') ? ' has-error ' : '' }}">
            <label>Jam Masuk</label>
            <input type="text" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="Jam Masuk">
            @if ($errors->has('jam_masuk'))
            <span class="help-block text-danger">{{ $errors->first('jam_masuk') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label>Jam Keluar</label>
            <input type="text" class="form-control" id="jam_keluar" name="jam_keluar" placeholder="Jam Masuk">
            @if ($errors->has('jam_keluar'))
            <span class="help-block text-danger">{{ $errors->first('jam_keluar') }}</span>
            @endif
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

  @push('scripts')
<script type="text/javascript">

    var timepicker = new TimePicker(['jam_masuk','jam_keluar'], {
    lang: 'en',
    theme: 'blue-grey'
    });
    timepicker.on('change', function(evt) {

        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;

        var id = evt.element.id;
        times[id] = value;
        console.clear();
        console.log(times);

    });


    $('.delete').click(function(){
    var jadwal_id = $(this).attr('jadwal_id');
    swal({
        title: "Apakah Anda Yakin?",
        text: "Mau Di Hapus Data Ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
          window.location = "absensi-siswa/"+ jadwal_id +"/hapus-jadwal";
        }
    });
});

    @if ($errors->any())
        $('#modal-default').modal('show');
    @endif
</script>

@endpush
