@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-edit me-2 text-primary"></i>Edit Jadwal
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('schedule.index') }}">Jadwal</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('schedule.show', $schedule->id) }}">{{ $schedule->title }}</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('schedule.show', $schedule->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Judul Jadwal *</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $schedule->title) }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nama Kelas *</label>
                                <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" 
                                       value="{{ old('class_name', $schedule->class_name) }}" required>
                                @error('class_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Guru/Pengajar *</label>
                                <input type="text" name="teacher" class="form-control @error('teacher') is-invalid @enderror" 
                                       value="{{ old('teacher', $schedule->teacher) }}" required>
                                @error('teacher')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Ruangan *</label>
                                <input type="text" name="room" class="form-control @error('room') is-invalid @enderror" 
                                       value="{{ old('room', $schedule->room) }}" required>
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
                                        <option value="{{ $day }}" {{ old('day', $schedule->day) == $day ? 'selected' : '' }}>
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
                                        <option value="{{ $type }}" {{ old('type', $schedule->type) == $type ? 'selected' : '' }}>
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
                                       value="{{ old('start_time', date('H:i', strtotime($schedule->start_time))) }}" required>
                                @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Waktu Selesai *</label>
                                <input type="time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" 
                                       value="{{ old('end_time', date('H:i', strtotime($schedule->end_time))) }}" required>
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
                                        <option value="{{ $status }}" {{ old('status', $schedule->status) == $status ? 'selected' : '' }}>
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
                                      rows="3">{{ old('description', $schedule->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <a href="{{ route('schedule.show', $schedule->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('schedule.destroy', $schedule->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="btn btn-danger"
                                            onclick="if(confirm('Hapus jadwal ini?')) this.form.submit()">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-gradient ms-2">
                                    <i class="fas fa-save me-1"></i> Update Jadwal
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
