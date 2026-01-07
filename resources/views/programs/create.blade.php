@extends('layouts.app')

@section('title', 'Tambah Program Baru')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>Tambah Program Baru
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('program.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('program.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Program *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="Masukkan nama program" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi *</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="4" placeholder="Deskripsi program" required>{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kategori *</label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="STEM Program" {{ old('category') == 'STEM Program' ? 'selected' : '' }}>STEM Program</option>
                                    <option value="Language Arts" {{ old('category') == 'Language Arts' ? 'selected' : '' }}>Language Arts</option>
                                    <option value="Social Sciences" {{ old('category') == 'Social Sciences' ? 'selected' : '' }}>Social Sciences</option>
                                    <option value="Arts & Music" {{ old('category') == 'Arts & Music' ? 'selected' : '' }}>Arts & Music</option>
                                    <option value="Sports & Health" {{ old('category') == 'Sports & Health' ? 'selected' : '' }}>Sports & Health</option>
                                    <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Durasi *</label>
                                <select name="duration" class="form-select @error('duration') is-invalid @enderror" required>
                                    <option value="">Pilih Durasi</option>
                                    <option value="1 Year" {{ old('duration') == '1 Year' ? 'selected' : '' }}>1 Tahun</option>
                                    <option value="2 Years" {{ old('duration') == '2 Years' ? 'selected' : '' }}>2 Tahun</option>
                                    <option value="3 Years" {{ old('duration') == '3 Years' ? 'selected' : '' }}>3 Tahun</option>
                                    <option value="4 Years" {{ old('duration') == '4 Years' ? 'selected' : '' }}>4 Tahun</option>
                                </select>
                                @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Level *</label>
                                <select name="level" class="form-select @error('level') is-invalid @enderror" required>
                                    <option value="">Pilih Level</option>
                                    <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                    <option value="College" {{ old('level') == 'College' ? 'selected' : '' }}>College</option>
                                </select>
                                @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status Kursi *</label>
                                <select name="seats_status" class="form-select @error('seats_status') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Available" {{ old('seats_status') == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Limited" {{ old('seats_status') == 'Limited' ? 'selected' : '' }}>Limited</option>
                                    <option value="Open" {{ old('seats_status') == 'Open' ? 'selected' : '' }}>Open</option>
                                </select>
                                @error('seats_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Mulai *</label>
                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" 
                                       value="{{ old('start_date', date('Y-m-d')) }}" required>
                                @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold d-block">&nbsp;</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="featured" class="form-check-input" id="featuredCheck" 
                                           value="1" {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="featuredCheck">
                                        Tandai sebagai program featured
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('program.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-gradient">
                                <i class="fas fa-save me-1"></i> Simpan Program
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection