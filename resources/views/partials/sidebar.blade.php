<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
        <a href="{{url('/')}}" class="brand-link mb-3 justify-content-center">
          <img src="{{asset('images/logo smk m.png')}}" alt="AdminLTE Logo" class="img-circle elevation-2 mb-3" width="120px">
               <br>
          <span class="brand-text font-weight-light">Presensi</span>
        </a>
    </center>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{$title == 'Dashboard' ? 'active' : ''}}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{-- Menu Admin --}}
            @if (Auth::user()->role->name == 'admin')
                @include('admin.sidebar')
            @endif

            {{-- Menu Guru --}}
            @if (Auth::user()->role->name == 'guru')
                @include('guru.sidebar')
            @endif

            {{-- Menu Siswa --}}
            @if (Auth::user()->role->name == 'siswa')
                @include('siswa.sidebar')
            @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>
