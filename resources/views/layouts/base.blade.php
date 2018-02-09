<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    @section('styles')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @show
</head>
<body>
    @yield('content')

    @section('scripts')
        <script type="text/javascript" src="{{ asset('js/fontawesome-all.min.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    @show
</body>
</html>