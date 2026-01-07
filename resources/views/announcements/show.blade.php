@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">Detail Pengumuman</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                            <li class="breadcrumb-item active">{{ Str::limit($announcement->title, 30) }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('pengumuman.edit', $announcement->id) }}">
                                <i class="fas fa-edit me-2"></i> Edit
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('pengumuman.destroy', $announcement->id) }}" 
                                  method="POST" 
                                  id="delete-form-detail">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="dropdown-item text-danger"
                                        onclick="if(confirm('Hapus pengumuman ini?')) document.getElementById('delete-form-detail').submit()">
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
                    @if($announcement->important)
                    <div class="alert alert-danger mb-4">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>PENGUMUMAN PENTING</strong>
                    </div>
                    @endif
                    
                    <h2 class="fw-bold mb-3">{{ $announcement->title }}</h2>
                    
                    <div class="d-flex align-items-center mb-4 text-muted">
                        <span class="badge bg-{{ $announcement->important ? 'danger' : 'primary' }} me-3">
                            {{ $announcement->type }}
                        </span>
                        <small class="me-3">
                            <i class="far fa-calendar me-1"></i> 
                            {{ $announcement->publish_date->format('d F Y') }}
                        </small>
                        <small>
                            <i class="fas fa-eye me-1"></i> {{ $announcement->views }} views
                        </small>
                        <small class="ms-3">
                            <i class="far fa-clock me-1"></i> 
                            {{ $announcement->created_at->format('H:i') }}
                        </small>
                    </div>

                    <div class="mb-4 p-3 bg-light rounded">
                        {!! nl2br(e($announcement->content)) !!}
                    </div>

                    <div class="border-top pt-3">
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Pengumuman
                        </a>
                        <a href="{{ route('pengumuman.edit', $announcement->id) }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection