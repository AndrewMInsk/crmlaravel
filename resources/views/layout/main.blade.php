<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('css/apptheme.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <ul>
            меню будущее<li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>

</body>
</html>
