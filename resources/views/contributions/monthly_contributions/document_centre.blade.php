@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Document Centre')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .content-layer1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            background-color: #f7f7f7;
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
            <h4 class="card-title mb-4 text-center">MONTHLY CONTRIBUTIONS PAYMENT DOCUMENTS</h4>
            <div id="alert"></div>
            <div class="content-layer1">
                <div class="card w-90 p-0">
                    <div class="card-header">
                        <small>Preview Payment Document</small> 
                    </div>
                    <div class="card-body">
                        <form id="doc_view" method="get">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="member"><small>Select Members</small></label>
                                    <select class="form-control search-select" id="user_data" name="id" required>
                                        <option value="" disabled selected></option>
                                        @foreach($memberData as $data)
                                            <option value="{{$data->id}}">{{ $data->firstname.' '.$data->lastname }}</option>
                                        @endforeach
                                    </select>
                                    @error('member')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="contr_month">Contribution Month</label>
                                    <select name="contr_month" id="contr_month" class="form-control search-select">
                                        <option value="" disabled selected>Month</option>
                                        @foreach(range(1, 12) as $month)
                                            <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}"
                                                {{ old('contr_month', isset($request->from_date) ? \Carbon\Carbon::parse($request->from_date)->format('m') : '') == str_pad($month, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="contr_year">Contribution Year</label>
                                    <select name="contr_year" id="contr_year" class="form-control search-select">
                                        <option value="" disabled selected>Year</option>
                                        @foreach(range(\Carbon\Carbon::now()->format('Y'), 2022) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('contr_year', isset($request->from_date) ? \Carbon\Carbon::parse($request->from_date)->format('Y') : '') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="monthly_preview_doc col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-success">Preview Document</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
    <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('#doc_view');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(form);
                
                fetch('{{ route("monthly_preview_document") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    const previewContainer = document.getElementById('document_frame');

                    if (data.status === 'success') {
                        const fileType = data.document.split('.').pop().toLowerCase();
                        const filePath = `{{ asset('storage/documents') }}/${data.document}`;

                        if (fileType === 'pdf') {
                            previewContainer.innerHTML = `<embed src="${filePath}" type="application/pdf" width="100%" height="600px">`;
                        } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
                            previewContainer.innerHTML = `<img src="${filePath}" style="max-width: 100%; height: auto;" alt="Document Preview">`;
                        } else {
                            previewContainer.innerHTML = `<p>Unable to preview this file type.</p>`;
                        }
                        console.log('nafikaa..');
                        
                        $('#monthly_doc_modal').modal('show');
                        console.log('nafikaa..down');

                    } else {
                        Swal.fire({
                            title: "Not Found",
                            text: data.message,
                            icon: "error"
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                $('#close').on('click', function () {
                    $('#monthly_doc_modal').modal('hide');
                });
            });
        });
    </script>
@endpush

{{-- Modal --}}
<div class="modal fade" id="monthly_doc_modal" tabindex="-1" role="dialog" aria-labelledby="monthly_doc_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Document Preview</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="document_frame"></div> <!-- This is where the document will be displayed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
            </div>
        </div>
    </div>
</div>
