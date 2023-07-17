<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Include any CSS or scripts you need -->
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Include any JS scripts you need -->
</body>
</html>
