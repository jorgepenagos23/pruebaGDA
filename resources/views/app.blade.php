<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicación Web</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/log2.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app"></div>
    @vite('resources/js/app.js')
</body>
</html>
