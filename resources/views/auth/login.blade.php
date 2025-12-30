@extends('layouts.app')

@section('title', 'Login - SchoolPro')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <div class="bg-gradient-1 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-graduation-cap fa-3x text-white"></i>
                        </div>
                        <h2 class="fw-bold">MySchool</h2>
                        <p class="text-muted">Login ke sistem manajemen sekolah</p>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-primary"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" id="email" name="email" 
                                       value="{{ old('email') }}" required autofocus
                                       placeholder="Enter your email">
                            </div>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-primary"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="password" 
                                       name="password" required placeholder="Enter your password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3 form-check d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            
                        
                        <button type="submit" class="btn btn-gradient w-100 py-2 fw-bold">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                        
                        @if (Route::has('register'))
                            <div class="text-center mt-4">
                                <p class="text-muted">Don't have an account? 
                                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">
                                        Register here
                                    </a>
                                </p>
                            </div>
                        @endif
                    </form>
                    
                    <!-- Demo Credentials -->
                    <div class="mt-4 p-3 bg-light rounded">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i> 
                            Demo: admin@kelompok6.com / 06123
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $('#togglePassword').click(function() {
            const passwordField = $('#password');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
        
        // Form validation
        $('form').submit(function() {
            $(this).find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin me-2"></i>Logging in...');
        });
    });
</script>
@endsection
@endsection