<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Absensi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <style>
      table.minimalistBlack {
  border: 3px solid #000000;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.minimalistBlack td, table.minimalistBlack th {
  border: 1px solid #000000;
  padding: 5px 4px;
}
table.minimalistBlack tbody td {
  font-size: 13px;
}
table.minimalistBlack thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 3px solid #000000;
}
table.minimalistBlack thead th {
  font-size: 15px;
  font-weight: bold;
  color: #000000;
  text-align: left;
}
table.minimalistBlack tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  border-top: 3px solid #000000;
}
table.minimalistBlack tfoot td {
  font-size: 14px;
}
    
  
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class="card-body">
                <center>
              <table id="example2" class="table table-bordered table-hover minimalistBlack" style="border: 1px solid black">
                <thead>
                    <tr>
                      <th class="text-center" rowspan="2">No</th>
                      <th class="text-center" rowspan="2">Nama</th>
                      <th class="text-center" rowspan="2">NISN</th>
                      <th class="text-center" colspan="3">Status</th>
                    </tr>
                    <tr>
                      <th class="text-center">Hadir</th>
                      <th class="text-center">Sakit</th>
                      <th class="text-center">Alpha</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if (is_null($siswa) || $siswa->count() < 1 || $siswa[0]->absensi->count() < 1)
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
                            </tr>
                        @endforeach
                      @endif
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
