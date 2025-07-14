@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Paid & Non-paid Members')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')

        <div id="layout-wrapper">
            
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4" style="display: flex; justify-content:center;">PAID & NON-PAID MEMBERS</h4>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap " id="non_paid_members">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;">No.(#)</th>
                                                        <th width="25%">Name</th>
                                                        <th width="15%">Region</th>
                                                        <th width="15%">District</th>
                                                        <th width="15%">DOB</th>
                                                        <th width="15%">Phone</th>
                                                        <th width="15%">Payment Status</th>
                                                    </tr>
                                                </thead>
                                                
                                            </table>
                                        </div>
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        
        $('#non_paid_members').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_monthly_nonpaid') }}",
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
                { data: 'region', name: 'region' },
                { data: 'district', name: 'district' },
                { data: 'dob', name: 'dob' },
                { data: 'phone', name: 'phone' },
                {
                    data: 'pay_status',
                    name: 'pay_status',
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        return data === 'Paid' ? 
                            '<span class="badge bg-success">Paid</span>' : 
                            '<span class="badge bg-warning">Not Paid</span>';
                    }
                }
            ],
            success: function(response){
                console.log(response);
                
            },
            order: [[0, 'desc']],
            dom: '<"d-flex justify-content-end"f><"table-responsive"t><"d-flex justify-content-end"ip>',
            // dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            lengthMenu: [10, 25, 50, 100],
            pageLength: 10,
            responsive: true // Enable responsive feature
        });
    });
</script>
@endpush
