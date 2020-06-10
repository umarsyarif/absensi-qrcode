<li class="nav-item">
    <a href="{{route('absensi-siswa.show')}}" class="nav-link {{$title == 'Absensi Siswa' ? 'active' : ''}}">
        <i class="nav-icon fas fa-check-square"></i>
        <p>Absensi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('rekap-absensi.show')}}" class="nav-link {{$title == 'Rekap Absensi' ? 'active' : ''}}">
        <i class="nav-icon fas fa-book"></i>
        <p>Rekap Absensi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('rekap-absensi.show')}}" class="nav-link {{$title == 'Panduan' ? 'active' : ''}}">
        <i class="nav-icon fas fa-info"></i>
        <p>Panduan</p>
    </a>
</li>