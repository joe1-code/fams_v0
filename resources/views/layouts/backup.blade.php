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

<!-- home blade -->