@extends('layouts.admin.master')
@section('title', 'Visa')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Visa Management
                </div>
                <h2 class="page-title">
                    Create Visa
                </h2>
            </div>            
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('admin.visa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-fieldset">
                <h2 class="text-center mb-0">A. Personal Particulars</h2>
            </div>
            <div class="row g-2">
                <div class="col-md-6">
                    <div>
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="Surname">
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <label class="form-label">Given Name</label>
                        <input type="text" class="form-control @error('given_name') is-invalid @enderror" name="given_name" value="{{ old('given_name') }}" placeholder="Given Name">
                        @error('given_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-label">Sex</div>
                        <select class="form-select @error('sex') is-invalid @enderror" name="sex">
                            <option value="Male" {{ old('sex') == 'Male' ? 'selected': '' }}>Male</option>
                            <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('sex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Place of Birth Town/City</label>
                        <input type="text" class="form-control @error('birth_city') is-invalid @enderror" name="birth_city" placeholder="Place of Birth Town/City" value="{{ old('birth_city') }}">
                        @error('birth_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Current Nationality</label>
                        <input type="text" class="form-control @error('current_nationality') is-invalid @enderror" name="current_nationality" placeholder="Current Nationality" value="{{ old('current_nationality') }}">
                        @error('current_nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Date of Birth</label>
                        <input value="{{ old('dob') ? old('dob') : '2005-01-01' }}" class="form-control @error('dob') is-invalid @enderror" name="dob" id="birth-date">
                    </div>
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Visible Identification Marks</label>
                        <input type="text" class="form-control @error('body_mark') is-invalid @enderror" name="body_mark" placeholder="Visible Identification Marks" value="{{ old('body_mark') }}">
                        @error('body_mark')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">National ID No</label>
                        <input type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" placeholder="National ID No" value="{{ old('nid') }}">
                        @error('nid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-fieldset mt-3">
                <h2 class="text-center mb-0">B. Company Details</h2>
            </div>
            <div class="row g-2">
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}">
                        @error('company_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Job Title</label>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" placeholder="Job Title" value="{{ old('job_title') }}">
                        @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Duty Duration</label>
                        <input type="text" class="form-control @error('duty_duration') is-invalid @enderror" name="duty_duration" placeholder="Duty Duration" value="{{ old('duty_duration') }}">
                        @error('duty_duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label class="form-label">Salary</label>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" placeholder="Salary" value="{{ old('salary') }}">
                        @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-fieldset mt-3">
                <h2 class="text-center mb-0">C. Passport Details</h2>
            </div>
            <div class="row g-2">
                <div class="col-md-6">
                    <div>
                        <label class="form-label">Passport Number</label>
                        <input type="text" class="form-control @error('passport_number') is-invalid @enderror" name="passport_number" placeholder="Passport Number" value="{{ old('passport_number') }}">
                        @error('passport_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <label class="form-label">Issued Country</label>
                        <input type="text" class="form-control @error('passport_number') is-invalid @enderror" name="issued_country" placeholder="Issued Country" value="{{ old('issued_country') }}">
                        @error('issued_country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-fieldset mt-3">
                <h2 class="text-center mb-0">D. Applicant's Contact Details</h2>
            </div>
            <div class="row g-2">
                <div class="col-md-6">
                    <div>
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <label class="form-label">Note</label>
                        <textarea class="form-control @error('note') is-invalid @enderror" name="note" rows="3" placeholder="Note...">{{ old('note') }}</textarea>
                        @error('note')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-label">Status</div>
                        <select class="form-select @error('status') is-invalid @enderror" name="status">
                            <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending / In Progress</option>
                            <option value="declined" {{ old('status') == 'declined' ? 'selected' : '' }}>Declined</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-label">Person Image</div>
                        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">
                Submit Data & Next
                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm.613 5.21l.094 .083l4 4a.927 .927 0 0 1 .097 .112l.071 .11l.054 .114l.035 .105l.03 .148l.006 .118l-.003 .075l-.017 .126l-.03 .111l-.044 .111l-.052 .098l-.074 .104l-.073 .082l-4 4a1 1 0 0 1 -1.497 -1.32l.083 -.094l2.292 -2.293h-5.585a1 1 0 0 1 -.117 -1.993l.117 -.007h5.585l-2.292 -2.293a1 1 0 0 1 -.083 -1.32l.083 -.094a1 1 0 0 1 1.32 -.083z" fill="currentColor" stroke-width="0" /></svg>
            </button>
        </form>
    </div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('assets/js/litepicker.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
        element: document.getElementById('birth-date'),
        buttonText: {
            previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
            nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
        },
    }));
});
</script>
@endsection