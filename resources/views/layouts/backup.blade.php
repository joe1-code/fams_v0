<!-- Home blade -->
@extends('backend.general.main', ['activePage' => 'table', 'title' => 'HCP PORTAL', 'navName' => '', 'activeButton' => 'laravel'])

@section('content')
<!doctype html>
<html lang="en">
    <style>

        th {
            background-color: #e3f2fd;
        }
        .over15color{
            background-color: #e6771c;
        }
        .incidentMonth{
            background-color: #e3f2fd;
        }



    </style>
@php
$active = $memberData->where('active', 1)->count();
$inactive = $memberData->where('active', 0)->count();
@endphp
    
<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Oct 2022 14:34:47 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Dashboard | FAMS - Family Management system.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    </head>

    <body data-sidebar="dark" data-layout-mode="light">
    
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/user4.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key=""></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" method="POST"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Fund Items List</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-group"></i>
                                    <span key="t-contributions">Membership</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('landing/homepage') }}" key="t-members">HomePage</a></li>
                                    <li><a href="{{ route('members') }}" key="t-members">Members List</a></li>
                                    <li><a href="#" key="t-members">Register Members</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-credit-card"></i>
                                    <span key="t-contributions">Contributions</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('payments') }}" method='POST' key="t-payments">Monthly Payments</a></li>
                                    <li><a href="{{ route('monthly_arrears') }}" key="t-arrears">Monthly Arrears</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('reports') }}" class="waves-effect">
                                    <i class="fa fa-file-alt"></i>
                                    <span key="t-contributions">Reports</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                 <h4 class="card-title mb-4">Welcome.</h4>
                <div class="row">
        <div class="col-md-6">
            <div>&nbsp;</div>
            <div class="computation-group">
                <table class="table table-bordered" style="text-align: center; background-color: #e3f2fd ;">
                    <thead>
                    <th style="text-align: center">Full Names</th>
                    <th style="text-align: center">Phone</th>
                    <th style="text-align: center">Region</th>
                    <th style="text-align: center">Action</th>
                    </thead>
                    <tbody>

                    @foreach($memberData as $data)
                        <tr class="" style="text-align: left">
                            <td>{{ $data->firstname.' '.$data->middlename.' '.$data->lastname }}</td>
                                <td style="text-align: right">
                                    {{ $data->phone }}
                                </td>
                            <td class="" style="text-align: center">{{$data->region_name}}</td>
                            @if($data->active == true)
                            <td style="text-align: right;">
                                <button class="btn btn-secondary site-btn" style="font-weight: normal; background-color: white; color: black;">
                                    <i class="fas fa-pencil-alt" aria-hidden="true" style="color: black;"></i> Deactivate
                                </button>
                            </td>

                            @else
                            
                            <td style="text-align: right;">
                                <button class="btn btn-secondary site-btn" style="font-weight: normal; background-color: white; color: black;">
                                    <i class="fas fa-pencil-alt" aria-hidden="true" style="color: black;"></i> Activate
                                </button>
                            </td>
                            @endif
                        </tr>
                     @endforeach   
                    </tbody>

                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th colspan="4" style="text-align: center; background-color: #e3f2fd ;">REGISTERED MEMBERS</th></tr>
                    <tr><th style="text-align: center; background-color: green;">Active</th>
                        <!-- <th>Amount</th> -->
                            <th style="text-align: center; background-color:#e6771c;">Inactive</th>
                        <!-- <th>Remark</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;">{{ $active }}</td>
                        <!-- <td> {{ 5600 }} </td> -->
                            <td style="text-align: center;">
                                {{ $inactive }}
                            </td>
                        <!-- <td>{{ 'Need Review' }}</td> -->
                    </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th colspan="4" style="text-align: center; background-color: #e3f2fd ;">CHAIRPERSON</th></tr>
                        <th>Full Names</th>
                        <td>{{ $data->firstname.' '.$data->middlename.' '.$data->lastname }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td> {{ 29 }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td> {{ 29 }}</td>
                    </tr>
                    
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th colspan="4" style="text-align: center; background-color: #e3f2fd ;">GENERAL SECRETARY</th></tr>
                        <th>Full Names</th>
                        <td>{{ $data->firstname.' '.$data->middlename.' '.$data->lastname }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td> {{ 29 }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td> {{ 29 }}</td>
                    </tr>
                    
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th colspan="4" style="text-align: center; background-color: #e3f2fd ;">ACCOUNTANT</th></tr>
                        <th>Full Names</th>
                        <td>{{ $data->firstname.' '.$data->middlename.' '.$data->lastname }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td> {{ 29 }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td> {{ 29 }}</td>
                    </tr>
                    
                </table>
            </div>
                
                </div>
           
        </div>
        <div>&nbsp;</div>

        </div>
        <div>&nbsp;</div>
        <legend></legend>
        <div>&nbsp;</div>   
            </div>
        </div>
    </div>
</div>

</html>
@endsection

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const viewDetailsButtons = document.querySelectorAll('.view-details-btn');

    viewDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const memberId = this.getAttribute('data-id');
            const memberName = this.getAttribute('data-name');

            document.getElementById('member-id').textContent = memberId;
            document.getElementById('member-name').textContent = memberName;
            document.getElementById('edit-member-id').value = memberId;
        });
    });
});
</script>
@endpush

