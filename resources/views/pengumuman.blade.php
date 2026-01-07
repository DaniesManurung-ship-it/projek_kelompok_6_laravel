@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold">
                        <i class="fas fa-bullhorn me-2 text-primary"></i>Pengumuman
                    </h1>
                    <p class="text-muted">Informasi terbaru dan penting dari sekolah</p>
                </div>
                <a href="{{ route('pengumuman.create') }}" class="btn btn-gradient">
                    <i class="fas fa-plus me-2"></i>Tambah Pengumuman
                </a>
            </div>
        </div>
    </div>

    <!-- Important Announcements -->
    @if($announcements->where('important', true)->count() > 0)
    <div class="row mb-5">
        <div class="col">
            @foreach($announcements->where('important', true)->take(1) as $important)
            <div class="bg-gradient-1 text-white rounded p-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white rounded-circle p-3 me-4">
                        <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2">PENTING: {{ $important->title }}</h4>
                        <p class="mb-2">{{ Str::limit($important->content, 200) }}</p>
                        <small>
                            <i class="far fa-clock me-1"></i> 
                            {{ $important->publish_date->format('d M Y') }} | 
                            <i class="fas fa-eye me-1 ms-2"></i> {{ $important->views }} views
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Announcements List -->
    <div class="row">
        @forelse($announcements as $announcement)
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm card-hover h-100 {{ $announcement->important ? 'border-start border-4 border-danger' : '' }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-{{ $announcement->important ? 'danger' : 'primary' }}">
                            {{ $announcement->type }}
                        </span>
                        <small class="text-muted">
                            <i class="far fa-clock me-1"></i> 
                            {{ $announcement->publish_date->format('d M Y') }}
                        </small>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $announcement->title }}</h5>
                    <p class="text-muted mb-4">{{ Str::limit($announcement->content, 150) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-eye text-muted me-1"></i>
                            <small class="text-muted">{{ number_format($announcement->views) }} views</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" 
                                    type="button" 
                                    data-bs-toggle="dropdown">
                                <i class="fas fa-cog me-1"></i> Aksi
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('pengumuman.show', $announcement->id) }}">
                                        <i class="fas fa-eye me-2"></i> Lihat Detail
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('pengumuman.edit', $announcement->id) }}">
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('pengumuman.destroy', $announcement->id) }}" 
                                          method="POST" 
                                          id="delete-form-{{ $announcement->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="dropdown-item text-danger"
                                                onclick="confirmDelete({{ $announcement->id }}, '{{ $announcement->title }}')">
                                            <i class="fas fa-trash me-2"></i> Hapus
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada pengumuman</h5>
                <p class="text-muted">Tambahkan pengumuman pertama Anda</p>
                <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Pengumuman
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Show success message
        @if(session('success'))
        showToast('{{ session("success") }}', 'success');
        @endif

        @if($errors->any())
        showToast('Terjadi kesalahan, silakan periksa form!', 'error');
        @endif
    });

    function showToast(message, type = 'success') {
        const toast = $(`<div class="toast align-items-center text-bg-${type} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>`);
        $('.toast-container').append(toast);
        const bsToast = new bootstrap.Toast(toast[0]);
        bsToast.show();
        setTimeout(() => toast.remove(), 3000);
    }

    function confirmDelete(id, title) {
        if (confirm(`Yakin ingin menghapus pengumuman "${title}"?`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
@endsection
@endsection