<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logounival.png') }}" rel="icon" class="rounded-circle">
    <link href="{{ asset('assets/img/logounival.png') }}" rel="apple-touch-icon" class="rounded-circle">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Login | UkomWEB</title>

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .logo img {
            width: 80px;
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .alert {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <div class="logo">
            <img src="{{ asset('assets/img/logounival.png') }}" alt="Logo">
        </div>
        <h4 class="mb-1">Welcome</h4>
        <h4 class="mb-1">to</h4>
        <h4 class="mb-1">Uji Kompetensi WEB</h4>

        @if(session('wrong'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {{ session('wrong') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="post" action="/login">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" id="pwd" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
        </form>

       
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
