
<!doctype html>
<html lang="en">

    
<head>
        
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/fams-logo.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />



    </head>

    <body data-sidebar="dark" data-layout-mode="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

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
                                            
                                            <!-- Step 3 -->
                                            
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

