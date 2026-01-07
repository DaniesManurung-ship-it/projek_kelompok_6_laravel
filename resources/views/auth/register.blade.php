@extends('layouts.app')

@section('title', 'Register - SchoolPro')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100 py-4">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <!-- Logo & Header -->
                    <div class="text-center mb-5">
                        <div class="bg-gradient-1 rounded-circle d-inline-flex p-3 mb-4">
                            <i class="fas fa-graduation-cap fa-3x text-white"></i>
                        </div>
                        <h2 class="fw-bold text-dark mb-2">Create Account</h2>
                        <p class="text-muted">Join SchoolPro and manage your academic activities</p>
                    </div>

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register.store') }}" id="registerForm">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3 border-bottom pb-2">
                                <i class="fas fa-user-circle me-2 text-primary"></i>Personal Information
                            </h5>
                            
                            <!-- Full Name -->
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="name" class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-primary"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="name" 
                                               name="name" value="{{ old('name') }}" required
                                               placeholder="Enter your full name">
                                    </div>
                                    @error('name')
                                        <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-at text-primary"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="username" 
                                               name="username" value="{{ old('username') }}" required
                                               placeholder="Choose username">
                                    </div>
                                    @error('username')
                                        <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </span>
                                    <input type="email" class="form-control border-start-0" id="email" 
                                           name="email" value="{{ old('email') }}" required
                                           placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number (Optional)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-phone text-primary"></i>
                                    </span>
                                    <input type="tel" class="form-control border-start-0" id="phone" 
                                           name="phone" value="{{ old('phone') }}"
                                           placeholder="Enter phone number">
                                </div>
                                @error('phone')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Account Information Section -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3 border-bottom pb-2">
                                <i class="fas fa-lock me-2 text-primary"></i>Account Information
                            </h5>
                            
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" id="password" 
                                           name="password" required placeholder="Create password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength mt-2">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" id="passwordStrength" style="width: 0%"></div>
                                    </div>
                                    <small class="text-muted d-block mt-1">Password strength: <span id="strengthText">Very weak</span></small>
                                </div>
                                @error('password')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" id="password_confirmation" 
                                           name="password_confirmation" required placeholder="Confirm password">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <small id="passwordMatch" class="text-success d-none mt-1">
                                    <i class="fas fa-check-circle"></i> Passwords match
                                </small>
                                <small id="passwordMismatch" class="text-danger d-none mt-1">
                                    <i class="fas fa-times-circle"></i> Passwords do not match
                                </small>
                            </div>
                        </div>

                        <!-- Hidden Role Field (Default: student) -->
                        <input type="hidden" name="role" value="student">

                        <!-- Terms & Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-primary text-decoration-none">Terms of Service</a> and <a href="#" class="text-primary text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                            @error('terms')
                                <span class="text-danger small d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-gradient w-100 py-2 fw-bold mb-4" id="registerButton">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-muted mb-0">Already have an account? 
                                <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styling for register page */
    .card-option .form-check-input {
        position: absolute;
        opacity: 0;
    }
    
    .card-option .card {
        cursor: pointer;
        transition: all 0.3s;
        border-color: #dee2e6;
    }
    
    .card-option .card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }
    
    .card-option .form-check-input:checked + .form-check-label .card {
        border-color: var(--primary-color) !important;
        background-color: rgba(79, 70, 229, 0.05);
    }
    
    /* Password strength indicator */
    .password-strength .progress-bar {
        transition: width 0.3s, background-color 0.3s;
    }
    
    /* Form validation styling */
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .card-body {
            padding: 1.5rem !important;
        }
        
        .card-option .card-body {
            padding: 1rem !important;
        }
        
        .card-option .card-body i {
            font-size: 1.5rem !important;
        }
    }
    
    /* Animation for form sections */
    h5.border-bottom {
        transition: all 0.3s;
    }
    
    h5.border-bottom:hover {
        color: var(--primary-color);
    }
</style>

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
        
        $('#toggleConfirmPassword').click(function() {
            const confirmField = $('#password_confirmation');
            const type = confirmField.attr('type') === 'password' ? 'text' : 'password';
            confirmField.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
        
        // Password strength checker
        $('#password').on('input', function() {
            const password = $(this).val();
            let strength = 0;
            let text = 'Very weak';
            let color = '#dc3545';
            
            // Length check
            if (password.length >= 8) strength += 25;
            
            // Contains lowercase
            if (/[a-z]/.test(password)) strength += 25;
            
            // Contains uppercase
            if (/[A-Z]/.test(password)) strength += 25;
            
            // Contains numbers or special chars
            if (/[0-9!@#$%^&*]/.test(password)) strength += 25;
            
            // Update strength text and color
            if (strength >= 75) {
                text = 'Strong';
                color = '#198754';
            } else if (strength >= 50) {
                text = 'Moderate';
                color = '#ffc107';
            } else if (strength >= 25) {
                text = 'Weak';
                color = '#fd7e14';
            }
            
            $('#passwordStrength').css({
                'width': strength + '%',
                'background-color': color
            });
            $('#strengthText').text(text).css('color', color);
        });
        
        // Password match checker
        function checkPasswordMatch() {
            const password = $('#password').val();
            const confirmPassword = $('#password_confirmation').val();
            
            if (confirmPassword.length === 0) {
                $('#passwordMatch').addClass('d-none');
                $('#passwordMismatch').addClass('d-none');
                return;
            }
            
            if (password === confirmPassword) {
                $('#passwordMatch').removeClass('d-none');
                $('#passwordMismatch').addClass('d-none');
            } else {
                $('#passwordMatch').addClass('d-none');
                $('#passwordMismatch').removeClass('d-none');
            }
        }
        
        $('#password, #password_confirmation').on('input', checkPasswordMatch);
        
        // Form submission handler
        $('#registerForm').submit(function(e) {
            const submitBtn = $('#registerButton');
            const originalHtml = submitBtn.html();
            
            // Disable button and show loading
            submitBtn.prop('disabled', true);
            submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...');
            
            // Check if passwords match
            if ($('#password').val() !== $('#password_confirmation').val()) {
                alert('Passwords do not match!');
                submitBtn.html(originalHtml);
                submitBtn.prop('disabled', false);
                return false;
            }
            
            // Check if terms are accepted
            if (!$('#terms').is(':checked')) {
                alert('Please accept the Terms of Service and Privacy Policy');
                submitBtn.html(originalHtml);
                submitBtn.prop('disabled', false);
                return false;
            }
            
            // Re-enable after 5 seconds if still processing
            setTimeout(function() {
                submitBtn.html(originalHtml);
                submitBtn.prop('disabled', false);
            }, 5000);
        });
        
        // Auto-focus on first field
        $('#name').focus();
        
        // Input validation on blur
        $('input[required]').blur(function() {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection
@endsection