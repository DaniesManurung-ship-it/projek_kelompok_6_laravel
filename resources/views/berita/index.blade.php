@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Berita & Informasi Sekolah</h1>
                        <p class="lead mb-4">Ikuti perkembangan dan kegiatan terbaru di sekolah kami</p>
                        <a href="{{ route('berita.create') }}" class="btn btn-light btn-lg fw-bold">
                            <i class="fas fa-plus me-2"></i>Tambah Berita Baru
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-newspaper fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured News -->
    <div class="row mb-5">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0">Berita Utama</h2>
                <a href="{{ route('berita.create') }}" class="btn btn-gradient">
                    <i class="fas fa-plus me-2"></i>Tambah Berita
                </a>
            </div>
            <div class="row">
                @forelse($berita->where('featured', true) as $item)
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold">{{ $item->title }}</h5>
                                <span class="badge bg-warning">
                                    <i class="fas fa-star me-1"></i>Utama
                                </span>
                            </div>
                            <p class="text-muted mb-4">{{ Str::limit($item->description, 150) }}</p>
                            <div class="row">
                                <div class="col">
                                    <small class="text-muted">Penulis</small>
                                    <p class="fw-bold mb-0">{{ $item->penulis }}</p>
                                </div>
                                <div class="col">
                                    <small class="text-muted">Kategori</small>
                                    <p class="fw-bold mb-0">{{ $item->category }}</p>
                                </div>
                                <div class="col">
                                    <small class="text-muted">Dilihat</small>
                                    <p class="fw-bold mb-0">{{ number_format($item->views) }}</p>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <a href="{{ route('berita.show', $item->id) }}" class="btn btn-outline-primary">Baca Selengkapnya</a>
                                <div class="dropdown">
                                    <button class="btn btn-gradient dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-cog me-1"></i> Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('berita.show', $item->id) }}">
                                                <i class="fas fa-eye me-2"></i> Lihat Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('berita.edit', $item->id) }}">
                                                <i class="fas fa-edit me-2"></i> Edit
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('berita.destroy', $item->id) }}" 
                                                  method="POST" 
                                                  id="delete-form-{{ $item->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="dropdown-item text-danger"
                                                        onclick="confirmDelete({{ $item->id }}, '{{ $item->title }}')">
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
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Belum ada berita utama.
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- All Berita -->
    <div class="row mb-5">
        <div class="col">
            <h2 class="fw-bold mb-4">Semua Berita</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Dilihat</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->title }}</strong>
                                @if($item->featured)
                                <span class="badge bg-warning ms-2">Utama</span>
                                @endif
                            </td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ number_format($item->views) }}</td>
                            <td>{{ $item->publish_date->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('berita.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="confirmDelete({{ $item->id }}, '{{ $item->title }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form action="{{ route('berita.destroy', $item->id) }}" 
                                          method="POST" 
                                          id="delete-form-{{ $item->id }}"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-newspaper fa-2x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada berita tersedia</p>
                                <a href="{{ route('berita.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Tambah Berita Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        @if(session('success'))
            showToast('{{ session("success") }}', 'success');
        @endif

        @if($errors->any())
            showToast('Terjadi kesalahan, silakan periksa form!', 'error');
        @endif
    });

    function showToast(message, type = 'success') {
        const toast = $(`
            <div class="toast align-items-center text-bg-${type} border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `);
        $('.toast-container').append(toast);
        new bootstrap.Toast(toast[0]).show();
        setTimeout(() => toast.remove(), 3000);
    }

    function confirmDelete(id, title) {
        if (confirm(`Yakin ingin menghapus berita "${title}"?`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
@endsection
@endsection