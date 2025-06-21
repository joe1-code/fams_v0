<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FAMS - Membership Registration</title>

    <!-- Google Font & Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: whitesmoke;
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
            max-width: 900px;
            min-height: 470px;
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

        .form-control:focus {
            border-color: #305fa7;
            box-shadow: 0 0 0 0.2rem rgba(48, 95, 167, 0.25);
        }

        #container {
            height: 700px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .center-form {
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body>
<div class="container-fluid py-5" >
    <div class="auth-content zoomIn" id="container">

        @if(session('success'))
            <div class="alert alert-success text-center mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card w-100" style="max-width: 700px;"  style="background-color: red;">
            <div class="p-4">
                <h5 class="text-center mb-3" style="color: #5cb85c;">FAMILY MANAGEMENT SYSTEM (FAMS)</h5>
                <div class="img-circle">
                    <img src="{{ asset('images/fams-logo.jpg') }}" alt="Logo">
                </div>

                <form method="POST" action="{{ route('membership.register_member') }}" class="col-md-11 center-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstname" class="form-label text-start w-100">Firstname</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="Enter Firstname">
                            @error('firstname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="middlename" class="form-label text-start w-100">Middlename</label>
                            <input type="text" class="form-control @error('middlename') is-invalid @enderror" id="middlename" name="middlename" placeholder="Enter Middlename">
                            @error('middlename')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lastname" class="form-label text-start w-100">Lastname</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Enter Lastname">
                            @error('lastname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label text-start w-100">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label text-start w-100">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3 position-relative">
                            <label for="userpassword" class="form-label text-start w-100">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword"><i class="fas fa-eye"></i></button>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(session('message'))
                        <div class="alert alert-warning">{{ session('message') }}</div>
                    @endif

                    <button class="btn btn-primary w-100 mt-2">Register</button>

                    <div class="mt-4 text-center">
                        <p>Already have an account? <a href="{{ route('home') }}" class="fw-medium text-primary">Login</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-4 text-center">
            <b style="color: #305fa7">
                Copyright &copy;
                <script>document.write(new Date().getFullYear())</script>
                <a target="_blank" href="#" style="color: #5cb85c">Family Management System</a> |
                All Rights Reserved | FAMS V1.0.0
            </b>
        </div>
    </div>
</div>

<!-- Bootstrap & Password Toggle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('togglePassword')?.addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
</script>
</body>
</html>
