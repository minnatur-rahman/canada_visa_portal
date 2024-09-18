@extends('layouts.admin.master')
@section('title', 'Visa Information')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Visa
                </div>
                <h2 class="page-title">
                    Visa Information
                </h2>
            </div>
            
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">

                    </span>
                    <a href="{{ route('admin.visa.edit', $visa->id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.visa.edit', $visa->id) }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Create new report">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <img class="img-fluid img-thumbnail" style="height: 170px;" src="{{ asset('uploads/' . $visa->image) }}" alt="{{ $visa->id }}">
                <div class="ms-3">
                    <h1 class="mb-0">{{ $visa->given_name }} {{ $visa->surname }}</h1>
                    <h2 class="text-muted mt-0">ID: #{{ $visa->id }} </h2>
                    @if($visa->status == 'approved')
                        <span class="badge text-bg-green">Approved</span>
                    @endif
                    @if($visa->status == 'pending')
                        <span class="badge text-bg-azure">Pening / In Progress</span>
                    @endif
                    @if($visa->status == 'declined')
                        <span class="badge text-bg-danger">Declined</span>
                    @endif
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center bg-cyan text-white">A. Personal Particulars</th>
                        </tr>
                        <tr>
                            <td>Surname</td>
                            <td colspan="3">{{ $visa->surname }}</td>
                        </tr>
                        <tr>
                            <td>Given Name</td>
                            <td colspan="3">{{ $visa->given_name }}</td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td>{{ $visa->sex }}</td>
                            <td>Date of Birth</td>
                            <td>{{ $visa->dob }}</td>
                        </tr>
                        <tr>
                            <td>Place of Birth Town/City</td>
                            <td>{{ $visa->birth_city }}</td>
                            <td>Visible Identification Marks</td>
                            <td>{{ $visa->body_mark }}</td>
                        </tr>
                        <tr>
                            <td>Current Nationality</td>
                            <td>{{ $visa->current_nationality }}</td>
                            <td>National ID No</td>
                            <td>{{ $visa->nid }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center bg-cyan text-white">B. Company Details</th>
                        </tr>
                        <tr>
                            <td>Company Name</td>
                            <td>{{ $visa->company_name }}</td>
                            <td>Job Title</td>
                            <td>{{ $visa->job_title }}</td>
                        </tr>
                        <tr>
                            <td>Duty Duration</td>
                            <td>{{ $visa->duty_duration }}</td>
                            <td>Salary</td>
                            <td>{{ $visa->salary }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center bg-cyan text-white">C. Passport Details</th>
                        </tr>
                        <tr>
                            <td>Passport Number</td>
                            <td>{{ $visa->passport_number }}</td>
                            <td>Issued Country</td>
                            <td>{{ $visa->issued_country }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center bg-cyan text-white">D. Applicant's Contact Details</th>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $visa->phone }}</td>
                            <td>Email</td>
                            <td>{{ $visa->email }}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td colspan="3">{{ $visa->note }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#create-file-modal">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                    Upload Document
                </button>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal modal-blur fade" id="create-file-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form  action="{{ route('admin.visa.file.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $visa->id }}">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-label">Select File (PDF/Image)</div>
                                <input type="file" name="file" accept="image/*,application/pdf" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">File Type</label>
                                <select class="form-select" name="type">
                                    <option value="pdf" selected>PDF</option>
                                    <option value="image">Image</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                        Upload
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection