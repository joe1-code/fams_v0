@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@section('title', 'Arrears Document Center')

@push('css')
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="card w-100">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">MONTHLY ARREARS PAYMENT DOCUMENTS</h4>
        <div id="alert"></div>
        <div class="content-layer1">
            <div class="card w-90 p-0">
                <div class="card-header">
                    <small>Preview Arrears Payment Document</small> 
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
                                @if ($errors->has('member'))
                                    <div class="text-danger">{{ $errors->first('member') }}</div>
                                @endif
                                <div class="invalid-feedback">Please select a member</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="contr_month">Arrears Month</label>
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
                                <label for="contr_year">Arrears Payment Year</label>
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

<!-- Modal -->
<div class="modal fade" id="monthly_doc_modal" tabindex="-1" role="dialog" aria-labelledby="monthly_doc_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Document Preview</h5>
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div id="document_frame"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#doc_view');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        fetch('{{ route("view_arrears_docs") }}', {
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
                const filePath = `{{ asset('storage/arrears') }}/${data.document}`;
                if (fileType === 'pdf') {
                    previewContainer.innerHTML = `<embed src="${filePath}" type="application/pdf" width="100%" height="600px">`;
                } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
                    previewContainer.innerHTML = `<img src="${filePath}" style="max-width: 100%; height: auto;" alt="Document Preview">`;
                } else {
                    previewContainer.innerHTML = `<p>Unable to preview this file type.</p>`;
                }
                $('#monthly_doc_modal').modal('show');
                $('#close').on('click', function() {
                    $('#monthly_doc_modal').modal('hide');
                });
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
    });
});
</script>
@endpush
