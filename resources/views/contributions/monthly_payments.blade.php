@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Monthly Payments')

@section('styles')
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
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">                        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">MONTHLY CONTRIBUTIONS PAYMENTS MENU</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="computation-group">
                                    <div class="col-sm-12 col-md-12">
                                        <br>
                                        <div style="background-color: #d3d3d3; padding: 10px;">
                                            <h6 class="cancel_button site-btn text-center text-dark m-0">
                                                MONTHLY PAYMENTS PROCESS
                                            </h6>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="separator-line">
                                                    <a href="{{ route('monthly_payment_show') }}" style="color: inherit;">
                                                        <h6>
                                                            <i class="icon fa fa-credit-card text-dark"></i>
                                                            <span class="title_name">&nbsp;&nbsp;Process Monthly Payments</span>
                                                        </h6>
                                                        <p class="text-muted">
                                                            Pay your current monthly contributions which you are entitled ready for processing.
                                                        </p>
                                                    </a>
                                                </div>
                                                <div class="separator-line">
                                                    <a href="{{ route('workflow_history') }}" style="color: inherit;">
                                                        <h6>
                                                            <i class="icon fa fa-history text-dark"></i>
                                                            <span class="title_name">&nbsp;&nbsp;Workflow History</span>
                                                        </h6>
                                                        <p class="text-muted">
                                                            Keep Track or Make Followup of your Workflows for Submitted Monthly Contributions Payments.
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="separator-line">
                                                    <a href="{{ route('monthly_documents') }}" style="color: inherit;">
                                                        <h6>
                                                            <i class="icon fa fa-book-open text-dark"></i>
                                                            <span class="title_name">&nbsp;&nbsp;Document Centre</span>
                                                        </h6>
                                                        <p class="text-muted">
                                                            View your submitted documents ready for payment processing.
                                                        </p>
                                                    </a>
                                                </div>
                                                <div class="separator-line">
                                                    <a href="{{ route('monthly_nonpaid') }}" style="color: inherit;">
                                                        <h6>
                                                            <i class="icon fa fa-check-circle text-dark"></i>
                                                            <span class="title_name">&nbsp;&nbsp;Paid And Non Paid Members</span>
                                                        </h6>
                                                        <p class="text-muted">
                                                            Hereby there is a list of active members who have both paid and not paid per current month.
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>                                      
                                        </div>
                                    </div>
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
    </div>
</div>
@endsection

@section('scripts')
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
@endsection
