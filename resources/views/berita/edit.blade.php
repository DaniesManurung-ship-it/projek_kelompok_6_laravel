@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-edit me-2 text-primary"></i>Edit Berita
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('berita.show', $berita->id) }}">{{ $berita->title }}</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Berita *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $berita->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi *</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="6" required>{{ old('description', $berita->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kategori *</label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Academic" {{ old('category', $berita->category) == 'Academic' ? 'selected' : '' }}>Academic</option>
                                    <option value="Sports" {{ old('category', $berita->category) == 'Sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="Events" {{ old('category', $berita->category) == 'Events' ? 'selected' : '' }}>Events</option>
                                    <option value="Achievements" {{ old('category', $berita->category) == 'Achievements' ? 'selected' : '' }}>Achievements</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Penulis *</label>
                                <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" 
                                       value="{{ old('penulis', $berita->penulis) }}" required>
                                @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Publikasi *</label>
                                <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" 
                                       value="{{ old('publish_date', $berita->publish_date->format('Y-m-d')) }}" required>
                                @error('publish_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Jumlah Dilihat</label>
                                <input type="number" name="views" class="form-control @error('views') is-invalid @enderror" 
                                       value="{{ old('views', $berita->views) }}" min="0">
                                @error('views')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="featured" class="form-check-input" id="featuredCheck" 
                                   value="1" {{ old('featured', $berita->featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="featuredCheck">
                                Tandai sebagai berita utama
                            </label>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('berita.destroy', $berita->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="btn btn-danger"
                                            onclick="if(confirm('Hapus berita ini?')) this.form.submit()">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-gradient ms-2">
                                    <i class="fas fa-save me-1"></i> Update Berita
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