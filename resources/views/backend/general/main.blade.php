<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    html, body {
      height: 100vh;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .page-wrapper {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .main-content-wrapper {
      flex: 1 1 auto;
      overflow: hidden;
    }

    .content-scrollable {
      height: 100%;
      overflow-y: auto;
      padding: 1.5rem;
    }

    .gradient-bg {
      background: linear-gradient(to bottom, #a0a4ab, #153b66);
      color: white;
    }

    .sidebar a, .navbar a, .footer a {
      color: white;
    }

    .sidebar a:hover, .navbar a:hover, .footer a:hover {
      color: #f0f0f0;
    }

    .sidebar .nav-link {
      padding: 10px 0;
    }

    .sidebar-logo {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid white;
      display: block;
      margin: 0 auto 20px;
    }

    .dropdown-menu .dropdown-item {
      color: black;
    }

    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item:focus {
      color: white;
      background-color: #4caf50;
    }

    @media (max-width: 767.98px) {
      .sidebar {
        flex-direction: column;
        align-items: center;
        width: 100%;
      }

      .sidebar .nav-link {
        text-align: center;
      }

      .sidebar-logo {
        width: 100px;
        height: 100px;
      }
    }
  </style>

  @stack('css')
</head>

<body style="font-family: 'Segoe UI', sans-serif;">
  <div class="page-wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg gradient-bg px-4"
      style="background: linear-gradient(90deg, #1d2a3a 0%, #2f4a66 70%, #4caf50 100%);">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <button type="button" class="btn btn-sm px-3 text-white" id="vertical-menu-btn">
          <i class="fa fa-fw fa-bars"></i>
        </button>

        <div class="text-white fw-bold fs-5 mx-auto text-center flex-grow-1">
          Family Management System (FAMS)
        </div>

        <div class="dropdown position-relative" style="min-width: 150px; text-align: right;">
          <a href="#" class="nav-link dropdown-toggle text-white p-0" id="userDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->lastname ?? 'User' }}
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

    <!-- Main Content Section -->
    <div class="main-content-wrapper">
      <div class="container-fluid h-100">
        <div class="row h-100 flex-nowrap">
          <!-- Sidebar -->
          <div class="col-12 col-md-3 col-lg-2 gradient-bg sidebar d-flex flex-column align-items-center py-4 h-100" id="sidebar">
            <img src="{{ asset('assets/images/exmpl.jpeg') }}" alt="Logo" class="sidebar-logo" />

            <ul class="nav flex-column w-100 px-3">
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('homepage') }}">
                  <i class="fas fa-home me-2"></i> Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('members') }}">
                  <i class="fas fa-users me-2"></i> Members List
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('payments') }}">
                  <i class="fas fa-money-bill-wave me-2"></i> Monthly Payments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('monthly_arrears') }}">
                  <i class="fas fa-exclamation-circle me-2"></i> Monthly Arrears
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">
                  <i class="fas fa-chart-line me-2"></i> Reports
                </a>
              </li>
            </ul>
          </div>

          <!-- Content Area -->
          <div class="col-12 col-md-9 col-lg-10 content-scrollable" id="main-content">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="gradient-bg text-center py-3 footer">
      <small>&copy; {{ now()->year }} FAMS System. All rights reserved.</small>
    </footer>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.getElementById('vertical-menu-btn').addEventListener('click', function () {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('d-none');
    });
  </script>

  @stack('js')
</body>
</html>
