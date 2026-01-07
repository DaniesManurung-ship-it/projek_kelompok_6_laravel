@extends('layouts.app')

@section('title', $berita->title)

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">Detail Berita</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                            <li class="breadcrumb-item active">{{ $berita->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('berita.edit', $berita->id) }}">
                                <i class="fas fa-edit me-2"></i> Edit
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('berita.destroy', $berita->id) }}" 
                                  method="POST" 
                                  id="delete-form-detail">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="dropdown-item text-danger"
                                        onclick="if(confirm('Hapus berita ini?')) document.getElementById('delete-form-detail').submit()">
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
                    @if($berita->featured)
                    <div class="alert alert-warning mb-4">
                        <i class="fas fa-star me-2"></i>
                        <strong>BERITA UTAMA</strong>
                    </div>
                    @endif
                    
                    <h2 class="fw-bold mb-3">{{ $berita->title }}</h2>
                    
                    <div class="d-flex align-items-center mb-4">
                        <span class="badge bg-primary me-3">{{ $berita->category }}</span>
                        <span class="badge bg-info me-3">
                            <i class="fas fa-user me-1"></i>{{ $berita->penulis }}
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-eye me-1"></i>{{ number_format($berita->views) }} dilihat
                        </span>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Konten Berita</h5>
                        <div class="text-muted">
                            {!! nl2br(e($berita->description)) !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="fw-bold">Informasi Berita</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-calendar text-primary me-2"></i>
                                            <strong>Tanggal Publikasi:</strong> {{ $berita->publish_date->format('d F Y') }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-user text-success me-2"></i>
                                            <strong>Penulis:</strong> {{ $berita->penulis }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-tag text-warning me-2"></i>
                                            <strong>Kategori:</strong> {{ $berita->category }}
                                        </li>
                                        <li>
                                            <i class="fas fa-eye text-info me-2"></i>
                                            <strong>Dilihat:</strong> {{ number_format($berita->views) }} kali
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <a href="{{ route('berita.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Berita
                        </a>
                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection