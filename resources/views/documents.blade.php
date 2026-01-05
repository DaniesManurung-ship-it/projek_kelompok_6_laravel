@extends('layouts.app')

@section('title', 'Documents - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">School Documents</h1>
                    <p class="text-muted">Manage and organize school documents and files</p>
                </div>
                <div class="bg-primary text-white p-3 rounded-circle shadow-sm">
                    <i class="fas fa-folder fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 g-md-4 mb-4">
        <div class="col-md-3 col-6">
            <div class="card bg-primary text-white p-3 border-0 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-0">{{ $documents->count() }}</h3>
                        <p class="mb-0 small">Total Files</p>
                    </div>
                    <i class="fas fa-file fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-success text-white p-3 border-0 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-0">{{ $totalSize }}</h3>
                        <p class="mb-0 small">Storage Used</p>
                    </div>
                    <i class="fas fa-database fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-info text-white p-3 border-0 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-0">3</h3>
                        <p class="mb-0 small">Categories</p>
                    </div>
                    <i class="fas fa-tags fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-warning text-white p-3 border-0 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-0">{{ $documents->where('created_at', '>=', now()->today())->count() }}</h3>
                        <p class="mb-0 small">Today Uploads</p>
                    </div>
                    <i class="fas fa-upload fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Categories Dinamis -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-folder-open me-2 text-primary"></i>Document Categories</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4 text-center">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <i class="fas fa-graduation-cap fa-2x text-primary mb-2"></i>
                                <h6 class="fw-bold mb-1">Academic</h6>
                                <span class="badge bg-primary rounded-pill">{{ $countAcademic }} files</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <i class="fas fa-users fa-2x text-success mb-2"></i>
                                <h6 class="fw-bold mb-1">Administrative</h6>
                                <span class="badge bg-success rounded-pill">{{ $countAdmin }} files</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <i class="fas fa-money-bill-wave fa-2x text-warning mb-2"></i>
                                <h6 class="fw-bold mb-1">Financial</h6>
                                <span class="badge bg-warning rounded-pill text-dark">{{ $countFinance }} files</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table Dinamis -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-history me-2 text-primary"></i>Recent Documents</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3">Document Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $doc)
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $icon = 'fa-file';
                                                $color = 'text-secondary';
                                                $ext = strtolower($doc->type);
                                                if(in_array($ext, ['pdf'])) { $icon = 'fa-file-pdf'; $color = 'text-danger'; }
                                                elseif(in_array($ext, ['xlsx', 'xls'])) { $icon = 'fa-file-excel'; $color = 'text-success'; }
                                                elseif(in_array($ext, ['doc', 'docx'])) { $icon = 'fa-file-word'; $color = 'text-primary'; }
                                                elseif(in_array($ext, ['png', 'jpg', 'jpeg'])) { $icon = 'fa-file-image'; $color = 'text-info'; }
                                            @endphp
                                            <i class="fas {{ $icon }} {{ $color }} fa-lg me-2"></i>
                                            <span class="fw-bold text-dark">{{ Str::limit($doc->name, 30) }}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">{{ strtoupper($doc->type) }}</span></td>
                                    <td>{{ $doc->size }}</td> <!-- Perbaikan MB MB ada di sini -->
                                    <td><small class="text-muted">{{ $doc->created_at->diffForHumans() }}</small></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <!-- Download -->
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" class="btn btn-sm btn-outline-primary" title="Download" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                            
                                            <!-- Edit Button (Pemicu Modal) -->
                                            <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $doc->id }}" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Delete -->
                                            <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Modal Edit (Berada di dalam loop agar setiap file punya modal sendiri) -->
                                        <div class="modal fade" id="editModal{{ $doc->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-warning">
                                                        <h5 class="modal-title fw-bold" id="editModalLabel"><i class="fas fa-edit me-2"></i>Edit Document Info</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('documents.update', $doc->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body py-4">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold">Document Name</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $doc->name }}" required>
                                                                <small class="text-muted italic">Ubah nama tampilan file di sistem</small>
                                                            </div>
                                                            <div class="mb-0">
                                                                <label class="form-label fw-bold">Category</label>
                                                                <select name="category" class="form-select" required>
                                                                    <option value="Academic" {{ $doc->category == 'Academic' ? 'selected' : '' }}>Academic</option>
                                                                    <option value="Administrative" {{ $doc->category == 'Administrative' ? 'selected' : '' }}>Administrative</option>
                                                                    <option value="Financial" {{ $doc->category == 'Financial' ? 'selected' : '' }}>Financial</option>
                                                                    <option value="Other" {{ $doc->category == 'Other' ? 'selected' : '' }}>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-warning fw-bold">Update Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25 mb-3">
                                        <p class="text-muted">No documents found. Start by uploading one!</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column (Form Upload) -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-upload me-2 text-primary"></i>Quick Upload</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih File</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                            @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="category" class="form-select" required>
                                <option value="Academic">Academic</option>
                                <option value="Administrative">Administrative</option>
                                <option value="Financial">Financial</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm">
                            <i class="fas fa-cloud-upload-alt me-2"></i>Upload Sekarang
                        </button>
                    </form>
                </div>
            </div>

            <!-- Storage Info -->
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Storage Usage</h6>
                    @php 
                        // Ambil angka saja dari string "0.06 MB" untuk kalkulasi
                        $sizeValue = (float)$totalSize;
                        $percent = ($sizeValue / 1024) * 100; 
                    @endphp
                    <div class="progress mb-2" style="height: 12px; border-radius: 10px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: {{ max($percent, 2) }}%"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted fw-bold">{{ $totalSize }} used</small>
                        <small class="text-muted">Limit 1024 MB</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection