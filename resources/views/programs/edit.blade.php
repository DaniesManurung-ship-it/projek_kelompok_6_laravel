@extends('layouts.app')

@section('title', 'Edit Program')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-edit me-2 text-primary"></i>Edit Program
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('program.show', $program->id) }}">{{ $program->title }}</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('program.show', $program->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('program.update', $program->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Program *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $program->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi *</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="4" required>{{ old('description', $program->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kategori *</label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="STEM Program" {{ old('category', $program->category) == 'STEM Program' ? 'selected' : '' }}>STEM Program</option>
                                    <option value="Language Arts" {{ old('category', $program->category) == 'Language Arts' ? 'selected' : '' }}>Language Arts</option>
                                    <option value="Social Sciences" {{ old('category', $program->category) == 'Social Sciences' ? 'selected' : '' }}>Social Sciences</option>
                                    <option value="Arts & Music" {{ old('category', $program->category) == 'Arts & Music' ? 'selected' : '' }}>Arts & Music</option>
                                    <option value="Sports & Health" {{ old('category', $program->category) == 'Sports & Health' ? 'selected' : '' }}>Sports & Health</option>
                                    <option value="Technology" {{ old('category', $program->category) == 'Technology' ? 'selected' : '' }}>Technology</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Durasi *</label>
                                <select name="duration" class="form-select @error('duration') is-invalid @enderror" required>
                                    <option value="">Pilih Durasi</option>
                                    <option value="1 Year" {{ old('duration', $program->duration) == '1 Year' ? 'selected' : '' }}>1 Tahun</option>
                                    <option value="2 Years" {{ old('duration', $program->duration) == '2 Years' ? 'selected' : '' }}>2 Tahun</option>
                                    <option value="3 Years" {{ old('duration', $program->duration) == '3 Years' ? 'selected' : '' }}>3 Tahun</option>
                                    <option value="4 Years" {{ old('duration', $program->duration) == '4 Years' ? 'selected' : '' }}>4 Tahun</option>
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
                                    <option value="Beginner" {{ old('level', $program->level) == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="Intermediate" {{ old('level', $program->level) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="Advanced" {{ old('level', $program->level) == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                    <option value="College" {{ old('level', $program->level) == 'College' ? 'selected' : '' }}>College</option>
                                </select>
                                @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status Kursi *</label>
                                <select name="seats_status" class="form-select @error('seats_status') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Available" {{ old('seats_status', $program->seats_status) == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Limited" {{ old('seats_status', $program->seats_status) == 'Limited' ? 'selected' : '' }}>Limited</option>
                                    <option value="Open" {{ old('seats_status', $program->seats_status) == 'Open' ? 'selected' : '' }}>Open</option>
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
                                       value="{{ old('start_date', $program->start_date->format('Y-m-d')) }}" required>
                                @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold d-block">&nbsp;</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="featured" class="form-check-input" id="featuredCheck" 
                                           value="1" {{ old('featured', $program->featured) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="featuredCheck">
                                        Tandai sebagai program featured
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <a href="{{ route('program.show', $program->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('program.destroy', $program->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="btn btn-danger"
                                            onclick="if(confirm('Hapus program ini?')) this.form.submit()">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-gradient ms-2">
                                    <i class="fas fa-save me-1"></i> Update Program
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection