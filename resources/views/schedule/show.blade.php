@extends('layouts.app')

@section('title', $schedule->title)

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">Detail Jadwal</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('schedule.index') }}">Jadwal</a></li>
                            <li class="breadcrumb-item active">{{ $schedule->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('schedule.edit', $schedule->id) }}">
                                <i class="fas fa-edit me-2"></i> Edit
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('schedule.destroy', $schedule->id) }}" 
                                  method="POST" 
                                  id="delete-form-detail">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="dropdown-item text-danger"
                                        onclick="if(confirm('Hapus jadwal ini?')) document.getElementById('delete-form-detail').submit()">
                                    <i class="fas fa-trash me-2"></i> Hapus
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3">{{ $schedule->title }}</h2>
                    
                    <div class="d-flex align-items-center mb-4">
                        <span class="badge bg-{{ $schedule->type == 'Class' ? 'primary' : ($schedule->type == 'Exam' ? 'danger' : 'success') }} me-3">
                            {{ $schedule->type }}
                        </span>
                        <span class="badge bg-{{ $schedule->status == 'In Progress' ? 'success' : ($schedule->status == 'Upcoming' ? 'warning' : 'secondary') }} me-3">
                            {{ $schedule->status }}
                        </span>
                        <span class="badge bg-info">{{ $schedule->day }}</span>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="fw-bold">Informasi Jadwal</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-chalkboard-teacher text-primary me-2"></i>
                                            <strong>Kelas:</strong> {{ $schedule->class_name }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-user text-success me-2"></i>
                                            <strong>Guru:</strong> {{ $schedule->teacher }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-door-open text-warning me-2"></i>
                                            <strong>Ruangan:</strong> {{ $schedule->room }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-clock text-info me-2"></i>
                                            <strong>Waktu:</strong> 
                                            {{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}
                                        </li>
                                        <li>
                                            <i class="fas fa-calendar text-danger me-2"></i>
                                            <strong>Hari:</strong> {{ $schedule->day }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($schedule->description)
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Deskripsi</h5>
                        <div class="text-muted">
                            {!! nl2br(e($schedule->description)) !!}
                        </div>
                    </div>
                    @endif

                    <div class="border-top pt-3">
                        <a href="{{ route('schedule.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Jadwal
                        </a>
                        <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection