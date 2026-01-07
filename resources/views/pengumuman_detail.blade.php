@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="fw-bold mb-3">{{ $announcement->title }}</h3>
            <div class="mb-2 text-muted">
                <span class="badge bg-{{ $announcement->important ? 'danger' : 'primary' }}">
                    {{ $announcement->type }}
                </span>
                | Dipublikasikan: {{ date('d M Y', strtotime($announcement->publish_date)) }}
                | <i class="fas fa-eye me-1"></i> {{ number_format($announcement->views) }} views
            </div>
            <hr>
            <p>{{ $announcement->content }}</p>
            <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
