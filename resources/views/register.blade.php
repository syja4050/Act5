<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
</head>
<body>
    <div class="register-container">
        <div class="title">Register</div>
        <br>
        <form id="registerForm">
            @csrf
            <div class="input-box">
                <input type="text" name="firstname" id="firstname" required>
                <label for="firstname">First Name</label>
            </div>
            <div class="input-box">
                <input type="text" name="middlename" id="middlename">
                <label for="middlename">Middle Name</label>
            </div>
            <div class="input-box">
                <input type="text" name="lastname" id="lastname" required>
                <label for="lastname">Last Name</label>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <div class="password-container">
                <input type="password" name="password" id="password" required autocomplete="new-password">
                <label for="password">Password</label>
            </div>
            <div class="password-container">
                <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                <label for="password_confirmation">Confirm Password</label>
            </div>
            <div class="input-box">
                <button type="submit" class="btn reg">Register</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#registerForm').submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('register') }}",
                    type: "POST",
                    data: $('#registerForm').serialize(),
                    success: function (response) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success"
                        }).then(() => {
                            window.location.href = "{{ route('login') }}";
                        });
                    },
                    error: function (xhr) {
                        if (xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            let erroMessage = "";
                            $.each(errors, function (key, value) {
                                erroMessage += value[0] + "\n";
                            });
                            Swal.fire("Error", erroMessage, "error");
                        } else {
                            Swal.fire("Error", "An error occurred, please try again later.", "error");
                        }
                        
                    }
                });
            });
        });
    </script>
</body>
</html>
