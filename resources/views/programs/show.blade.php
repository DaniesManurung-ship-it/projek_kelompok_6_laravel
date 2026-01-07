@extends('layouts.app')

@section('title', $program->title)

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">Detail Program</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></li>
                            <li class="breadcrumb-item active">{{ $program->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('program.edit', $program->id) }}">
                                <i class="fas fa-edit me-2"></i> Edit
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('program.destroy', $program->id) }}" 
                                  method="POST" 
                                  id="delete-form-detail">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="dropdown-item text-danger"
                                        onclick="if(confirm('Hapus program ini?')) document.getElementById('delete-form-detail').submit()">
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
                    @if($program->featured)
                    <div class="alert alert-warning mb-4">
                        <i class="fas fa-star me-2"></i>
                        <strong>PROGRAM FEATURED</strong>
                    </div>
                    @endif
                    
                    <h2 class="fw-bold mb-3">{{ $program->title }}</h2>
                    
                    <div class="d-flex align-items-center mb-4">
                        <span class="badge bg-primary me-3">{{ $program->category }}</span>
                        <span class="badge bg-{{ $program->seats_status == 'Limited' ? 'danger' : 'success' }} me-3">
                            {{ $program->seats_status }} Seats
                        </span>
                        <span class="badge bg-info">{{ $program->level }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Deskripsi Program</h5>
                        <p class="text-muted">{{ $program->description }}</p>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="fw-bold">Informasi Program</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-clock text-primary me-2"></i>
                                            <strong>Durasi:</strong> {{ $program->duration }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-calendar text-success me-2"></i>
                                            <strong>Mulai:</strong> {{ $program->start_date->format('d F Y') }}
                                        </li>
                                        <li>
                                            <i class="fas fa-users text-warning me-2"></i>
                                            <strong>Level:</strong> {{ $program->level }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <a href="{{ route('program.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Program
                        </a>
                        <a href="{{ route('program.edit', $program->id) }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection