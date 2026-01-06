@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    
    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Library Management</h2>
            <p class="text-muted">Manage books, stocks, and borrowing records.</p>
        </div>
        <!-- Button Trigger Modal Tambah -->
        <button class="btn btn-primary shadow-sm px-4" data-bs-toggle="modal" data-bs-target="#modalTambahBuku">
            <i class="fas fa-plus me-2"></i>Add New Book
        </button>
    </div>

    <!-- Statistik Library -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-0">{{ $books->count() }}</h3>
                            <p class="mb-0 opacity-75">Total Books</p>
                        </div>
                        <i class="fas fa-book fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-0">{{ $books->where('status', 'Available')->count() }}</h3>
                            <p class="mb-0 opacity-75">Available</p>
                        </div>
                        <i class="fas fa-check-circle fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-0">{{ $books->where('status', 'Borrowed')->count() }}</h3>
                            <p class="mb-0 opacity-75">Borrowed</p>
                        </div>
                        <i class="fas fa-exchange-alt fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-0">0</h3>
                            <p class="mb-0 opacity-75">Overdue</p>
                        </div>
                        <i class="fas fa-exclamation-triangle fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Buku (Tabel) -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3 border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0 fw-bold">Books Collection</h5>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control bg-light border-0" placeholder="Search books...">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted">
                        <tr>
                            <th class="ps-4">Book Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light p-2 rounded-3 me-3 text-primary">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold d-block">{{ $book->title }}</span>
                                        <small class="text-muted">ISBN: {{ $book->isbn }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category }}</td>
                            <td>
                                @if($book->status == 'Available')
                                    <span class="badge bg-success-soft text-success rounded-pill px-3">Available</span>
                                @else
                                    <span class="badge bg-warning-soft text-warning rounded-pill px-3">Borrowed</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Button Edit -->
                                    <button class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $book->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    
                                    <!-- Form Hapus -->
                                    <form action="{{ route('library.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- MODAL EDIT BUKU -->
                        <div class="modal fade" id="modalEdit{{ $book->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('library.update', $book->id) }}" method="POST" class="modal-content border-0 shadow">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Book</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Book Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Author</label>
                                            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">ISBN</label>
                                            <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <input type="text" name="category" class="form-control" value="{{ $book->category }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="Available" {{ $book->status == 'Available' ? 'selected' : '' }}>Available</option>
                                                <option value="Borrowed" {{ $book->status == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No books found in collection.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH BUKU -->
<div class="modal fade" id="modalTambahBuku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('library.store') }}" method="POST" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add New Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Book Title</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. Modern UI Design" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="e.g. ZHF Studio" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="e.g. 987-123-xxx" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" placeholder="e.g. Design" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Book</button>
            </div>
        </form>
    </div>
</div>

<style>
    .bg-success-soft { background-color: #e8fadf; }
    .bg-warning-soft { background-color: #fff4e5; }
    .rounded-4 { border-radius: 1rem !important; }
    .table thead th { font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .modal-content { border-radius: 1rem; }
    .form-control, .form-select { border-radius: 0.5rem; padding: 0.6rem 1rem; }
</style>
@endsection