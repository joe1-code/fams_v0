@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Arrears Menu')

@push('css')
<style>
    .separator-line {
        border-bottom: 1px solid #a0d6a0;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .title_name {
        font-size: 16px;
        color: #333333;
    }

    .list-group-item-heading {
        font-weight: normal;
    }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">ARREARS PAYMENT MENU</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="computation-group">
                    <div class="col-sm-12 col-md-12">
                        <br>
                        <div style="background-color: #d3d3d3; padding: 10px;">
                            <h6 class="cancel_button site-btn text-center text-black m-0">ARREARS PAYMENT PROCESS</h6>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="separator-line">
                                    <h6 class="list-group-item-heading">
                                        <a href="{{ route('pay_arrears') }}" class="text-decoration-none text-dark">
                                            <i class="fa fa-credit-card" style="color: #333;"></i>
                                            <span class="title_name">&nbsp;&nbsp;Process Arrears Payments</span>
                                        </a>
                                    </h6>
                                    <p class="text-muted">
                                        Pay your previous months arrears which are pending ready for processing
                                    </p>
                                </div>

                                <div class="separator-line">
                                    <h6 class="list-group-item-heading">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fa fa-history" style="color: #333;"></i>
                                            <span class="title_name">&nbsp;&nbsp;Workflow History</span>
                                        </a>
                                    </h6>
                                    <p class="text-muted">
                                        Keep Track or Make Followup of your Workflows for submitted Arrears Payments
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="separator-line">
                                    <h6 class="list-group-item-heading">
                                        <a href="{{ route('attached_docs') }}" class="text-decoration-none text-dark">
                                            <i class="fa fa-book-open" style="color: #333;"></i>
                                            <span class="title_name">&nbsp;&nbsp;Document Centre</span>
                                        </a>
                                    </h6>
                                    <p class="text-muted">
                                        View your submitted documents ready for payment processing
                                    </p>
                                </div>

                                <div class="separator-line">
                                    <h6 class="list-group-item-heading">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fa fa-clock" style="color: #333;"></i>
                                            <span class="title_name">&nbsp;&nbsp;Backlog Arrears</span>
                                        </a>
                                    </h6>
                                    <p class="text-muted">
                                        These are overdue arrears which have prolonged for over 6 months (Chronic Arrears).
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>&nbsp;</div>
            </div>
        </div>
    </div>
</div>
@endsection
