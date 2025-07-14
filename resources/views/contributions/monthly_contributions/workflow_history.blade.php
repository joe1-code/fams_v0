@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Workflow | FAMS')

@push('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center">MONTHLY CONTRIBUTIONS WORKFLOW HISTORY</h4>
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection

@push('js')
    <!-- jQuery + DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            return meta.row + 1;
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
                            return data === 'Paid' 
                                ? '<span class="badge bg-success">Paid</span>' 
                                : '<span class="badge bg-warning">Not Paid</span>';
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
                                    <button type="submit" class="btn btn-primary btn-sm">Arrears Payment</button>
                                </form>
                            `;
                        }
                    }
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td', nRow).click(function() {
                        window.location.href = "{{ route('arrears_summary') }}?id=" + aData['id'];
                    }).hover(function() {
                        $(this).css('cursor', 'pointer');
                    }, function() {
                        $(this).css('cursor', 'auto');
                    });
                },
                order: [[0, 'desc']],
                dom: '<"d-flex justify-content-end"f><"table-responsive"t><"d-flex justify-content-end"ip>',
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10,
                responsive: true
            });
        });
    </script>
@endpush
