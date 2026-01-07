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
                        <h2 class="fw-bold text-dark mb-2">Buat Akun Baru</h2>
                        <p class="text-muted">Bergabung dengan SchoolPro</p>
                    </div>

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register.post') }}" id="registerForm">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3 border-bottom pb-2">
                                <i class="fas fa-user-circle me-2 text-primary"></i>Informasi Pribadi
                            </h5>
                            
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0" id="name" 
                                           name="name" value="{{ old('name') }}" required
                                           placeholder="Masukkan nama lengkap">
                                </div>
                                @error('name')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </span>
                                    <input type="email" class="form-control border-start-0" id="email" 
                                           name="email" value="{{ old('email') }}" required
                                           placeholder="Masukkan email">
                                </div>
                                @error('email')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-phone text-primary"></i>
                                    </span>
                                    <input type="tel" class="form-control border-start-0" id="phone" 
                                           name="phone" value="{{ old('phone') }}"
                                           placeholder="Contoh: 081234567890">
                                </div>
                                @error('phone')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3 border-bottom pb-2">
                                <i class="fas fa-lock me-2 text-primary"></i>Informasi Akun
                            </h5>
                            
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" id="password" 
                                           name="password" required placeholder="Buat password (min. 6 karakter)">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" id="password_confirmation" 
                                           name="password_confirmation" required placeholder="Konfirmasi password">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Role Selection - HANYA TEACHER & STUDENT -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3 border-bottom pb-2">
                                <i class="fas fa-user-tag me-2 text-primary"></i>Pilih Peran
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-check card-option">
                                        <input class="form-check-input" type="radio" name="role" id="roleTeacher" value="teacher" {{ old('role', 'teacher') == 'teacher' ? 'checked' : '' }} required>
                                        <label class="form-check-label w-100" for="roleTeacher">
                                            <div class="card border-2 card-hover h-100">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-chalkboard-teacher fa-2x text-primary mb-3"></i>
                                                    <h6 class="fw-bold">Guru</h6>
                                                    <small class="text-muted">Mengelola kelas dan siswa</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check card-option">
                                        <input class="form-check-input" type="radio" name="role" id="roleStudent" value="student" {{ old('role') == 'student' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="roleStudent">
                                            <div class="card border-2 card-hover h-100">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-user-graduate fa-2x text-success mb-3"></i>
                                                    <h6 class="fw-bold">Siswa</h6>
                                                    <small class="text-muted">Mengakses materi pembelajaran</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('role')
                                <span class="text-danger small d-block mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    Saya setuju dengan <a href="#" class="text-primary text-decoration-none">Syarat & Ketentuan</a> dan <a href="#" class="text-primary text-decoration-none">Kebijakan Privasi</a>
                                </label>
                            </div>
                            @error('terms')
                                <span class="text-danger small d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-gradient w-100 py-2 fw-bold mb-4" id="registerButton">
                            <i class="fas fa-user-plus me-2"></i>Buat Akun
                        </button>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-muted mb-0">Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">
                                    Login di sini
                                </a>
                            </p>
                        </div>

                        <!-- Info Admin -->
                        <div class="mt-4 p-3 bg-light rounded">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i> 
                                <strong>Info:</strong> Untuk akun admin, hubungi administrator sistem.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const passwordField = document.getElementById('password');
        const confirmField = document.getElementById('password_confirmation');
        
        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const type = passwordField.type === 'password' ? 'text' : 'password';
                passwordField.type = type;
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }
        
        if (toggleConfirmPassword) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmField.type === 'password' ? 'text' : 'password';
                confirmField.type = type;
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }
        
        // Form validation
        const form = document.getElementById('registerForm');
        const submitBtn = document.getElementById('registerButton');
        
        if (form) {
            form.addEventListener('submit', function(e) {
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Membuat Akun...';
                    
                    // Reset button after 5 seconds if still processing
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 5000);
                }
            });
        }
        
        // Role selection
        const roleCards = document.querySelectorAll('.card-option .card');
        roleCards.forEach(card => {
            card.addEventListener('click', function() {
                const radio = this.closest('.form-check').querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;
                    roleCards.forEach(c => c.classList.remove('border-primary'));
                    this.classList.add('border-primary');
                }
            });
        });
    });
</script>
@endsection
@endsection