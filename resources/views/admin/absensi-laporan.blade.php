<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title') | {{config('app.name')}}</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  @yield('header')

</head>
<body>




<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
          <th class="text-center" rowspan="2">No</th>
          <th class="text-center" rowspan="2">Nama</th>
          <th class="text-center" rowspan="2">NISN</th>
          <th class="text-center" colspan="3">Status</th>
          <th class="text-center" rowspan="2">Actions</th>
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
                    <td class=""><a href="#" class="btn btn-success">Lihat Absensi</a></td>
                </tr>
            @endforeach
          @endif
      </tbody>
</table>

<script src="{{asset('js/app.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @stack('scripts')

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
