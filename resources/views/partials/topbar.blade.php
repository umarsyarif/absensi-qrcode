<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" data-widget="pushmenu"><i class="fa fa-bars"></i></a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown" data-toggle="dropdown">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="javascript:void(0)">
            <img src="{{asset('images/user.png')}}" alt="user-image" class="rounded-circle" width="32px">
            <span class="pro-user-name ml-1">{{Auth::user()->name}}  <i class="fas fa-angle-down"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-item dropdown">
                <p>Hai, {{Auth::user()->name}}</p>
                <small>{{Auth::user()->email}}</small>
            </div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        </li>
    </ul>
</nav>
