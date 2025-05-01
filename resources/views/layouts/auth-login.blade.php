<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMS - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #F2E7F3;
        }

        /* .auth-layout-wrap {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        } */

        .auth-content {
            max-width: 1100px;
    /* background-color: green; */

            width: 100%;
            text-align: center;
            padding: 1rem;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .zoomIn {
            animation: zoomIn 2s;
        }

        /* .card {
            width: 100%;
            max-width: 100%;
            overflow: hidden;
        } */

        .img-circle {
            width: 100px;
            height: 100px;
            background: linear-gradient(to right, #8dc63f, #255196);
            padding: 4px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .img-circle img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .auth-logo img {
            width: 60px;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-label {
            margin-left: 5px;
            font-size: 14px;
        }

        .alert {
            margin-bottom: 10px;
        }

        .form-control:focus {
            border-color: #305fa7;
            box-shadow: 0 0 0 0.2rem rgba(48, 95, 167, 0.25);
        }

        .btn-primary:hover {
            background-color: #244a84 !important;
            border-color: #244a84 !important;
        }

        .btn-primary {
            background-color: #305fa7;
            border-color: #305fa7;
        }

        /* New Styling for Heading Area */
        .text-content {
            max-width: 500px;
            text-align: left;
        }

        .main-heading {
            font-family: 'Nunito', sans-serif;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.3;
            color: #5e2ca5;
        }

        .main-heading .highlight {
            background: linear-gradient(to right, #ff4e50, #f9d423);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }

        .main-heading .highlight::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 8px;
            background: rgba(255, 0, 150, 0.2);
            border-radius: 4px;
            z-index: -1;
        }

        .subtext {
            font-size: 16px;
            color: #333;
            margin-top: 20px;
            font-weight: 400;
        }

        .auth-layout-wrap {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: whitesmoke;
}

.card {
    border: none;
    border-radius: 8px;
    overflow: hidden;
}

        
    </style>
</head>

<body>
<div class="row">
    <div class="col-md-5 d-flex align-items-center justify-content-end px-4">
        <div class="text-start text-content">
            <h2 class="main-heading">
                Strengthen Your <span class="highlight">Family Bonds</span><br />
                with Smart, Organized Living
            </h2>
            <p class="subtext">
               <h4> A caring and reliable platform to manage your family<br />
                with love, connection, and shared responsibility.</h4>
            </p>
        </div>
    </div>

    <div class="col-md-7">
        <div class="auth-layout-wrap">
            <div class="auth-content zoomIn">
                <div class="card">
                    <div class="row g-0">
                        <!-- Image section -->
                        <div class="col-md-6 col-lg-7 d-none d-md-block">
                            <img class="d-block w-100 h-100" src="{{ asset('images/fams_3.jpeg') }}" alt="Login Image" style="object-fit: cover;">
                        </div>

                        <!-- Login Form Section -->
                        <div class="col-md-6 col-lg-5 d-flex align-items-center">
                            <div class="w-100 p-4">
                                <h5 class="text-center" style="color: #5cb85c; font-family: Cambria;">FAMILY MANAGEMENT SYSTEM (FAMS)</h5>

                                <div class="img-circle">
                                    <img src="{{ asset('images/fams-logo.jpg') }}" alt="Logo">
                                </div>

                                <form method="POST" action="{{ route('landing') }}">
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
                                                <i class="icon-regular i-Eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    @if(session('message'))
                                        <div class="alert alert-warning">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>

                                    <button class="btn btn-primary w-100">Login</button>
                                </form>

                                <div class="text-center mt-3">
                                    <a href="auth-recoverpw.html" class="text-muted">Forgot your password?</a>
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

    
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('i-Eye');
                icon.classList.add('i-Eye-Visible');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('i-Eye-Visible');
                icon.classList.add('i-Eye');
            }
        });
    </script>
</body>

</html>
