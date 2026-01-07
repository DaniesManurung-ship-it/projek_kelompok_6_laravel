@extends('layouts.app')

@section('title', 'Tambah Jadwal Baru')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>Tambah Jadwal Baru
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('schedule.index') }}">Jadwal</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('schedule.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Judul Jadwal *</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       placeholder="Contoh: Mathematics Class" value="{{ old('title') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nama Kelas *</label>
                                <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" 
                                       placeholder="Contoh: Grade 10" value="{{ old('class_name') }}" required>
                                @error('class_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Guru/Pengajar *</label>
                                <input type="text" name="teacher" class="form-control @error('teacher') is-invalid @enderror" 
                                       placeholder="Nama guru" value="{{ old('teacher') }}" required>
                                @error('teacher')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Ruangan *</label>
                                <input type="text" name="room" class="form-control @error('room') is-invalid @enderror" 
                                       placeholder="Contoh: Room 201" value="{{ old('room') }}" required>
                                @error('room')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Hari *</label>
                                <select name="day" class="form-select @error('day') is-invalid @enderror" required>
                                    <option value="">Pilih Hari</option>
                                    @foreach($days as $day)
                                        <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>
                                            {{ $day }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tipe Jadwal *</label>
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
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Waktu Mulai *</label>
                                <input type="time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" 
                                       value="{{ old('start_time', '08:00') }}" required>
                                @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Waktu Selesai *</label>
                                <input type="time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" 
                                       value="{{ old('end_time', '09:00') }}" required>
                                @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
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
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi (Opsional)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="3" placeholder="Deskripsi tambahan">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('schedule.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-gradient">
                                <i class="fas fa-save me-1"></i> Simpan Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection