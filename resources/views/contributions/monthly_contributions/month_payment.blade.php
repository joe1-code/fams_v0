@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Monthly Payment')

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
    <div class="card w-100">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">MONTHLY CONTRIBUTIONS PAYMENT PROCESS</h4>
            <div id="alert"></div>
            <div class="content-layer1">
                <div class="card w-90 p-0">
                    <div class="card-header">
                        <small>Monthly Payment</small>
                    </div>
                    <div class="card-body">
                        <form id="month_payment" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="member"><small>Select Members</small></label>
                                    <select class="form-control search-select" id="user_data" name="id" required>
                                        <option value="" disabled selected></option>
                                        @foreach($memberData as $data)
                                            <option value="{{ $data->id }}">{{ $data->firstname . ' ' . $data->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="document" class="form-label"><small>Upload Document</small></label>
                                    <input type="file" class="form-control" id="1" name="document">
                                    @if ($errors->has('document'))
                                        <div class="text-danger">
                                            {{ $errors->first('document') }}
                                        </div>
                                    @endif
                                    <div class="invalid-feedback">
                                        Please upload a document
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="paid_amount" class="form-label"><small>Amount (Tshs.)</small></label>
                                    <input type="number" class="form-control @error('paid_amount') is-invalid @enderror" id="paid_amount" name="paid_amount" placeholder="Enter Amount" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_method"><small>Payment Method</small></label>
                                    <select class="form-control search-select" id="payment_method" name="payment_method" required>
                                        <option value="" disabled selected></option>
                                        @foreach($payment_methods as $methods)
                                            <option value="{{ $methods->id }}">{{ $methods->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="module_id" name="module_id" value="1">
                            <input type="hidden" id="module_group_id" name="module_group_id" value="1">

                            <div class="monthly_pay_butt">
                                <button type="submit" class="btn btn-success"><small>Submit</small></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#month_payment').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('get_monthly_payments') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Good job!",
                            text: "You successfully paid your monthly bill!",
                            icon: "success",
                        });

                        window.location.reload();
                    },
                    error: function (xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            $('#alert').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
                        }

                        Swal.fire({
                            title: "Error",
                            text: "An error occurred while processing your payment.",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>
@endpush
