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
                    <a href="{{ route('dashboard') }}" class="btn btn-gradient">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
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
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4f46e5&color=fff&size=200" 
                                 class="rounded-circle border border-4 border-primary" 
                                 alt="Profile" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <button class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle" 
                                style="width: 40px; height: 40px;">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    
                    <!-- User Info -->
                    <h3 class="fw-bold mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-muted mb-3">
                        <i class="fas fa-user-tag me-1"></i>
                        {{ Auth::user()->role ?? 'Administrator' }}
                    </p>
                    
                    <!-- Stats -->
                    <div class="row text-center mb-4">
                        <div class="col-4">
                            <h5 class="fw-bold text-primary">12</h5>
                            <small class="text-muted">Kursus</small>
                        </div>
                        <div class="col-4">
                            <h5 class="fw-bold text-success">245</h5>
                            <small class="text-muted">Jam</small>
                        </div>
                        <div class="col-4">
                            <h5 class="fw-bold text-warning">98%</h5>
                            <small class="text-muted">Nilai</small>
                        </div>
                    </div>
                    
                    <!-- Status -->
                    <div class="mb-4">
                        <span class="badge bg-success">
                            <i class="fas fa-circle me-1"></i>Aktif
                        </span>
                        <span class="badge bg-primary ms-2">
                            <i class="fas fa-check-circle me-1"></i>Terverifikasi
                        </span>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </button>
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
                            <span class="text-muted">{{ Auth::user()->email }}</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone text-success me-2"></i>
                            <strong>Telepon:</strong><br>
                            <span class="text-muted">+62 812 3456 7890</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <strong>Alamat:</strong><br>
                            <span class="text-muted">Jl. Pendidikan No. 123, Jakarta</span>
                        </li>
                        <li>
                            <i class="fas fa-calendar-alt text-warning me-2"></i>
                            <strong>Bergabung:</strong><br>
                            <span class="text-muted">{{ Auth::user()->created_at->format('d M Y') }}</span>
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
                            <p class="fw-bold">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Jenis Kelamin</label>
                            <p class="fw-bold">Laki-laki</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Tanggal Lahir</label>
                            <p class="fw-bold">24 Februari 1997</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Tempat Lahir</label>
                            <p class="fw-bold">Juliana, Indonesia</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">NIK</label>
                            <p class="fw-bold">3271 0123 4567 8901</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Status</label>
                            <p class="fw-bold">
                                <span class="badge bg-success">Aktif</span>
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
                            <p class="fw-bold">University Akademi Heloino</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Jurusan</label>
                            <p class="fw-bold">History Major</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Periode</label>
                            <p class="fw-bold">September 2023 - September 2027</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Kota</label>
                            <p class="fw-bold">Yogyakarta, Indonesia</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label text-muted">Deskripsi</label>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-history me-2 text-primary"></i>Aktivitas Terakhir
                        </h5>
                        <button class="btn btn-sm btn-outline-primary">Lihat Semua</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-sign-in-alt text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0">Login ke sistem</h6>
                                    <small class="text-muted">Hari ini, 10:30 AM</small>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary">System</span>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-book text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0">Menyelesaikan kursus UI/UX</h6>
                                    <small class="text-muted">Kemarin, 14:20 PM</small>
                                </div>
                                <span class="badge bg-success bg-opacity-10 text-success">Kursus</span>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-file-alt text-warning"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0">Mengumpulkan tugas</h6>
                                    <small class="text-muted">2 hari yang lalu</small>
                                </div>
                                <span class="badge bg-warning bg-opacity-10 text-warning">Tugas</span>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-comment text-info"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0">Mengirim pesan ke guru</h6>
                                    <small class="text-muted">3 hari yang lalu</small>
                                </div>
                                <span class="badge bg-info bg-opacity-10 text-info">Pesan</span>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-exclamation-triangle text-danger"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0">Perubahan password</h6>
                                    <small class="text-muted">1 minggu yang lalu</small>
                                </div>
                                <span class="badge bg-danger bg-opacity-10 text-danger">Keamanan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-edit me-2"></i>Edit Profil
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="profileForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            <small class="text-muted">Email tidak dapat diubah</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Telepon</label>
                            <input type="tel" class="form-control" value="+62 812 3456 7890">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="date" class="form-control" value="1997-02-24">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <textarea class="form-control" rows="3">Jl. Pendidikan No. 123, Jakarta</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Bio/Deskripsi Diri</label>
                            <textarea class="form-control" rows="4" placeholder="Ceritakan tentang diri Anda..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-gradient" onclick="saveProfile()">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
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
                <form id="passwordForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Saat Ini</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="currentPassword">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('currentPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="newPassword">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <small class="text-muted">Minimal 8 karakter</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmPassword">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-gradient" onclick="changePassword()">
                    <i class="fas fa-key me-2"></i>Ubah Password
                </button>
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
    
    .profile-stat {
        border-right: 1px solid #dee2e6;
    }
    
    .profile-stat:last-child {
        border-right: none;
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection

@section('scripts')
<script>
    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const type = field.type === 'password' ? 'text' : 'password';
        field.type = type;
    }
    
    // Save profile
    function saveProfile() {
        const form = document.getElementById('profileForm');
        const formData = new FormData(form);
        
        // Show loading
        const saveBtn = document.querySelector('#editProfileModal .btn-gradient');
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
        saveBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Show success message
            showToast('success', 'Profil berhasil diperbarui!');
            
            // Reset button
            saveBtn.innerHTML = originalText;
            saveBtn.disabled = false;
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
            modal.hide();
        }, 1500);
    }
    
    // Change password
    function changePassword() {
        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        // Validation
        if (!currentPassword || !newPassword || !confirmPassword) {
            showToast('error', 'Harap isi semua field!');
            return;
        }
        
        if (newPassword.length < 8) {
            showToast('error', 'Password minimal 8 karakter!');
            return;
        }
        
        if (newPassword !== confirmPassword) {
            showToast('error', 'Konfirmasi password tidak cocok!');
            return;
        }
        
        // Show loading
        const saveBtn = document.querySelector('#changePasswordModal .btn-gradient');
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengubah...';
        saveBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Show success message
            showToast('success', 'Password berhasil diubah!');
            
            // Reset form
            document.getElementById('passwordForm').reset();
            
            // Reset button
            saveBtn.innerHTML = originalText;
            saveBtn.disabled = false;
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
            modal.hide();
        }, 1500);
    }
    
    // Toast notification
    function showToast(type, message) {
        const toastContainer = document.createElement('div');
        toastContainer.innerHTML = `
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
                <div id="liveToast" class="toast show" role="alert">
                    <div class="toast-header ${type === 'success' ? 'bg-success text-white' : 'bg-danger text-white'}">
                        <strong class="me-auto">
                            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} me-2"></i>
                            ${type === 'success' ? 'Sukses' : 'Error'}
                        </strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(toastContainer);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            toastContainer.remove();
        }, 3000);
    }
    
    // Print profile
    function printProfile() {
        window.print();
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Add any initialization code here
    });
</script>
@endsection
@endsection