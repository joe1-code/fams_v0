<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom CSS -->
   <style>
    .gradient-bg {
        background: linear-gradient(to bottom, #a0a4ab, #153b66); /* smooth cool transition */
        color: white;
    }

    .sidebar a,
    .navbar a,
    .footer a {
        color: white;
    }

    .sidebar a:hover,
    .navbar a:hover,
    .footer a:hover {
        color: #f0f0f0;
    }

    .sidebar {
        min-height: 100vh;
    }

    .sidebar .nav-link {
        padding: 10px 0;
    }

    .sidebar-logo {
        height: 80px;
        object-fit: contain;
        margin-bottom: 20px;
    }

    .dropdown-menu .dropdown-item {
    color: black;
  }

  .dropdown-menu .dropdown-item:hover,
  .dropdown-menu .dropdown-item:focus {
    color: white;
    background-color: #4caf50;
  }
</style>


    @stack('css')
</head>
<body style="font-family: 'Segoe UI', sans-serif;">

    <!-- Top Navigation -->
<nav class="navbar navbar-expand-lg gradient-bg px-4" style="background: linear-gradient(90deg, #1d2a3a 0%, #2f4a66 70%, #4caf50 100%);">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    
    <!-- Empty div to balance flex -->
    <div style="width: 100px;"></div>

    <!-- Centered title -->
    <div class="text-white fw-bold fs-5 mx-auto text-center" style="flex-grow: 1;">
      Family Management System (FAMS)
    </div>

    <!-- User dropdown -->
    <div class="dropdown" style="width: 100px; text-align: right;">
      <a href="#" 
         class="nav-link dropdown-toggle text-white p-0" 
         id="userDropdown" 
         role="button" 
         data-bs-toggle="dropdown" 
         aria-expanded="false" 
         style="cursor: pointer;">
        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name ?? 'User' }}
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="#">Change Password</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="#">Manage Users</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>

  </div>
</nav>


    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 gradient-bg sidebar py-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid sidebar-logo">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-2"></i>HomePage</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-users me-2"></i>Members List</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-wallet me-2"></i>Monthly Payments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-line me-2"></i>Reports</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 py-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="gradient-bg text-center py-3 mt-auto footer">
        <small>&copy; {{ now()->year }} FAMS System. All rights reserved.</small>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('js')
</body>
</html>
