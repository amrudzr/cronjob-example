<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title . ' - ' . env('APP_NAME') : env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.6-dist/css/bootstrap.css') }}">
</head>
<body>
<main>
    @yield('content-section')
</main>
@yield('modal-section')
<script src="{{ asset('bootstrap-5.3.6-dist/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
