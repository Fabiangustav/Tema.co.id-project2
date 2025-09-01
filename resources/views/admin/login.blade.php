<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">"
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <!-- Background Animation -->
    <div class="bg-animation"></div>
    
    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <!-- Main Login Container -->
    <div class="login-container">
        <div class="login-card" data-aos="zoom-in" data-aos-duration="800">
            <div class="card-body">
                <!-- Logo and Brand -->
                <div class="logo-container">
                    <div class="logo">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h2 class="brand-title">PT. TEMA</h2>
                    <p class="brand-subtitle">Admin Panel Login</p>
                </div>

                <!-- Error Alert -->
                <div class="alert alert-danger d-none" id="errorAlert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <span id="errorMessage">Invalid email or password</span>
                </div>

                <!-- Success Alert -->
                <div class="alert alert-success d-none" id="successAlert">
                    <i class="bi bi-check-circle me-2"></i>
                    <span>Login successful! Redirecting...</span>
                </div>

                <!-- Login Form -->
                <form id="loginForm" action="/admin/login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <!-- Email Input -->
                    <div class="input-group mb-3">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" 
                               name="email" 
                               class="form-control with-icon" 
                               placeholder="Email address"
                               required>
                    </div>

                    <!-- Password Input -->
                    <div class="input-group mb-3">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" 
                               name="password" 
                               id="passwordField"
                               class="form-control with-icon" 
                               placeholder="Password"
                               required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="bi bi-eye" id="passwordToggleIcon"></i>
                        </button>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">
                            Remember me
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login" id="loginBtn">
                        <span class="btn-text">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Sign In
                        </span>
                        <div class="spinner"></div>
                    </button>
                </form>

                <!-- Forgot Password -->
                <div class="forgot-password">
                    <a href="#" onclick="showForgotPassword()">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Animation -->
    <div class="success-animation" id="successAnimation">
        <div class="success-checkmark">
            <i class="bi bi-check"></i>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>