<?php
$title = 'Edit Absensi';
?>
@extends('layouts.main')

@section('header')
<link rel="stylesheet" type="text/css" href="/css/bootstrap-editable.css">
@stop

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
                        <a href="javascript:void(0);" id="selesai" class="btn btn-outline-primary float-right">Selesai absen</a>
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
                                        <td>
                                            <a href="#" class="status" data-name="status" data-type="select"
                                            data-value="{{$row -> status}}" data-pk="{{ $row -> id }}"
                                            data-url="/api/absensi/status/{{$row->id}}"
                                            data-title="Pilih Status">{{ $row -> status }}</a>
                                        </td>
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
<script type="text/javascript">

    $(document).ready(function() {
    $('.status').editable(
        {
            mode: 'popup',
            value: $(this).data('value'),
            source: [
              {value: 'Hadir', text: 'Hadir'},
              {value: 'Tidak Hadir', text: 'Tidak Hadir'},
              {value: 'Sakit', text: 'Sakit'}
           ]
    });

    $(document).ready(function () {
        $('#selesai').on('click', function () {
            let siswa = <?= json_encode($absensi) ?>;
            console.log(siswa);
            siswa.forEach(element => {
                if (element.status == 'Tidak Hadir'){
                    let nama = element.siswa.user.name;
                    let mapel = element.jadwal.mapel.nama;
                    let text = 'Assalamualaikum Wr.Wb Bapak/Ibu Wali Murid.'+
                            'Kami ingin menyampaikan bahwasan nya murid atas nama '+nama+', tidak hadir pada mata pelajaran '+mapel+
                            'Terima kasih';
                    let number = null;
                    number = element.siswa.no_hp_ayah ? element.siswa.no_hp_ayah : element.siswa.no_hp_ibu;
                    if (!number){
                        toastr.warning(error.message, "Gagal Mengirimkan SMS");
                        return;
                    }                  
                    // let number = element.siswa.no_hp_ayah ?? element.siswa.no_hp_ayah : '6281371239875';
                    let data = {
                        user: 'ichsan_api',
                        password: '7mcvysE',
                        SMSText: text,
                        GSM: number,
                        output: 'json'
                    }
                    console.log('sad');
                    $.ajax({
                        type: 'POST',
                        url: 'http://api.nusasms.com/api/v3/sendsms/plain',
                        crossDomain: true,
                        data: data,
                        dataType: 'json',
                        success: function(response) {
                             console.log(response.results[0].status);
                            try {
                                if (response.results[0].status == 0) {
                                    toastr.success(response.message, "Berhasil MEngirimkan SMS");
                                    
                                } else if(response.results[0].status==-13){
                                    toastr.warning(response.message, "Nomor Tujuan Tidak Valid");
                                }else if(response.results[0].status==-2){
                                    toastr.warning(response.message, "Pulsa Tidak Mencukupi");
                                }else{
                                    toastr.error(response.message, "Ada Kesalahan");
                                }
                            } catch (error) {
                                toastr.error(error.message, "Gagal Mengirimkan SMS");
                            }
                            
                        },
                        error: function (responseData, textStatus, errorThrown) {
                            alert('POST failed.');
                        }
                    });
                }
            });
        })
    })

});
</script>
@endpush
