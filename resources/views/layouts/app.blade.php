<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/bootstrap.min.css') }}">
    <!-- Include additional CSS files if needed -->
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include additional JS files if needed -->
</body>
</html>
