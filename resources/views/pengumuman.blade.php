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
            
            </div>
        </div>
    </div>

    <!-- Important Announcements -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-4">
                <div class="d-flex align-items-center">
                    <div class="bg-white rounded-circle p-3 me-4">
                        <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2">PENTING: Jadwal Ujian Semester Genap 2026</h4>
                        <p class="mb-2">Ujian semester genap akan dilaksanakan tanggal 3-15 Juni 2026. Silakan cek jadwal lengkap di portal akademik.</p>
                        <small><i class="far fa-clock me-1"></i> Diposting: 25 Mei 2026 | <i class="fas fa-eye me-1 ms-2"></i> 1,245 views</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcements List -->
    <div class="row">   
        @foreach ($announcements as $announcement)
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm card-hover h-100 {{ $announcement['important'] ? 'border-start border-4 border-danger' : '' }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-{{ $announcement['important'] ? 'danger' : 'primary' }}">{{ $announcement['type'] }}</span>
                        <small class="text-muted">
                            <i class="far fa-clock me-1"></i> {{ date('d M Y', strtotime($announcement['date'])) }}
                        </small>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $announcement['title'] }}</h5>
                    <p class="text-muted mb-4">{{ $announcement['content'] }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-eye text-muted me-1"></i>
                            <small class="text-muted">{{ number_format($announcement['views']) }} views</small>
                        </div>
                        <a href="{{ route('pengumuman.show', $announcement->id) }}" class="btn btn-sm btn-outline-primary">
    <i class="fas fa-info-circle me-1"></i> Detail
</a>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Add Announcement Modal -->
    <form action="{{ route('pengumuman.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label fw-bold">Judul Pengumuman</label>
        <input type="text" name="title" class="form-control" placeholder="Masukkan judul pengumuman" required>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label fw-bold">Kategori</label>
            <select name="type" class="form-select">
                <option value="Umum">Umum</option>
                <option value="Akademik">Akademik</option>
                <option value="Kegiatan">Kegiatan</option>
                <option value="Penting">Penting</option>
                <option value="Beasiswa">Beasiswa</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-bold">Tanggal Publikasi</label>
            <input type="date" name="publish_date" class="form-control" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Isi Pengumuman</label>
        <textarea name="content" class="form-control" rows="5" placeholder="Tulis isi pengumuman di sini..." required></textarea>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="important" class="form-check-input" id="importantCheck" value="1">
        <label class="form-check-label" for="importantCheck">Tandai sebagai pengumuman penting</label>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-gradient">Simpan Pengumuman</button>
    </div>
</form>

@endsection