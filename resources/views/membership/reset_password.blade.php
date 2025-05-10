<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMS - Reset Password</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .auth-layout-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .auth-content {
            max-width: 1100px;
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
    </style>
</head>

<body>

    <div class="auth-layout-wrap">
        
        <div class="auth-content zoomIn">
            @if(session('general_error'))
                <div class="alert alert-danger text-center mb-4" role="alert">
                    {{ session('general_error') }}
                </div>
            @endif
            <div class="card col-md-9 mx-auto">
                
                <div class="row g-0">
                    <div class="w-100 p-4">
                        <h5 class="text-center" style="color: #5cb85c; font-family: Cambria;">
                            FAMILY MANAGEMENT SYSTEM (FAMS)
                        </h5>

                        <div class="img-circle">
                            <img src="{{ asset('images/fams-logo.jpg') }}" alt="Logo">
                        </div>
                        <form method="POST" action="{{ route('membership.post_password') }}">
                            @csrf

                            <div class="alert alert-success text-center mb-4" role="alert">
                                Enter your Email and instructions will be sent to you!
                            </div>

                            <div class="form-group mb-3">
                                <input placeholder="Type your email here!"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" type="text"
                                    value="{{ old('email') }}" autofocus />
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            @if(session('message'))
                                <div class="alert alert-warning">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <button class="btn btn-primary w-100">Submit</button>
                        </form>
                        <br>
                        <div>
                            <p>Remember it ? <a href="{{ route('home') }}">sign in here!</a></p>
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
</body>

</html>