<!-- contribution blade -->
 
<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Dashboard | FAMS - Family Management system.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <style>
        @keyframes zoomIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .zoomIn {
            animation: zoomIn 1.5s;
        }

        @keyframes zoomOut {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(0);
            }
        }

        .zoomOut {
            animation: zoomOut 1.5s;
        }
        tr:hover {
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 8px rgba(57, 5, 229, 0.989);
        cursor: pointer;
        /* transform: scale(1.09); */
        transition: transform 0.2s ease-in-out;
    }
    .cursor{
        cursor: pointer;
    }
</style>

    </head>
    <!-- <script>
    setInterval(function() {
        fetch("{{ route('logout') }}", {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(response => {
            if (!response.ok) {
                window.location.href = "{{ route('logout') }}";
            }
        })
        .catch(error => {
            console.error("Session expired:", error);
            window.location.href = "{{ route('logout') }}";
        });
    }, 120000); // Check session every 2 minutes
</script> -->


    <body data-sidebar="dark" data-layout-mode="light">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/user4.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key=""></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" method="POST"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Fund Items List</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-group"></i>
                                    <span key="t-contributions">Membership</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('landing/homepage') }}" key="t-members">HomePage</a></li>
                                    <li><a href="{{ route('members') }}" key="t-members">Members List</a></li>
                                    <li><a href="#" key="t-members">Register Members</a></li>
                                    <!-- <li><a href="dashboard-job.html"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-credit-card"></i>
                                    <span key="t-contributions">Contributions</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('payments') }}" method='POST' key="t-payments">Monthly Payments</a></li>
                                    <li><a href="{{ route('monthly_arrears') }}" key="t-arrears">Monthly Arrears</a></li>
                                    <!-- <li><a href="dashboard-job.html"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li> -->
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- end page title -->

                        <div class="row">
                           
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Members</p>
                                                        <h4 class="mb-0">{{$memberData->count()}}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="fas fa-users font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Monthly Earnings</p>
                                                        <h4 class="mb-0">Tshs. {{ $earnings }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Fund Balance(UTT AMIS)</p>
                                                        <h4 class="mb-0">Tshs. {{ $utt_amis }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-trending-up font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Average Amount</p>
                                                        <h4 class="mb-0">Tshs. {{ $average_amount }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fas fa-dollar-sign font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                           
                        </div>
                        <!-- end row -->

                        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4" style="display: flex; justify-content:center;">FUND MEMBERSHIP(MEMBERS)</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap " id="members_dt">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">No.(#)</th>
                                <th class="align-middle">Full Name</th>
                                <th class="align-middle">Region</th>
                                <th class="align-middle">District</th>
                                <th class="align-middle">Phone</th>
                                <th class="align-middle">Availability</th>
                                <th class="align-middle">DOB</th>
                                <th class="align-middle">DOD</th>
                                <th class="align-middle">Membership Status</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © FAMS.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by FAMS.
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>


</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function() {
    
    
    $('#members_dt').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('members/getForDt') }}",
    columns: [
        { 
            data: null, 
            name: 'index', 
            orderable: false, 
            searchable: false,
            render: function(data, type, row, meta) {
                return meta.row + 1; // Display index number (starting from 1)
            } 
        },
        { data: 'fullname', name: 'fullname' },
        { data: 'region_name', name: 'region_name' },
        { data: 'district_name', name: 'district_name' },
        { data: 'phone', name: 'phone' },
        {
            data: 'available',
            name: 'available',
            orderable: false,
            searchable: false,
            render: function(data) {
                return data === true ? 
                    '<span class="badge bg-info">Available</span>' : 
                    '<span class="badge bg-danger">Passed Away</span>';
            }
        },
        { data: 'dob', name: 'dob' },
        { data: 'dod', name: 'dod' },
        {
            data: 'membership_status',
            name: 'membership_status',
            orderable: false,
            searchable: false,
            render: function(data) {
                return data === true ? 
                    '<span class="badge bg-success">Active</span>' : 
                    '<span class="badge bg-warning">Not Active</span>';
            }
        },
        {
            data: null,
            name: 'action',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                
                // Dynamically include user ID in the URL
                var memberUrl = "{{ route('edit/members') }}?member_id=" + row.user_id;
                console.log(memberUrl);
                

                return `
                    <form action="${memberUrl}" method="GET" style="display:inline;" class="update_form">
                        <button type="submit" class="btn btn-primary btn_update">
                            <input type="hidden" name="member_id" value="${row.user_id}">
                            <i class="fas fa-edit"></i> Update Details
                        </button>
                    </form>
                `;
            }
        }

    ],
    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
  $('td', nRow).click(function() {
    // document.location.href = "{{ route('arrears_summary') }}?id=" + aData['id'];
  }).hover(function() {
    $(this).css('cursor', 'pointer');
  }, function() {
    $(this).css('cursor', 'auto');
  });
}
,
    success: function(response){
        console.log(response);
        
    },
    order: [[0, 'desc']],
    dom: '<"d-flex justify-content-end"f><"table-responsive"t><"d-flex justify-content-end"ip>',
    // dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
    responsive: true 
});
});

    $(document).on('click', '.btn_update', function(e){

        e.preventDefault();

        let form = $(this).closest('.update_form');
        // console.log(form);
        // console.log(form.find(['input[name="member_id"]']).val(memberId));
        
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to edit this member's data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });


document.addEventListener("DOMContentLoaded", function() {
    const viewDetailsButtons = document.querySelectorAll('.view-details-btn');

    viewDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const memberId = this.getAttribute('data-id');
            const memberName = this.getAttribute('data-name');

            document.getElementById('member-id').textContent = memberId;
            document.getElementById('member-name').textContent = memberName;
            document.getElementById('edit-member-id').value = memberId;
        });
    });
});
</script>

