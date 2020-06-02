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
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <!-- Navbar -->
    @include('partials.topbar')

    <!-- Main Sidebar Container -->
    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- Main Footer -->
    @include('partials.footer')

    </div>
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

    <script>
      @if(Session::has('sukses'))
        // tampilkan toast sukses
        toastr.success("{{Session::get('sukses')}}","Selamat")
      @endif

    </script>
</body>
</html>
