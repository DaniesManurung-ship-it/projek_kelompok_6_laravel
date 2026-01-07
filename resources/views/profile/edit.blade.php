@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-edit me-2 text-primary"></i>Edit Profil
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Profil</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('profile.update', $profile->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <h5 class="fw-bold mb-4 border-bottom pb-3">Informasi Pribadi</h5>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Telepon</label>
                                <input type="tel" name="phone" class="form-control" 
                                       value="{{ old('phone', $profile->phone) }}" 
                                       placeholder="Contoh: 081234567890">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Lahir</label>
                                <input type="date" name="birth_date" class="form-control" 
                                       value="{{ old('birth_date', $profile->birth_date ? $profile->birth_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tempat Lahir</label>
                                <input type="text" name="birth_place" class="form-control" 
                                       value="{{ old('birth_place', $profile->birth_place) }}" 
                                       placeholder="Kota tempat lahir">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Jenis Kelamin</label>
                                <select name="gender" class="form-select">
                                    <option value="male" {{ old('gender', $profile->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="female" {{ old('gender', $profile->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    <option value="other" {{ old('gender', $profile->gender) == 'other' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">NIK</label>
                                <input type="text" name="nik" class="form-control" 
                                       value="{{ old('nik', $profile->nik) }}" 
                                       placeholder="Nomor Induk Kependudukan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Alamat</label>
                                <input type="text" name="address" class="form-control" 
                                       value="{{ old('address', $profile->address) }}" 
                                       placeholder="Alamat lengkap">
                            </div>
                        </div>
                        
                        <h5 class="fw-bold mb-4 mt-5 border-bottom pb-3">Informasi Pendidikan</h5>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Universitas</label>
                                <input type="text" name="university" class="form-control" 
                                       value="{{ old('university', $profile->university) }}" 
                                       placeholder="Nama universitas">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Jurusan</label>
                                <input type="text" name="major" class="form-control" 
                                       value="{{ old('major', $profile->major) }}" 
                                       placeholder="Jurusan studi">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Periode Studi</label>
                                <input type="text" name="study_period" class="form-control" 
                                       value="{{ old('study_period', $profile->study_period) }}" 
                                       placeholder="Contoh: 2020-2024">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kota Studi</label>
                                <input type="text" name="study_city" class="form-control" 
                                       value="{{ old('study_city', $profile->study_city) }}" 
                                       placeholder="Kota tempat studi">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Deskripsi Diri</label>
                            <textarea name="description" class="form-control" rows="4" 
                                      placeholder="Ceritakan tentang diri Anda...">{{ old('description', $profile->description) }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-gradient">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection