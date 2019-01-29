<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{mix("css/app.css")}}">
    <script src="{{mix('js/app.js')}}"></script>
</head>
<body>
<div class="container">

    @yield('body')

</div>
</body>
</html>