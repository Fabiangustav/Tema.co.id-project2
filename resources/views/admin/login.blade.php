<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="PT. Tema - Trijaya Excel Madura, Admin Panel">
    <meta name="description" content="Login Panel Admin PT. Tema">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Login | PT. Tema</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url("{{ asset('img/bg-login.jpg') }}") no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: #fff;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            width: 400px;
            animation: fadeInDown 0.8s;
        }
        .login-box .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-box .logo img {
            max-width: 100px;
        }
        .login-box h2 {
            font-weight: 600;
            font-size: 22px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .btn-login {
            width: 100%;
            background: #1a76d1;
            color: #fff;
            font-weight: 600;
        }
        .btn-login:hover {
            background: #155cb0;
        }
        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }
        .forgot-password a {
            color: #1a76d1;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="logo">
            <img src="{{ asset('img/logotema.png') }}" alt="PT. Tema">
        </div>
        <h2>Admin Panel Login</h2>

        <!-- Error Alert -->
        @if(session('error'))
        <div class="alert alert-danger">
            <i class="icofont-warning"></i> {{ session('error') }}
        </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label><i class="icofont-email"></i> Username</label>
                <input type="email" name="email" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group mb-3">
                <label><i class="icofont-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-login">Sign In</button>
        </form>

        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>