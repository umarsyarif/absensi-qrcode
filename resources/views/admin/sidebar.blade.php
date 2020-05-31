<li class="nav-item">
    <a href="{{route('data-guru.show')}}" class="nav-link {{$title == 'Data Guru' ? 'active' : ''}}">
    <i class="nav-icon fas fa-chart-line"></i>
    <p>Data Guru</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('data-siswa.show')}}" class="nav-link {{$title == 'Data Siswa' ? 'active' : ''}}">
    <i class="nav-icon fas fa-chart-line"></i>
    <p>Data Siswa</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link {{$title == 'Data Mata Pelajaran' ? 'active' : ''}}">
    <i class="nav-icon fas fa-chart-line"></i>
    <p>Data Mata Pelajaran</p>
    </a>
</li>
