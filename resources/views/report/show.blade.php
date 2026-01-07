@extends('layouts.app')

@section('title', $report->title)

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">Detail Laporan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan</a></li>
                            <li class="breadcrumb-item active">{{ $report->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('report.edit', $report->id) }}">
                                <i class="fas fa-edit me-2"></i> Edit
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('report.destroy', $report->id) }}" 
                                  method="POST" 
                                  id="delete-form-detail">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="dropdown-item text-danger"
                                        onclick="if(confirm('Hapus laporan ini?')) document.getElementById('delete-form-detail').submit()">
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
                    <h2 class="fw-bold mb-3">{{ $report->title }}</h2>
                    
                    <div class="d-flex align-items-center mb-4 flex-wrap gap-2">
                        @php
                            $typeColors = [
                                'Academic' => 'primary',
                                'Attendance' => 'info',
                                'Financial' => 'warning',
                                'Staff' => 'danger',
                                'Other' => 'secondary'
                            ];
                            $statusColors = [
                                'Published' => 'success',
                                'Pending' => 'warning',
                                'Draft' => 'secondary'
                            ];
                        @endphp
                        
                        <span class="badge bg-{{ $typeColors[$report->type] ?? 'secondary' }} me-3">
                            {{ $report->type }}
                        </span>
                        <span class="badge bg-{{ $statusColors[$report->status] ?? 'secondary' }} me-3">
                            {{ $report->status }}
                        </span>
                        <span class="badge bg-light text-dark me-3">
                            <i class="fas fa-file me-1"></i>{{ $report->format }}
                        </span>
                    </div>

                    @if($report->description)
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Deskripsi Laporan</h5>
                        <div class="text-muted">
                            {!! nl2br(e($report->description)) !!}
                        </div>
                    </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="fw-bold">Informasi Laporan</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-calendar text-primary me-2"></i>
                                            <strong>Tanggal Laporan:</strong> {{ $report->report_date->format('d F Y') }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-calendar-check text-success me-2"></i>
                                            <strong>Dibuat Pada:</strong> {{ $report->generated_date ? $report->generated_date->format('d F Y') : '-' }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-user text-warning me-2"></i>
                                            <strong>Dibuat Oleh:</strong> {{ $report->generated_by ?? '-' }}
                                        </li>
                                        @if($report->file_path)
                                        <li>
                                            <i class="fas fa-file-download text-info me-2"></i>
                                            <strong>File:</strong> 
                                            <a href="{{ $report->file_path }}" target="_blank" class="text-decoration-none">
                                                Download
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <a href="{{ route('report.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Laporan
                        </a>
                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        @if($report->file_path)
                        <a href="{{ $report->file_path }}" target="_blank" class="btn btn-outline-success ms-2">
                            <i class="fas fa-download me-1"></i> Download
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection