<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
    <title>Register</title>
</head>
<body>
    <div class="register-container">
        <div class="title">Register</div>
        <br>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" name="name" id="name" >
                <label for="name">Name</label>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="email" >
                <label for="email">Email</label>
            </div>
            <div class="password-container">
                <input type="password" name="password" id="password"  class="input" autocomplete="new-password">
                <label for="password">Password</label>
            </div>
            <div class="password-container">
                <input type="password" name="password_confirm" id="password_confirm"  autocomplete="new-password">
                <label for="password">Confirm Password</label>
            </div>
            <div class="input-box">
                <button class="btn reg">Register</button>
            </div>
        </form>
    </div>
    
</body>
</html>