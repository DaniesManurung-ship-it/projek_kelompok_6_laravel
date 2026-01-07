@extends('layouts.app')

@section('title', 'Tambah Pengumuman')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>Tambah Pengumuman
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('pengumuman.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Pengumuman *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="Masukkan judul pengumuman" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kategori *</label>
                                <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Umum" {{ old('type') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    <option value="Akademik" {{ old('type') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Kegiatan" {{ old('type') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="Penting" {{ old('type') == 'Penting' ? 'selected' : '' }}>Penting</option>
                                    <option value="Beasiswa" {{ old('type') == 'Beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                                    <option value="Admission" {{ old('type') == 'Admission' ? 'selected' : '' }}>Penerimaan</option>
                                    <option value="Holiday" {{ old('type') == 'Holiday' ? 'selected' : '' }}>Libur</option>
                                    <option value="Competition" {{ old('type') == 'Competition' ? 'selected' : '' }}>Kompetisi</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Publikasi *</label>
                                <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" 
                                       value="{{ old('publish_date', date('Y-m-d')) }}" required>
                                @error('publish_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Pengumuman *</label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                      rows="5" placeholder="Tulis isi pengumuman di sini..." required>{{ old('content') }}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4 form-check">
                            <input type="checkbox" name="important" class="form-check-input" id="importantCheck" 
                                   value="1" {{ old('important') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="importantCheck">
                                Tandai sebagai pengumuman penting
                            </label>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-gradient">
                                <i class="fas fa-save me-1"></i> Simpan Pengumuman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection