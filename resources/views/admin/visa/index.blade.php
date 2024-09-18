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
                    Visa List
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('admin.visa.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        CREATE VISA
                    </a>
                    <a href="{{ route('admin.visa.create') }}" class="btn btn-primary d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Date / Updated</th>
                            <th class="w-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visas as $visa)
                            <tr>
                                <td data-label="Name">
                                    <div class="d-flex py-1 align-items-center">
                                        <span class="avatar me-2" style="background-image: url({{ asset('uploads/' . $visa->image) }})"></span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium">{{ $visa->given_name }} {{ $visa->surname }} </div>
                                            <div class="text-secondary">
                                                <span class="text-reset">{{ $visa->passport_number }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Contact">
                                    <div>{{ $visa->phone }}</div>
                                    <div class="text-secondary">{{ $visa->email }}</div>
                                </td>
                                <td class="text-secondary" data-label="Status">
                                    @if($visa->status == 'approved')
                                        <span class="badge text-bg-green">Approved</span>
                                        @endif
                                    @if($visa->status == 'pending')
                                        <span class="badge text-bg-azure">Pening / In Progress</span>
                                    @endif
                                    @if($visa->status == 'declined')
                                        <span class="badge text-bg-danger">Declined</span>
                                    @endif
                                </td>
                                <td data-label="Date / Updated">
                                    <div>{{ date('d M y, h:i A', strtotime($visa->created_at)) }}</div>
                                    <div class="text-secondary">{{ date('d M y, h:i A', strtotime($visa->updated_at)) }}</div>
                                </td>
                                <td data-label="Actions">
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('admin.visa.view', $visa->id) }}" class="btn">
                                            View
                                        </a>
                                        <a href="{{ route('admin.visa.edit', $visa->id) }}" class="btn">
                                            Edit
                                        </a>
                                        <button onclick="delete_visa({{ $visa->id }}, '{{ $visa->passport_number }}')" class="btn">
                                            Delete
                                        </button>
                                        {{-- <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    Delete
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if ($visas->hasPages())
                    <div class="pagination-wrapper">
                        {{ $visas->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-script')
<script>
    function delete_visa(id, passport){
        Swal.fire({
            title: `Are you sure you want to delete the visa with passport number "${passport}" ?`,
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "YES",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace(`/admin/visa/delete/${id}`);
            }
        });
    }
</script>
@endsection