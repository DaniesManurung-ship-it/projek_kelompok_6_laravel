@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold">
                <i class="fas fa-plus-circle text-primary me-2"></i>
                Tambah Berita
            </h1>
            <p class="text-muted">Isi form di bawah untuk menambahkan berita baru</p>
        </div>
    </div>

    <!-- ERROR VALIDATION -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('news.store') }}" method="POST">
                @csrf

                <!-- JUDUL -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Berita</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Masukkan judul berita"
                           value="{{ old('title') }}"
                           required>
                </div>

                <!-- KATEGORI -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="category" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Academic">Academic</option>
                        <option value="Events">Events</option>
                        <option value="Sports">Sports</option>
                        <option value="Achievements">Achievements</option>
                    </select>
                </div>

                <!-- TANGGAL -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tanggal Berita</label>
                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ old('date') }}"
                           required>
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Isi Berita</label>
                    <textarea name="description"
                              class="form-control"
                              rows="5"
                              placeholder="Tulis isi berita di sini..."
                              required>{{ old('desc') }}</textarea>
                </div>

                <!-- TOMBOL -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Berita
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
