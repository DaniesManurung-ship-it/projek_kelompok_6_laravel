@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">
            <i class="fas fa-users me-2 text-primary"></i>Daftar Guru
        </h1>
        <a href="{{ url('/biodata') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-2"></i>Tambah Guru Baru
        </a>
    </div>

    <!-- Tampilkan Alert Sukses (Penting untuk feedback user) -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0"> <!-- p-0 agar tabel penuh ke pinggir card -->
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Nama Lengkap</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Menggunakan @forelse untuk menangani jika data kosong --}}
                        @forelse($teachers as $t)
                        <tr>
                            <td class="ps-4 fw-bold text-dark">{{ $t->first_name }} {{ $t->last_name }}</td>
                            <td>{{ $t->email }}</td>
                            <td>{{ $t->phone }}</td>
                            <td>{{ $t->address }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Tombol Lihat -->
                                    <a href="{{ route('teachers.show', $t->id) }}" class="btn btn-sm btn-info text-white shadow-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('teachers.edit', $t->id) }}" class="btn btn-sm btn-warning text-white shadow-sm" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('teachers.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm" title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>
                                Belum ada data guru yang tersimpan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection