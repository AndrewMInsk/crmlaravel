<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/apptheme.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link "  href="{{route('home.index')}}">Главная</a></li>
            <li class="nav-item"><a class="nav-link "  href="{{route('home.widget')}}">Виджет</a></li>
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
