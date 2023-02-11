<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Management System</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables-1.10.23/css/jquery.dataTables.css') }}">
    
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.23\js\jquery.dataTables.js') }}"></script>
</head>
<body>
    @guest
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Visitor Management System</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarsupportedcontent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsupportedcontent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    @else
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Visitor Management System</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarsupportedcontent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsupportedcontent">
            <ul class="navbar-nav mr-auto">
                @if(Session::has('user'))
                    <li class="nav-item">
                        <a class="nav-link active">
                            Welcome - {{ Session::get('user')['email'] }}
                        </a>
                    </li>
                @else
                    <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-lg-2 bg-light" style="height: 570px;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'main' ? 'active' : '' }}" aria-current="page" href="/main">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}" aria-current="page" href="/profile">Profile</a>
                    </li>
                    @if(Auth::user()->type == "Admin")
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'sub_user' ? 'active' : '' }}" aria-current="page" href="/sub_user">Sub User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'department' ? 'active' : '' }}" aria-current="page" href="/department">Department</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'visitor' ? 'active' : '' }}" href="/visitor">Visitor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
            <main class="col-md-10 col-lg-10">
                @yield('content')
            </main>
        </div>
    </div>
    @endguest
</body>
</html>
