<!DOCTYPE html>
<html>
<head>
    <title>Petakom Management System</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/dataTables.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTable.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard') }}">Petakom Management System</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expended="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('view') }}">Welcome, {{ Auth::user()->name }}</a>
            </div>
        </div>
    </header>

    <div clsas="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="min-vh-100 col-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>    

                        @if(Auth::user()->role == 'Coordinator')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register_member') }}">Register Member</a>
                        </li>

                        @elseif(Auth::user()->role == 'Student')
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yearly Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Report & Activity Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Election</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bulletin</a>
                        </li>

                        @elseif(Auth::user()->role == 'Lecturer')
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yearly Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Report & Activity Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Election</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bulletin</a>
                        </li>

                        @elseif(Auth::user()->role == 'Dean')
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yearly Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Report & Activity Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Election</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bulletin</a>
                        </li>

                        @elseif(Auth::user()->role == 'PETAKOM Committee')
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yearly Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Report & Activity Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Election</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bulletin</a>
                        </li>

                        @elseif(Auth::user()->role == 'Head of Student Development')
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yearly Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Report & Activity Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Election</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bulletin</a>
                        </li>

                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
