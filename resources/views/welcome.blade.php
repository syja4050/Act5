<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
    <title>ACTIVITY 5</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-header">
            <img src="assets\css\img\l.png" alt="" class="logo">
            <div class="title">Login</div>
        </div>
        <form action="">
            <div class="input-box">
                <input type="text">
                <label for="">Username</label>
            </div>
            <div class="input-box">
                <input type="password">
                <label for="">Password</label>
            </div>
            <div class="input-box">
                <button class="btn">Login</button>
            </div>
            <h4>Sign in with</h4>
            <div class="input-box social-media">
                <button class="btn facebook">Facebook</button>
                <a href="{{ route('auth.google') }}">
                <button class="btn google">Google</button>
                </a>
            </div>
        </form>
    </div>
    
</body>
</html>