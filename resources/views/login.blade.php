<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ACTIVITY 5</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-header">
            <img src="assets\css\img\l.png" alt="" class="logo">
            <div class="title">Login</div>
        </div>
        <form action="{{route('login')}}" method="POST" id="loginForm">
            @csrf
            <div class="input-box">
                <input type="text" name="email">
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="password">
                <label for="password">Password</label>
            </div>
            <div class="input-box">
                <button class="btn">Login</button>
            </div>
            <h4>Sign in with</h4>
            <div class="input-box social-media">
            <a href="{{ route('auth.redirect', 'facebook') }}" class="btn facebook">Facebook</a>
                <a href="{{ route('auth.redirect', 'google') }}" class="btn google">Google</a>
            </div>
        </form>
        <p>You don't have an account?</p>
        <br>
        <a href="{{ route('register') }}" class="btn register">Register Here</a>

    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#loginForm').submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('login') }}",
                    type: "POST",
                    data: $('#loginForm').serialize(),
                    success: function (response) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success"
                        }).then(() => {
                            window.location.href = response.routes;
                        });
                    },
                    error: function (xhr) {
                        let errorMessage = xhr.responseJSON?.message || "Login failed. Please try again.";
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: errorMessage,
                            });
                    }
                });
            });
        });
    </script>
</body>
</html>