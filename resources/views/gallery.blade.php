@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold">
                <i class="fas fa-images me-2 text-primary"></i>School Gallery
            </h1>
            <p class="text-muted">Capture moments, create memories - Explore our school life through photos</p>
        </div>
    </div>

    <!-- Gallery Filter -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('gallery') }}" 
                   class="btn btn-outline-primary {{ !request('category') ? 'active' : '' }}">
                   All Photos
                </a>
                
                @foreach(['Academic', 'Events', 'Sports', 'Campus', 'Students', 'Teachers'] as $cat)
                    <a href="{{ route('gallery', ['category' => $cat]) }}" 
                       class="btn btn-outline-primary {{ request('category') == $cat ? 'active' : '' }}">
                       {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Gallery Grid -->
    <div class="row">
        @forelse ($galleryItems as $item)
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm h-100 position-relative card-hover">
                <!-- Dropdown Aksi (Edit & Hapus) -->
                <div class="position-absolute top-0 end-0 m-2" style="z-index: 5;">
                    <div class="dropdown">
                        <button class="btn btn-white btn-sm shadow-sm rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-muted"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                    <i class="fas fa-edit me-2 text-warning"></i> Edit Detail
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash me-2"></i> Hapus Foto
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Bagian Gambar -->
                <div class="position-relative" style="height: 200px;">
                    <img src="{{ asset('storage/' . $item->image_path) }}" 
                         class="card-img-top w-100 h-100" 
                         style="object-fit: cover; border-radius: 8px 8px 0 0;">
                    
                    <div class="position-absolute bottom-0 start-0 m-2">
                        <span class="badge bg-primary bg-opacity-75 text-white">{{ $item->category }}</span>
                    </div>
                </div>

                <!-- Bagian Info -->
                <div class="card-body">
                    <h6 class="fw-bold text-truncate mb-1" title="{{ $item->title }}">{{ $item->title }}</h6>
                    <small class="text-muted d-block mb-3">
                        <i class="far fa-calendar me-1"></i> {{ $item->created_at->format('d M Y') }}
                    </small>
                    <button class="btn btn-sm btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#viewModal{{ $item->id }}">
                        <i class="fas fa-eye me-1"></i> View Photo
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL EDIT -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title fw-bold">Edit Info Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('gallery.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body text-start">
                            <div class="mb-3">
                                <label class="form-label">Judul/Nama Foto</label>
                                <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ubah Kategori</label>
                                <select name="category" class="form-select" required>
                                    @foreach(['Academic', 'Events', 'Sports', 'Campus', 'Students', 'Teachers'] as $cat)
                                        <option value="{{ $cat }}" {{ $item->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL VIEW (Read) -->
        <div class="modal fade" id="viewModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-3 btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        <img src="{{ asset('storage/' . $item->image_path) }}" class="w-100 shadow rounded">
                        <div class="p-3 text-center">
                            <h5 class="fw-bold">{{ $item->title }}</h5>
                            <span class="badge bg-primary">{{ $item->category }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-folder-open fa-4x text-light mb-3"></i>
            <p class="text-muted">Belum ada foto di kategori ini.</p>
        </div>
        @endforelse
    </div>

    <!-- Upload Section -->
    <div class="row mt-5">
        <div class="col">
            <div class="card border-0 shadow-sm" style="border: 2px dashed #667eea !important; border-radius: 15px;">
                <div class="card-body p-5 text-center">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <i class="fas fa-cloud-upload-alt fa-4x text-primary mb-4"></i>
                        <h4 class="fw-bold mb-3">Upload Your Photos</h4>
                        
                        <div class="col-md-4 mx-auto mb-3">
                            <select name="category" class="form-select shadow-sm" required>
                                <option value="">-- Pilih Kategori Foto --</option>
                                <option value="Academic">Academic</option>
                                <option value="Events">Events</option>
                                <option value="Sports">Sports</option>
                                <option value="Campus">Campus</option>
                                <option value="Students">Students</option>
                                <option value="Teachers">Teachers</option>
                            </select>
                        </div>

                        <div class="border rounded p-5 bg-light mb-4">
                            <p class="text-muted">Pastikan kategori sudah dipilih, lalu klik tombol di bawah</p>
                            <input type="file" name="photo" id="photoInput" class="d-none" accept="image/*" onchange="this.form.submit()">
                            <label for="photoInput" class="btn btn-primary btn-lg px-5 shadow">
                                <i class="fas fa-folder-open me-2"></i>Browse Files
                            </label>
                            <small class="d-block text-muted mt-3">Maksimal ukuran file: 5MB (JPG, PNG, JPEG)</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection