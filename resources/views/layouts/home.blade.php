@extends('backend.general.main', ['activePage' => 'table', 'title' => 'HCP PORTAL'])

@push('css')
    <style>
        th {
            background-color: #e3f2fd;
        }
        .over15color {
            background-color: #e6771c;
        }
        .incidentMonth {
            background-color: #e3f2fd;
        }
    </style>
@endpush

@section('content')
@php
    $active = $memberData->where('active', 1)->count();
    $inactive = $memberData->where('active', 0)->count();
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Welcome.</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="computation-group">
                            <table class="table table-bordered text-center" style="background-color: #e3f2fd;">
                                <thead>
                                    <tr>
                                        <th>Full Names</th>
                                        <th>Phone</th>
                                        <th>Region</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($memberData as $data)
                                        <tr class="text-left">
                                            <td>{{ $data->firstname . ' ' . $data->middlename . ' ' . $data->lastname }}</td>
                                            <td class="text-end">{{ $data->phone }}</td>
                                            <td class="text-center">{{ $data->region_name }}</td>
                                            <td class="text-end">
                                                <button class="btn btn-secondary" style="background-color: white; color: black;">
                                                    <i class="fas fa-pencil-alt text-dark"></i>
                                                    {{ $data->active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th colspan="4" style="background-color: #e3f2fd;">REGISTERED MEMBERS</th>
                                </tr>
                                <tr>
                                    <th style="background-color: green;">Active</th>
                                    <th style="background-color: #e6771c;">Inactive</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $active }}</td>
                                    <td>{{ $inactive }}</td>
                                </tr>
                            </tbody>
                        </table>

                        @foreach(['CHAIRPERSON', 'GENERAL SECRETARY', 'ACCOUNTANT'] as $role)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center" style="background-color: #e3f2fd;">{{ $role }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><th>Full Names</th><td>{{ $data->firstname . ' ' . $data->middlename . ' ' . $data->lastname }}</td></tr>
                                    <tr><th>Age</th><td>29</td></tr>
                                    <tr><th>Gender</th><td>Male</td></tr> {{-- Replace with actual gender --}}
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
