@extends('layouts.admin.master')
@section('title', 'Unauthorized Access')
@section('content')
<div class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">403</div>
                <p class="empty-title">Unauthorized Access</p>
                <p class="empty-subtitle text-secondary">
                    We are sorry, our server denied of your request
                </p>
                <div class="empty-action">
                    <a href="{{ route('index') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                        Take me home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
