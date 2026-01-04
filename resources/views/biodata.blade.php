@extends('layouts.app')

@section('title', 'Biodata Teacher')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold">
                    <i class="fas fa-user-plus me-2 text-primary"></i>Add New Teacher
                </h1>
                <a href="#" class="btn btn-outline-primary">
                    <i class="fas fa-download me-2"></i>Export Data
                </a>
            </div>
        </div>
    </div>

    <!-- Biodata Form -->
    <div class="row">
        <div class="col">
            <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tampilkan Alert Jika Sukses -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tampilkan Alert Jika Ada Error Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Personal Details Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-user-circle me-2 text-primary"></i>Personal Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" placeholder="Contoh: Ariel" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Contoh: Silitonga" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="email@contoh.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phone <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" placeholder="0821xxxx" required>
                            </div>
                        </div>

                        <!-- BAGIAN YANG TADI HILANG ADA DI SINI -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Date of Birth <span class="text-danger">*</span></label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Place of Birth <span class="text-danger">*</span></label>
                                <input type="text" name="pob" class="form-control" placeholder="Contoh: Jakarta" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Alamat lengkap..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <small class="text-muted">Format: JPG, PNG (Max 2MB)</small>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end mb-5">
                    <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-2"></i>Submit Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection