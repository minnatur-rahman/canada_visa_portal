@extends('layouts.web.master')
@section('title', 'Login')
@section('content')

<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ route('index') }}" class="navbar-brand navbar-brand-autodark">
                {{ config('app.name') }}
            </a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Login to your account</h2>
                <form method="POST" action="{{ route('login') }}" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label"> 
                            Password
                            <span class="form-label-description">
                                <a href="{{ route('password.request') }}">I forgot password</a>
                            </span>
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Your password"  autocomplete="off">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}/>
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="text-center text-secondary mt-3">
            Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
        </div> --}}
    </div>
</div>
@endsection
