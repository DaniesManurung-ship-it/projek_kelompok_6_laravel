@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-user-circle me-2 text-primary"></i>Profil Pengguna
                    </h1>
                    <p class="text-muted">Kelola informasi profil dan akun Anda</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary" onclick="window.print()">
                        <i class="fas fa-print me-2"></i>Cetak Profil
                    </button>
                    <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-gradient">
                        <i class="fas fa-edit me-2"></i>Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column: Profile Info -->
        <div class="col-md-4 mb-4">
            <!-- Profile Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <!-- Profile Photo -->
                    <div class="position-relative mb-4">
                        <div class="avatar-lg mx-auto">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=4f46e5&color=fff&size=200" 
                                 class="rounded-circle border border-4 border-primary" 
                                 alt="Profile" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                    </div>
                    
                    <!-- User Info -->
                    <h3 class="fw-bold mb-1">{{ $user->full_name }}</h3>
                    <p class="text-muted mb-3">
                        <i class="fas fa-user-tag me-1"></i>
                        {{ ucfirst($user->role) }}
                    </p>
                    
                    <!-- Status -->
                    <div class="mb-4">
                        <span class="badge bg-{{ $profile->status_color }}">
                            <i class="fas fa-circle me-1"></i>{{ $profile->status_text }}
                        </span>
                        <span class="badge bg-primary ms-2">
                            <i class="fas fa-check-circle me-1"></i>Bergabung {{ $user->created_at->diffForHumans() }}
                        </span>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="d-grid gap-2">
                        <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-outline-primary">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </a>
                        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <i class="fas fa-key me-2"></i>Ubah Password
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-address-card me-2 text-primary"></i>Kontak
                    </h6>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <strong>Email:</strong><br>
                            <span class="text-muted">{{ $user->email }}</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone text-success me-2"></i>
                            <strong>Telepon:</strong><br>
                            <span class="text-muted">{{ $profile->phone ?? '-' }}</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <strong>Alamat:</strong><br>
                            <span class="text-muted">{{ $profile->address ?? '-' }}</span>
                        </li>
                        <li>
                            <i class="fas fa-calendar-alt text-warning me-2"></i>
                            <strong>Bergabung:</strong><br>
                            <span class="text-muted">{{ $user->created_at->format('d M Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Right Column: Details & Activities -->
        <div class="col-md-8">
            <!-- Personal Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-user me-2 text-primary"></i>Informasi Pribadi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Nama Lengkap</label>
                            <p class="fw-bold">{{ $user->full_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Jenis Kelamin</label>
                            <p class="fw-bold">{{ $profile->gender_text }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Tanggal Lahir</label>
                            <p class="fw-bold">{{ $profile->birth_date ? $profile->birth_date->format('d F Y') : '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Tempat Lahir</label>
                            <p class="fw-bold">{{ $profile->birth_place ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">NIK</label>
                            <p class="fw-bold">{{ $profile->nik ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Status</label>
                            <p class="fw-bold">
                                <span class="badge bg-{{ $profile->status_color }}">{{ $profile->status_text }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-graduation-cap me-2 text-primary"></i>Pendidikan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Universitas</label>
                            <p class="fw-bold">{{ $profile->university ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Jurusan</label>
                            <p class="fw-bold">{{ $profile->major ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Periode</label>
                            <p class="fw-bold">{{ $profile->study_period ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Kota</label>
                            <p class="fw-bold">{{ $profile->study_city ?? '-' }}</p>
                        </div>
                        @if($profile->description)
                        <div class="col-md-12 mb-3">
                            <label class="form-label text-muted">Deskripsi</label>
                            <p class="text-muted">
                                {{ $profile->description }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-user-cog me-2 text-primary"></i>Informasi Akun
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Username/Email</label>
                            <p class="fw-bold">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Role</label>
                            <p class="fw-bold">
                                <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Akun Dibuat</label>
                            <p class="fw-bold">{{ $user->created_at->format('d F Y H:i') }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Terakhir Diperbarui</label>
                            <p class="fw-bold">{{ $profile->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-key me-2"></i>Ubah Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Saat Ini</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="current_password" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword(this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="new_password" required minlength="8">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword(this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <small class="text-muted">Minimal 8 karakter</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="new_password_confirmation" required minlength="8">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword(this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-gradient">
                            <i class="fas fa-key me-2"></i>Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('styles')
<style>
    .avatar-lg {
        width: 150px;
        height: 150px;
        margin: 0 auto;
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection

@section('scripts')
<script>
    // Toggle password visibility
    function togglePassword(button) {
        const input = button.parentElement.querySelector('input');
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        button.querySelector('i').classList.toggle('fa-eye');
        button.querySelector('i').classList.toggle('fa-eye-slash');
    }
</script>
@endsection
@endsection