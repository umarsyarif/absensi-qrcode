<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{config('app.name')}} | @yield('title')</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
    @yield('script')
</body>
</html>
