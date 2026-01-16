@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-3x mb-3" style="color: var(--primary);"></i>
                        <h2 class="fw-bold">Create Account</h2>
                        <p class="text-muted">Join Café Aroma today</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                <input type="text" name="name" class="form-control border-start-0" 
                                       placeholder="Your full name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control border-start-0" 
                                       placeholder="you@example.com" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control border-start-0" 
                                       placeholder="Create a password" required>
                            </div>
                            <small class="text-muted">Minimum 6 characters</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password_confirmation" class="form-control border-start-0" 
                                       placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </form>

                    <hr class="my-4">

                    <p class="text-center mb-0">
                        Already have an account? 
                        <a href="{{ route('login') }}" style="color: var(--primary); font-weight: 600;">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