<!-- Layouts edit contrib -->
 
<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Membership | FAMS - Family Management system.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/fams-logo.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <style>
            .callout {
                padding: 1.5rem;
                margin: 1rem 0;
                border-left: 4px solid #0d6efd; /* Bootstrap primary color */
                background-color: #e7f1ff; /* Light blue background */
                border-radius: 0.375rem; /* Rounded corners */
            }

            .callout h4 {
                margin-top: 0;
                font-weight: bold;
            }

            .callout p {
                margin-bottom: 0;
            }

            .required-field::after {
                content: " *";
                color: red;
            }

            #surveyed_area_descrpition {
                padding: 0px;
                margin: 0;
                line-height: 1.5;
                vertical-align: top;
                box-sizing: border-box; /* Ensures padding is included in width/height */
                font-size: 16px; /* Match the font size to your design */
            }
            #unsurveyed_area_descrpition {
                padding: 0px;
                margin: 0;
                line-height: 1.5;
                vertical-align: top;
                box-sizing: border-box; /* Ensures padding is included in width/height */
                font-size: 16px; /* Match the font size to your design */
            }

            .container {
                display: flex;
                align-items: flex-start;
                gap: 20px;
            }

            .vertical-step-indicator-container {
                width: 100px;
                text-align: center;
                display: flex;
                justify-content: center;
                /* background-color: red; */
            }

            .vertical-step-indicator {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .step-item {
                width: 40px;
                height: 40px;
                line-height: 40px;
                border-radius: 50%;
                background-color: #ddd;
                color: #fff;
                font-weight: bold;
                font-size: 16px;
                transition: background-color 0.3s, color 0.3s;
            }

            .step-item.active {
                background-color: #007bff;
                color: #fff;
            }

            .step-item.completed {
                background-color: #28a745;
                color: #fff;
            }

            .form-container {
                flex: 1;
            }



        </style>

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/user4.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key=""></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" method="POST"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Fund Items List</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-group"></i>
                                    <span key="t-contributions">Membership</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('home') }}" key="t-members">HomePage</a></li>
                                    <li><a href="{{ route('members') }}" key="t-members">Members List</a></li>
                                    <li><a href="#" key="t-members">Register Members</a></li>
                                    <!-- <li><a href="dashboard-job.html"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-credit-card"></i>
                                    <span key="t-contributions">Contributions</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('payments') }}" method='POST' key="t-payments">Monthly Payments</a></li>
                                    <li><a href="{{ route('monthly_arrears') }}" key="t-arrears">Monthly Arrears</a></li>
                                    <!-- <li><a href="dashboard-job.html"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li> -->
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
             @php
             $doc = $doc ?? \Carbon\Carbon::now();

             @endphp
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="alert alert-primary border-start border-5 border-info rounded-3 p-4 shadow">
                                        <h4 class="alert-heading">Edit Members Particulars.</h4>
                                        <p class="mb-0">Whether an Admin or a member himself or herself can edit the particulars.</p>
                                    </div>
                                </div>

                                <div class="container d-flex">
                                    <!-- Vertical Step Indicator -->
                                    <div class="vertical-step-indicator-container">
                                        <ul class="vertical-step-indicator">
                                            <li class="step-item active" data-step="0">1</li>
                                            <span>Personal Information</span>
                                            <li class="step-item" data-step="1">2</li>
                                            <span>Contact Details</span>
                                            <li class="step-item" data-step="2">3</li>
                                            <span>Professional Details</span>
                                        </ul>
                                    </div>

                                    <!-- Multi-step Form -->
                                    <div class="form-container">
                                        <form id="multiStepForm" method="POST" action="">
                                            @csrf
                                            <!-- Step 1 -->
                                            <div class="form-step" id="step-1" style="display: block;">
                                                <br>
                                                <div class="line-separator border-bottom border-1 border-secondary pb-2 mb-4">
                                                    <h4 class="d-flex align-items-center">
                                                        <i class="fas fa-user me-2"></i> Personal Information
                                                    </h4>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="firstname" class="required-field">Firstname</label>
                                                        <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname', $particulars->firstname ?? '') }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="middlename" class="required-field">Middlename</label>
                                                        <input type="text" id="middlename" name="middlename" class="form-control" value="{{ old('middlename', $particulars->middlename ?? '') }}" required>
                                                    </div>
                                                    
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label for="lastname" class="required-field">Lastname</label>
                                                        <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname', $particulars->lastname ?? '') }}" required>
                                                    </div>
                                                    <div class="row col-md-4">
                                                        <label for="doc" class="required-field">
                                                            Date of Birth (DOB)
                                                        </label>
                                                        <div class="col">
                                                            <select name="dob_day" id="dob_day" class="form-control search-select" style="width:100%;" required>
                                                                <option value="" disabled></option>
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    <option value="{{ $i }}" {{ $doc->format('j') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="dob_month" id="dob_month" class="form-control search-select" style="width:100%;" required>
                                                                <option value="" disabled></option>
                                                                @for ($i = 1; $i <= 12; $i++)
                                                                    <option value="{{ $i }}" {{ $doc->format('n') == $i ? 'selected' : '' }}>
                                                                        {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="dob_year" id="dob_year" class="form-control search-select" style="width:100%;" required>
                                                                <option value="" disabled></option>
                                                                @for ($year = now()->format('Y'); $year >= 1900; $year--)
                                                                    <option value="{{ $year }}" {{ $doc->format('Y') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="doc" />
                                                    <input type="hidden" name="today_date" value="{{ getTodayDate() }}" />

                                                    <span class="form-text text-muted">
                                                        <p></p>
                                                    </span>
                                                
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="tin_no" class="required-field1">TIN No.</label>
                                                        <input type="number" id="tin_no" name="tin_no" value="{{ old('tin_no', $user_data->tin_no ?? '') }}" class="form-control">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="nida_no" class="required-field1">National Identification Number (NIDA).</label>
                                                        <input type="number" id="nida_no" name="nida_no" value="{{ old('nida_no', $user_data->nin  ?? '') }}" class="form-control">
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="passport_no" class="required-field1">Passport No.</label>
                                                        <input type="number" id="passport_no" name="passport_no" value="{{ old('passport_no', $user_data->passport_no  ?? '') }}" class="form-control">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="countries" class="required-field">Country.</label>
                                                        <select name="country" id="country" class="form-control" required>
                                                            <option value="">Select</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{ $country->id}}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    

                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="unit" class="required-field">Member Unit.</label>
                                                        <select name="unit" id="unit" class="form-control" required>
                                                            <option value="">Select</option>
                                                            @foreach($units as $unit)
                                                            <option value="{{ $unit->id}}">{{ $unit->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="designation" class="required-field">Member Designation.</label>
                                                        <select name="designation" id="designation" class="form-control" required>
                                                            <option value="">Select</option>
                                                            @foreach($designations as $designation)
                                                            <option value="{{ $designation->id}}">{{ $designation->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="entitled_amount" class="required-field">Entitled Amount.</label>
                                                        <input type="number" id="entitled_amount" name="entitled_amount" class="form-control" value="{{ old('entitled_amount', $particulars->entitled_amount ?? '') }}" required>
                                                    </div>
                                                    <!-- Add Monthly Earnings to the Row -->
                                                    <div class="col-md-4">
                                                        <label for="monthly_earning" class="required-field">Monthly Earnings</label>

                                                        <div class="form-group">
                                                            <input type="number" id="monthly_earning" name="monthly_earning" value="{{ old('monthly_earning', $user_data->monthly_earning ?? '') }}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="next-btn" style="display: flex; justify-content:end">
                                                    <button type="button" class="btn btn-primary next-btn">Next <i class="fas fa-arrow-right"></i></button>
                                                </div>
                                            </div>

                                            <!-- Step 2 -->
                                            <div class="form-step" id="step-2" style="display: none;">
                                                <br>
                                                <div class="line-separator border-bottom border-1 border-secondary pb-2 mb-4">
                                                    <h4 class="d-flex align-items-center">
                                                        <i class="fas fa-university me-2"></i> Contact Details
                                                    </h4>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="email" class="">Email Address</label>
                                                        <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $particulars->email ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="phone" class="required-field">Phone Number</label>
                                                        <input type="text" id="phone_no" name="phone_no" class="form-control" value="{{ old('phone_no', $particulars->phone ?? '') }}" required>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="box" class="">P.O.Box</label>
                                                        <input type="text" id="box" name="box" value="{{ old('box', $user_data->address ?? '') }}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="fax" class="">Fax</label>
                                                        <input type="text" id="fax" name="fax" value="{{ old('fax', $user_data->fax ?? '') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="region" class="required-field">Member Region.</label>
                                                        <select name="region" id="region" class="form-control" required>
                                                            <option value="">Select</option>
                                                            @foreach($regions as $region)
                                                            <option value="{{ $region->id}}">{{ $region->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="district" class="required-field">Member District.</label>
                                                        <select name="district" id="district" class="form-control">
                                                            <option value="">Select</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="location" class="required-field">Location Type.</label>
                                                        <select name="location" id="location" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="1">Surveyed Area</option>
                                                            <option value="2">Unsurveyed Area</option>
                                                        </select>
                                                    </div>
                                                    <div class="column col-md-4" id="area_unsurveyed">
                                                        <label for="unsurveyed_area_descrpition" class="required-field">Unsurveyed Area Description</label>
                                                        <textarea 
                                                            name="unsurveyed_area_descrpition" 
                                                            id="unsurveyed_area_descrpition" 
                                                            class="form-control" 
                                                            rows="4" 
                                                            value="{{ old('unsurveyed_area_descrpition', $user_data->unsurveyed_area_description ?? '') }}"
                                                            placeholder="Enter details about the unsurveyed area">
                                                            
                                                        </textarea>
                                                        <span class="small">Enter details about the unsurveyed area</span>
                                                    </div>

                                                </div>
                                                <br>
                                                <div id="area_surveyed">
                                                    <div class="row col-md-11" >
                                                        <div class="form-group col-md-4">
                                                            <label for="road" class="">Road</label>
                                                            <input type="text" id="road" name="road" value="{{ old('road', $user_data->road ?? '') }}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="plot" class="">Plot No.</label>
                                                            <input type="text" id="plot" name="plot" value="{{ old('plot', $user_data->plot_no ?? '') }}" class="form-control">
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row col-md-11">
                                                        <div class="form-group col-md-4">
                                                            <label for="block" class="">Block No.</label>
                                                            <input type="text" id="block" name="block" value="{{ old('block', $user_data->block_no ?? '') }}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="Street" class="">Street.</label>
                                                            <input type="text" id="Street" name="Street" value="{{ old('Street', $user_data->street ?? '') }}" class="form-control">
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="column col-md-4">
                                                        <label for="surveyed_area_descrpition" class="required-field">Surveyed Area Description</label>
                                                        <textarea 
                                                            name="surveyed_area_descrpition" 
                                                            id="surveyed_area_descrpition" 
                                                            class="form-control" 
                                                            rows="4" 
                                                            value="{{ old('surveyed_area_descrpition', $user_data->surveyed_area_descrpition ?? '') }}"
                                                            placeholder="Enter details about the surveyed area">
                                                        </textarea>
                                                        <span class="small">More details about surveyed area i.e Bulding Name, Floor, Office / Room Number</span>
                                                    </div>

                                                </div>
                                                    
                                                <br>
                                                <div class="next-btn" style="display: flex; justify-content:end; gap: 4px;">
                                                    <button type="button" class="btn prev-btn"><i class="fas fa-arrow-left"></i> Previous</button>
                                                    <button type="button" class="btn btn-primary next-btn">Next  <i class="fas fa-arrow-right"></i></button>
                                                </div>
                                            </div>

                                            <!-- Step 3 -->
                                            <div class="form-step" id="step-3" style="display: none;">
                                                <br>
                                                <div class="line-separator border-bottom border-1 border-secondary pb-2 mb-4">
                                                    <h4 class="d-flex align-items-center">
                                                        <i class="fas fa-briefcase me-2"></i> Professional/Bussiness Details
                                                    </h4>
                                                </div>
                                                <br>
                                                <div class="row col-md-11" >
                                                    <div class="form-group col-md-4">
                                                        <label for="job_title" class="">Job Title</label>
                                                        <input type="text" id="job_title" name="job_title" class="form-control" value="{{ old('job_title', $particulars->job_title ?? '') }}">
                                                    </div>
                                                    <div class="column col-md-4" id="job_description">
                                                        <label for="job_description" class="required-field">Job Description</label>
                                                        <textarea 
                                                            name="job_description" 
                                                            id="job_description" 
                                                            class="form-control" 
                                                            rows="4" 
                                                            value="{{ old('job_description', $user_data->job_description ?? '') }}"
                                                            placeholder="Enter details about the job you do">
                                                        </textarea>
                                                        <span class="small">Enter details about the way you carry your job</span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="business_name" class="">Business Name</label>
                                                        <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $user_data->business_name ?? '') }}" class="form-control">
                                                    </div>
                                                    <div class="column col-md-4" id="business_nature">
                                                        <label for="business_nature" class="">Nature Of Business</label>
                                                        <textarea 
                                                            name="business_nature" 
                                                            id="business_nature" 
                                                            class="form-control" 
                                                            rows="4" 
                                                            value="{{ old('business_nature', $user_data->business_nature ?? '') }}"
                                                            placeholder="Enter details about the business you do">
                                                        </textarea>
                                                        <span class="small">Enter details about the way you carry your business</span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row col-md-11">
                                                    <div class="form-group col-md-4">
                                                        <label for="education_level" class="required-field">Education Level.</label>
                                                        <select name="education_level" id="education_level" class="form-control" required>
                                                            <option value="">Select</option>
                                                            <option value="1">Primary</option>
                                                            <option value="2">Secondary</option>
                                                            <option value="3">Diploma</option>
                                                            <option value="4">Bachelor's Degree</option>
                                                            <option value="5">Masters' Degree</option>
                                                            <option value="6">phD Degree</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4" id="degree_name">
                                                        <label for="degree_name" class="required-field">Latest Diploma/Degree Name.</label>
                                                        <input type="text" id="degree_name" name="degree_name" value="{{ old('degree_name', $user_data->diploma_degree_name ?? '') }}" class="form-control">
                                                        <span class="small">e.g BSc. In Information Systems And Networking Engineering.</span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row col-md-11" id="university">
                                                    <div class="form-group col-md-4">
                                                        <label for="university_name" class="required-field">Latest University Name.</label>
                                                        <input type="text" id="university_name" name="university_name" value="{{ old('university_name', $user_data->university_education ?? '') }}" class="form-control">
                                                        <span class="small">e.g University Of Dar Es Salaam (UDSM) </span>
                                                    </div>
                                                    <div class="row col-md-4">
                                                        <label for="doc" class="required-field">
                                                            Latest Degree Completion Date
                                                        </label>
                                                        <div class="col">
                                                            <select name="uni_day" id="uni_day" class="form-control search-select" style="width:100%;">
                                                                <option value="" disabled></option>
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    <option value="{{ $i }}" {{ $doc->format('j') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="uni_month" id="uni_month" class="form-control search-select" style="width:100%;">
                                                                <option value="" disabled></option>
                                                                @for ($i = 1; $i <= 12; $i++)
                                                                    <option value="{{ $i }}" {{ $doc->format('n') == $i ? 'selected' : '' }}>
                                                                        {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="uni_year" id="uni_year" class="form-control search-select" style="width:100%;">
                                                                <option value="" disabled></option>
                                                                @for ($year = now()->format('Y'); $year >= 1900; $year--)
                                                                    <option value="{{ $year }}" {{ $doc->format('Y') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="doc" />
                                                    <input type="hidden" name="today_date" value="{{ getTodayDate() }}" />
                                                </div>
                                                <br>
                                                <div class="next-btn" style="display: flex; justify-content:end; gap:4px;">
                                                    <button type="button" class="btn prev-btn"><i class="fas fa-arrow-left"></i> Previous</button>
                                                    <button type="submit" class="btn btn-success" id="btn_submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            <div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © FAMS.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by FAMS.
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>


</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    const steps = document.querySelectorAll(".form-step");
    const stepIndicators = document.querySelectorAll(".step-item");
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");

    let currentStep = 0;

    // Function to display the current step
    const showStep = (step) => {
        steps.forEach((formStep, index) => {
            formStep.style.display = index === step ? "block" : "none";
        });

        stepIndicators.forEach((indicator, index) => {
        console.log(indicator, index);
        
        if (index === step) {
            indicator.classList.add("active");
            indicator.classList.remove("completed");
        } else if (index < step) {
            indicator.classList.add("completed");
            indicator.classList.remove("active");
        } else {
            indicator.classList.remove("active", "completed");
        }
    });
        // console.log(`Displaying Step: ${step}`);
    };
    
    

    // Function to handle the "Next" button click
    const handleNext = (event) => {
        event.stopPropagation(); // Prevent event bubbling
        if (currentStep < steps.length - 1) {
            currentStep++;
            // console.log(`Current Step After Click: ${currentStep}`);
            showStep(currentStep);
        }
    };

    // Function to handle the "Previous" button click
    const handlePrev = (event) => {
        event.stopPropagation(); // Prevent event bubbling
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    };

        // Attach single event listeners to buttons
        nextBtns.forEach((btn) => {
        btn.addEventListener("click", handleNext); // Ensure only one listener
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", handlePrev); // Ensure only one listener
    });

    // Initialize the first step
    showStep(currentStep);
</script>

<script>
    $(document).ready(function(){

        $('#area_unsurveyed').hide();
        $('#area_surveyed').hide();
        $('#degree_name').hide();
        $('#university').hide();
        
        $('#region').on('change', function(){

            const region_id = $(this).val();
            
            const district_select = $('#district');

            district_select.html('<option value="">select</option>');

            if (region_id) {
                
                $.ajax({
                    url: `/api/district/get/${region_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                            data.forEach(function(district){
                                district_select.append(`<option value="${district.id}">${district.name}</option>`);
                            });
                    },
                    error: function(xhr, error, status){

                        console.error('error occured while fetching district', error);
                        
                    }
                });
            }
        });

        $('#location').on('click', function(){

            const area = $('#location').val();        
            console.log(area);

            $('#area_unsurveyed').hide();
            $('#area_surveyed').hide();

            if (area == 1) {
                $('#area_surveyed').show();
            }
            else if(area == 2){
                $('#area_unsurveyed').show();
            }
        });

        $('#education_level').on('click', function(){

            $('#degree_name').hide();
            $('#university').hide();

            const degree = $(this).val();

            if (degree == 3 || degree == 4 || degree == 5 || degree == 6) {
                
                $('#degree_name').show();
                $('#university').show();

            }
        });

        $('#btn_submit').on('click', function(e){

            e.preventDefault();
            const form = document.querySelector('#multiStepForm');
                        
            const formData = {};
            $('#multiStepForm').find('input, select, textarea').each(function () {
                const name = $(this).attr('name');
                if (name) {
                    formData[name] = $(this).val();
                }
            });
            
            $.ajax({

                url: "{{ route('submit_members', ['id'=>$request->input('member_id')]) }}",
                method: "POST",
                data: formData,
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){

                    Swal.fire({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();

                            //redirect route
                            // window.location.href = 'my_redirect_route';
                        }
                    });

                },
                error: function(error, xhr, status){
                    console.log('error detected: ', error.responseJSON || error.responseText);
                    let errorMessage = xhr.responseJSON?.message || "An error occurred!";
                    Swal.fire({
                        title: "Error!",
                        text: errorMessage,
                        icon: "error",
                        confirmButtonText: "Try Again"
                    });
                },
            });
            
        });
    });
</script>

<!-- edit_contributions  -->
 
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Oct 2022 14:34:47 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Dashboard | FAMS - Edit Members Infos.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/fa.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />


    </head>

    <body data-sidebar="dark" data-layout-mode="light">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        

        @include('layouts.includes.layouts')
<!-- /Right-bar -->
        <!-- Include Select2 CSS -->

<!-- Include jQuery -->

<!-- Include Select2 JS -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
</html>

<!-- monthly_payments blade -->
 <!doctype html>
<html lang="en">
<style>
    /* Add faint green border styling for separator lines */
    .separator-line {
        /**faint green */
         border-bottom: 1px solid #a0d6a0; 
        /* border-bottom: 1px solid #7db8d6;  */
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .title_name{
        font-size: 16px;
        color: #333333; 
    }

    .list-group-item-heading {
        font-weight: normal;
    }
</style>

<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Oct 2022 14:34:47 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Dashboard | FAMS - Family Management system.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    </head>
    <script>
    // setInterval(function() {
    //     fetch("{{ route('logout') }}", {
    //         method: "GET",
    //         headers: {
    //             "X-Requested-With": "XMLHttpRequest"
    //         }
    //     })
    //     .then(response => {
    //         if (!response.ok) {
    //             window.location.href = "{{ route('logout') }}";
    //         }
    //     })
    //     .catch(error => {
    //         console.error("Session expired:", error);
    //         window.location.href = "{{ route('logout') }}";
    //     });
    // }, 120000); // Check session every 2 minutes
</script>


    <body data-sidebar="dark" data-layout-mode="light">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/user4.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key=""></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" method="POST"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Fund Items List</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-group"></i>
                                    <span key="t-contributions">Membership</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('home') }}" key="t-members">Home</a></li>
                                    <li><a href="{{ route('members') }}" key="t-members">Members List</a></li>
                                    <li><a href="#" key="t-members">Register Members</a></li>
                                    <!-- <li><a href="dashboard-job.html"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-credit-card"></i>
                                    <span key="t-contributions">Contributions</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('payments') }}" method='POST' key="t-payments">Monthly Payments</a></li>
                                    <li><a href="{{ route('monthly_arrears') }}" key="t-arrears">Monthly Arrears</a></li>
                                    <!-- <li><a href="dashboard-job.html"><span class="badge rounded-pill text-bg-success float-end" key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li> -->
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">                        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4" style="display: flex; justify-content:center;">MONTHLY CONTRIBUTIONS PAYMENTS MENU</h4>
                                <div class="row">
                        <div class="col-md-12">
                            <div>&nbsp;</div>
                            <div class="computation-group">
                                <!-- Here to put the content panel-->
                                <div style="color:#fff">
                                    <div class="col-sm-12 col-md-12">

                                        <br>
                                        <!-- Add a slightly darker grey background to the heading or surrounding div -->
                                        <div style="background-color: #d3d3d3; padding: 10px;">
                                            <h6 class="cancel_button site-btn" style="color: black; margin: 0; display:flex; justify-content:center;">MONTHLY PAYMENTS PROCESS</h6>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="separator-line">
                                                    <a href="#">
                                                        <h6 class="list-group-item-heading ng-binding">
                                                            <a href="{{ route('monthly_payment_show') }}" style="color: inherit;"> 
                                                                <i class="icon fa fa-credit-card" style="color: #333;"></i>
                                                                <span class="title_name">&nbsp;&nbsp;Process Monthly Payments</span>
                                                            </a>
                                                        </h6>
                                                        <p style="color: grey;" class="list-group-item-text ng-binding">
                                                            Pay your current monthly contributions which you are entitled ready for processing.
                                                        </p>

                                                    </a>
                                                </div>
                                                <div class="separator-line">
                                                    <a href="#">
                                                        <h6 class="list-group-item-heading ng-binding">
                                                            <a href="{{ route('workflow_history') }}" style="color: inherit;"> 
                                                                <i class="icon fa fa-history" style="color: #333;"></i>
                                                                <span class="title_name">&nbsp;&nbsp;Workflow History</span>
                                                            </a>
                                                        </h6>
                                                        <p style="color: grey;" class="list-group-item-text ng-binding">
                                                            Keep Track or Make Followup of your Workflows for Submitted Monthly Contributions Payments.
                                                        </p>

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="separator-line">
                                                    <a href="{{ route('monthly_documents') }}" style="color: inherit;">
                                                        <h6 class="list-group-item-heading ng-binding">
                                                            <i class="icon fa fa-book-open"  style="color: #333;"></i>
                                                            <span class="title_name">&nbsp;&nbsp;Document Centre</span>
                                                        </h6>
                                                            <p style="color: grey;" class="list-group-item-text ng-binding">
                                                                View your submitted documents ready for payment processing 
                                                            </p>
                                                    </a>
                                                </div>
                                                <div class="separator-line">
                                                    <a href="#">
                                                        <h6 class="list-group-item-heading ng-binding">
                                                            <a href="{{ route('monthly_nonpaid') }}" style="color: inherit;"> 
                                                                <i class="icon fa fa-check-circle" style="color: #333;"></i>
                                                                <span class="title_name">&nbsp;&nbsp;Paid And Non Paid Members</span>
                                                            </a>
                                                        </h6>
                                                        <p style="color: grey;" class="list-group-item-text ng-binding">
                                                            Hereby there is a list of active members who have both paid and not paid per current month.
                                                        </p>

                                                    </a>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>&nbsp;</div>

                        </div>
                        <div>&nbsp;</div>
                        <legend></legend>
                        <div>&nbsp;</div>

                        
                            </div>
                        </div>
                    </div>
            </div>                    

        </div>
    </div>
<!-- Transaction Modal -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © FAMS.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by FAMS.
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Oct 2022 14:37:45 GMT -->
</html>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const viewDetailsButtons = document.querySelectorAll('.view-details-btn');

    viewDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const memberId = this.getAttribute('data-id');
            const memberName = this.getAttribute('data-name');

            document.getElementById('member-id').textContent = memberId;
            document.getElementById('member-name').textContent = memberName;
            document.getElementById('edit-member-id').value = memberId;
        });
    });
});
</script>
