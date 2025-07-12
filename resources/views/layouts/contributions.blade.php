@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Members List')

@push('css')
    <!-- DataTables & SweetAlert Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')
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
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted fw-medium">Total Members</p>
                    <h4 class="mb-0">{{ $memberData->count() }}</h4>
                </div>
                <div class="avatar-sm rounded-circle bg-primary d-flex align-items-center justify-content-center">
                    <i class="fas fa-users text-white fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted fw-medium">Monthly Earnings</p>
                    <h4 class="mb-0">Tshs. {{ $earnings }}</h4>
                </div>
                <div class="avatar-sm rounded-circle bg-primary d-flex align-items-center justify-content-center">
                    <i class="bx bx-archive-in text-white fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted fw-medium">Fund Balance(UTT AMIS)</p>
                    <h4 class="mb-0">Tshs. {{ $utt_amis }}</h4>
                </div>
                <div class="avatar-sm rounded-circle bg-primary d-flex align-items-center justify-content-center">
                    <i class="bx bx-trending-up text-white fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted fw-medium">Average Amount</p>
                    <h4 class="mb-0">Tshs. {{ $average_amount }}</h4>
                </div>
                <div class="avatar-sm rounded-circle bg-primary d-flex align-items-center justify-content-center">
                    <i class="fas fa-dollar-sign text-white fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                render: (data, type, row, meta) => meta.row + 1
            },
            { data: 'fullname', name: 'fullname' },
            { data: 'region_name', name: 'region_name' },
            { data: 'district_name', name: 'district_name' },
            { data: 'phone', name: 'phone' },
            {
                data: 'available',
                render: data => data
                    ? '<span class="badge bg-info">Available</span>'
                    : '<span class="badge bg-danger">Passed Away</span>'
            },
            { data: 'dob', name: 'dob' },
            { data: 'dod', name: 'dod' },
            {
                data: 'membership_status',
                render: data => data
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-warning">Not Active</span>'
            },
            {
                data: null,
                render: (data, type, row) => {
                    let memberUrl = "{{ route('edit/members') }}?member_id=" + row.user_id;
                    return `
                        <form action="${memberUrl}" method="GET" class="update_form d-inline">
                            <input type="hidden" name="member_id" value="${row.user_id}">
                            <button type="submit" class="btn btn-primary btn_update">
                                <i class="fas fa-edit"></i> Update
                            </button>
                        </form>`;
                }
            }
        ],
        order: [[0, 'desc']],
        responsive: true
    });
});

// Confirm before update
$(document).on('click', '.btn_update', function(e){
    e.preventDefault();
    const form = $(this).closest('.update_form');
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
</script>
@endpush
