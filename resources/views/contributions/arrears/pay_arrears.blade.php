@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Arrears Payment Form')

@push('css')
<style>
    .content-layer1 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
    }
    .card {
        width: 50%;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background: linear-gradient(to right, #f5f5f5, #ffffff);
        color: black;
        text-align: center;
        font-size: 1.25rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .monthly_pay_butt {
        text-align: center;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row m-0">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center">ARREARS PAYMENT PROCESS</h4>
                    <div id="alert" class="fade-out"></div>
                    <div class="content-layer1">
                        <div class="card w-90 p-0">
                            <div class="card-header">
                                <small>Arrears Payment</small>
                            </div>
                            <div class="card-body">
                                <form id="arrears_payment" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label><small>Select Member</small></label>
                                            <select class="form-control search-select" id="user_data" name="id" required>
                                                <option value="" disabled selected></option>
                                                @foreach($memberData as $data)
                                                    <option value="{{$data->id}}">{{ $data->firstname.' '.$data->lastname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label><small>Upload Document</small></label>
                                            <input type="file" class="form-control" name="document">
                                            @error('document')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label><small>Amount (Tshs.)</small></label>
                                            <input type="number" class="form-control" id="paid_amount" name="paid_amount" placeholder="Enter Amount" required>
                                            <div class="text-danger" id="paid_amount_error"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label><small>Payment Method</small></label>
                                            <select class="form-control search-select" id="payment_method" name="payment_method" required>
                                                <option value="" disabled selected></option>
                                                @foreach($payment_methods as $methods)
                                                    <option value="{{$methods->id}}">{{ $methods->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="module_id" value="1">
                                    <input type="hidden" name="module_group_id" value="1">

                                    <div class="monthly_pay_butt">
                                        <button type="submit" class="btn btn-success" id="sbmt"><small>Submit</small></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let totalArrears = 0;

    $('#user_data').on('change', function () {
        const userID = $(this).val();

        if (userID) {
            $.ajax({
                url: `/api/get_payment_limit/${userID}`,
                method: 'GET',
                success: function (response) {
                    totalArrears = response.total_arrears || 0;
                    $('#paid_amount_error').text(`Member's total arrears: Tshs.${totalArrears}`);
                },
                error: function () {
                    $('#paid_amount_error').text("Error fetching arrears data.");
                }
            });
        }
    });

    $('#paid_amount').on('input', function () {
        const amount = parseFloat($(this).val());
        if (amount > totalArrears) {
            $('#paid_amount_error').text(`Entered amount exceeds total arrears (Tshs.${totalArrears}).`);
            $('#sbmt').prop('disabled', true);
        } else {
            $('#paid_amount_error').text('');
            $('#sbmt').prop('disabled', false);
        }
    });

    $('#arrears_payment').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: "{{ route('get_arrears_payment') }}",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                Swal.fire("Good job!", "Arrears payment was successful!", "success");
                window.location.reload();
            },
            error: function (xhr) {
                let message = xhr.responseJSON?.message || "Error processing payment.";
                $('#alert').html(`<div class="alert alert-danger">${message}</div>`);
                Swal.fire("Error", message, "error");
            }
        });
    });
</script>
@endpush
