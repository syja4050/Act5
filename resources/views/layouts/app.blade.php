<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
</head>
<body>
    <header>
        <form action="{{route('logout')}}" method="post">
            @yield('content')
        @csrf
        <br>
        <br>
        <button type="submit" class="logout btn">Logout</button>
        </form>
    </header>
</body>
</html>