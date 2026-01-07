@extends('layouts.app')

@section('title', 'Tambah Laporan Baru')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>Tambah Laporan Baru
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('report.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('report.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Laporan *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="Contoh: Laporan Akademik Semester 1" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi (Opsional)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="3" placeholder="Deskripsi laporan">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tipe Laporan *</label>
                                <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">Pilih Tipe</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status *</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Format *</label>
                                <select name="format" class="form-select @error('format') is-invalid @enderror" required>
                                    <option value="">Pilih Format</option>
                                    @foreach($formats as $format)
                                        <option value="{{ $format }}" {{ old('format') == $format ? 'selected' : '' }}>
                                            {{ $format }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('format')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Laporan *</label>
                                <input type="date" name="report_date" class="form-control @error('report_date') is-invalid @enderror" 
                                       value="{{ old('report_date', date('Y-m-d')) }}" required>
                                @error('report_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Dibuat Oleh</label>
                                <input type="text" name="generated_by" class="form-control @error('generated_by') is-invalid @enderror" 
                                       placeholder="Nama pembuat" value="{{ old('generated_by') }}">
                                @error('generated_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">File Path (Opsional)</label>
                                <input type="text" name="file_path" class="form-control @error('file_path') is-invalid @enderror" 
                                       placeholder="Path file laporan" value="{{ old('file_path') }}">
                                @error('file_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('report.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-gradient">
                                <i class="fas fa-save me-1"></i> Simpan Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection