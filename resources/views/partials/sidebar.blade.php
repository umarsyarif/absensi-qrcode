<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
        <a href="{{url('/')}}" class="brand-link mb-3 justify-content-center">
          <img src="{{asset('images/crystalball.png')}}" alt="AdminLTE Logo" class="img-circle elevation-3 mb-3" width="120px">
               <br>
          <span class="brand-text font-weight-light"> Absensi</span>
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
            <li class="nav-item">
                <a href="{{route('data-guru.show')}}" class="nav-link {{$title == 'Data Guru' ? 'active' : ''}}">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Data Guru</p>
                </a>
            </li>
          @endif

          @if (Auth::user()->role->name == 'admin')
            <li class="nav-item">
                <a href="{{route('data-siswa.show')}}" class="nav-link {{$title == 'Data Siswa' ? 'active' : ''}}">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Data Siswa</p>
                </a>
            </li>
          @endif

          @if (Auth::user()->role->name == 'guru')
          <li class="nav-item">
              <a href="{{route('absensi-siswa.show')}}" class="nav-link {{$title == 'Absensi Siswa' ? 'active' : ''}}">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Absensi</p>
              </a>
          </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>
