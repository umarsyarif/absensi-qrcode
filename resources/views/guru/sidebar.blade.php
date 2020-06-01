<li class="nav-item">
    <a href="{{route('absensi-siswa.show')}}" class="nav-link {{$title == 'Absensi Siswa' ? 'active' : ''}}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Absensi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('rekap-absensi.show')}}" class="nav-link {{$title == 'Rekap Absensi' ? 'active' : ''}}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Rekap Absensi</p>
    </a>
</li>
