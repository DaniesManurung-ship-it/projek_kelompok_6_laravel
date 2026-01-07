@extends('layouts.app')

@section('title', 'Program Sekolah')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Academic Programs & Curriculum</h1>
                        <p class="lead mb-4">Comprehensive educational programs designed to nurture future leaders and innovators</p>
                        <a href="{{ route('program.create') }}" class="btn btn-light btn-lg fw-bold">
                            <i class="fas fa-plus me-2"></i>Tambah Program Baru
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-book-open fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Program Categories -->
    <div class="row mb-5">
        <div class="col">
            <h2 class="fw-bold mb-4 text-center">Program Categories</h2>
            <div class="row">
                @php
                    $categories = [
                        ['title' => 'STEM Program', 'icon' => 'fas fa-atom', 'color' => 'primary'],
                        ['title' => 'Language Arts', 'icon' => 'fas fa-language', 'color' => 'success'],
                        ['title' => 'Social Sciences', 'icon' => 'fas fa-globe-asia', 'color' => 'warning'],
                        ['title' => 'Arts & Music', 'icon' => 'fas fa-palette', 'color' => 'danger'],
                        ['title' => 'Sports & Health', 'icon' => 'fas fa-running', 'color' => 'info'],
                        ['title' => 'Technology', 'icon' => 'fas fa-laptop-code', 'color' => 'secondary'],
                    ];
                @endphp
                
                @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4 text-center">
                            <div class="bg-{{ $category['color'] }} bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                <i class="{{ $category['icon'] }} fa-3x text-{{ $category['color'] }}"></i>
                            </div>
                            <h4 class="fw-bold mb-2">{{ $category['title'] }}</h4>
                            @php
                                $count = $programs->where('category', $category['title'])->count();
                            @endphp
                            <p class="text-muted">{{ $count }} Programs Available</p>
                            <a href="#" class="btn btn-outline-{{ $category['color'] }}">Lihat Program</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Programs -->
    <div class="row mb-5">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0">Featured Programs</h2>
                <a href="{{ route('program.create') }}" class="btn btn-gradient">
                    <i class="fas fa-plus me-2"></i>Tambah Program
                </a>
            </div>
            <div class="row">
                @forelse($programs->where('featured', true) as $program)
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold">{{ $program->title }}</h5>
                                <span class="badge bg-{{ $program->seats_status == 'Limited' ? 'danger' : 'success' }}">
                                    {{ $program->seats_status }} Seats
                                </span>
                            </div>
                            <p class="text-muted mb-4">{{ $program->description }}</p>
                            <div class="row">
                                <div class="col">
                                    <small class="text-muted">Duration</small>
                                    <p class="fw-bold mb-0">{{ $program->duration }}</p>
                                </div>
                                <div class="col">
                                    <small class="text-muted">Level</small>
                                    <p class="fw-bold mb-0">{{ $program->level }}</p>
                                </div>
                                <div class="col">
                                    <small class="text-muted">Start Date</small>
                                   <p class="fw-bold mb-0">
                                    {{ optional($program->start_date)->format('M Y') ?? '-' }}
                                </p>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <a href="{{ route('program.show', $program->id) }}" class="btn btn-outline-primary">Program Details</a>
                                <div class="dropdown">
                                    <button class="btn btn-gradient dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-cog me-1"></i> Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('program.show', $program->id) }}">
                                                <i class="fas fa-eye me-2"></i> Lihat Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('program.edit', $program->id) }}">
                                                <i class="fas fa-edit me-2"></i> Edit
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('program.destroy', $program->id) }}" 
                                                  method="POST" 
                                                  id="delete-form-{{ $program->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="dropdown-item text-danger"
                                                        onclick="confirmDelete({{ $program->id }}, '{{ $program->title }}')">
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
                        <i class="fas fa-info-circle me-2"></i> Belum ada program featured.
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- All Programs -->
    <div class="row mb-5">
        <div class="col">
            <h2 class="fw-bold mb-4">All Programs</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Program</th>
                            <th>Category</th>
                            <th>Duration</th>
                            <th>Level</th>
                            <th>Seats</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programs as $program)
                        <tr>
                            <td>
                                <strong>{{ $program->title }}</strong>
                                @if($program->featured)
                                <span class="badge bg-warning ms-2">Featured</span>
                                @endif
                            </td>
                            <td>{{ $program->category }}</td>
                            <td>{{ $program->duration }}</td>
                            <td>{{ $program->level }}</td>
                            <td>
                                <span class="badge bg-{{ $program->seats_status == 'Limited' ? 'danger' : 'success' }}">
                                    {{ $program->seats_status }}
                                </span>
                            </td>
                            <td>{{ optional($program->start_date)->format('d M Y') ?? '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('program.show', $program->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('program.edit', $program->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="confirmDelete({{ $program->id }}, '{{ $program->title }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form action="{{ route('program.destroy', $program->id) }}" 
                                          method="POST" 
                                          id="delete-form-{{ $program->id }}"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-book-open fa-2x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada program tersedia</p>
                                <a href="{{ route('program.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Tambah Program Pertama
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

@
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
        if (confirm(`Yakin ingin menghapus program "${title}"?`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
@endsection
@endsection