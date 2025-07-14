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
                        <div class="row mb-5">
                            
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Members Arrears</p>
                                                        <h4 class="mb-0"><small>{{ number_2_format($arrears_info['members_arrears'][0]['members_arrears']).' '.('(Tsh.)') }}</small></h4>
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
                                                        <p class="text-muted fw-medium">Total Penalties(50% rate)</p>
                                                        <h4 class="mb-0"><small>{{ number_2_format($arrears_info['members_arrears'][0]['total_penalties']).' '.('(Tsh.)') }}</small></h4>
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
                                                        <p class="text-muted fw-medium">Total Penalties And Arrears</p>
                                                        <h4 class="mb-0"><small>{{ number_2_format($arrears_info['members_arrears'][0]['total_arrears']).' '.('(Tsh.)') }}</small></h4>
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
                                                        <p class="text-muted fw-medium">Individual Arrears</p>
                                                        <h4 class="mb-0"><small> {{ number_2_format($arrears_info['individual_arrears']).' '.('(Tsh.)') }}</small></h4>
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4" style="display: flex; justify-content:center;">OUTSTANDING ARREARS</h4>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap " id="member_arrears">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;">No.(#)</th>
                                                        <th class="align-middle">Full Name</th>
                                                        <th class="align-middle">Region</th>
                                                        <th class="align-middle">District</th>
                                                        <th class="align-middle">Phone</th>
                                                        <th class="align-middle">Outstanding Arrears</th>
                                                        <th class="align-middle">Payment Status</th>
                                                        <th class="align-middle">Action</th>
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

<script>

$(document).ready(function() {
    
    
    $('#member_arrears').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('monthly_arrears/getForDatatable') }}",
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
        { data: 'arrears', name: 'arrears' },
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
        },
        {
            data: null,
            name: 'action',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                var paymentUrl = "{{ route('arrears_payment') }}";

                return `
                    <form action="${paymentUrl}" method="POST" style="display:inline;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Arrears Payment</button>
                    </form>
                `;            
            }
        }
    ],
    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
  $('td', nRow).click(function() {
    document.location.href = "{{ route('arrears_summary') }}?id=" + aData['id'];
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
</script>

@endpush
