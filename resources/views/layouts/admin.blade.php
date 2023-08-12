<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- ... Other navigation links ... -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="{{ route('reservations.index') }}">Manage Reservations</a>
                </li>
            -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('import/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
