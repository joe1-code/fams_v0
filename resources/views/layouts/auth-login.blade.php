<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FAMS - Login</title>

    <!-- Google Font & Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .auth-content {
            width: 100%;
            text-align: center;
            padding: 1rem;
        }

        .zoomIn {
            animation: zoomIn 1.2s ease-in;
        }

        .card {
            border: none;
            border-radius: 8px;
            max-width: 950px;
            min-height: 600px;
            margin: auto;
            overflow: hidden;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
        }

        .img-circle {
            width: 100px;
            height: 100px;
            background: linear-gradient(to right, #8dc63f, #255196);
            padding: 4px;
            border-radius: 50%;
            margin: 0 auto 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .img-circle img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #305fa7;
            border-color: #305fa7;
        }

        .btn-primary:hover {
            background-color: #244a84 !important;
            border-color: #244a84 !important;
        }

        .carousel-inner, .carousel-item, .carousel-item img {
            height: 100%;
        }

        .form-control:focus {
            border-color: #305fa7;
            box-shadow: 0 0 0 0.2rem rgba(48, 95, 167, 0.25);
        }
    </style>
</head>
<body>
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="auth-content zoomIn">
                @if(session('success'))
                    <div class="alert alert-success text-center mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="row g-0 h-100">
                        <!-- Carousel -->
                        <div class="col-md-6 d-none d-md-block">
                            <div id="loginCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="4000">
                                <div class="carousel-inner h-100">
                                    <div class="carousel-item active h-100">
                                        <img src="{{ asset('images/fams_1.jpeg') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item h-100">
                                        <img src="{{ asset('images/fams_2.jpeg') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item h-100">
                                        <img src="{{ asset('images/fams_3.jpeg') }}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Login Form -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="w-100 p-4">
                                <h5 class="text-center mb-3" style="color: #5cb85c;">FAMILY MANAGEMENT SYSTEM (FAMS)</h5>
                                <div class="img-circle">
                                    <img src="{{ asset('images/fams-logo.jpg') }}" alt="Logo">
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input placeholder="Enter username"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username" id="username" type="text"
                                               value="{{ old('username') }}" required autofocus />
                                        @error('username')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="input-group">
                                            <input placeholder="Enter password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   id="password" type="password" name="password" required />
                                            <button class="btn btn-outline-primary" type="button" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    @if(session('message'))
                                        <div class="alert alert-warning">{{ session('message') }}</div>
                                    @endif

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>

                                    <button class="btn btn-primary w-100">Login</button>
                                </form>

                                <div class="text-center mt-3">
                                    <a href="{{ route('reset_password') }}" class="text-muted">Forgot your password?</a>
                                </div>

                                <div class="text-center mt-4">
                                    <p>Don't have an account?
                                        <a href="{{ route('register') }}" class="fw-medium text-primary">Signup now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-3 text-center">
                    <b style="color: #305fa7">
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        <a target="_blank" href="#" style="color: #5cb85c">Family Management System</a> |
                        All Rights Reserved | FAMS V1.0.0
                    </b>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & Custom JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>
</body>
</html>
