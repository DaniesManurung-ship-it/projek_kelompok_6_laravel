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
                <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#addAnnouncement">
                    <i class="fas fa-plus me-2"></i>Tambah Pengumuman
                </button>
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
                        <h4 class="fw-bold mb-2">PENTING: Jadwal Ujian Semester Genap 2024</h4>
                        <p class="mb-2">Ujian semester genap akan dilaksanakan tanggal 3-15 Juni 2024. Silakan cek jadwal lengkap di portal akademik.</p>
                        <small><i class="far fa-clock me-1"></i> Diposting: 25 Mei 2024 | <i class="fas fa-eye me-1 ms-2"></i> 1,245 views</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcements List -->
    <div class="row">
        @php
            $announcements = [
                ['title' => 'Penerimaan Siswa Baru TP 2024/2025', 'content' => 'Pendaftaran dibuka mulai 1 Juni - 30 Juni 2024. Syarat dan ketentuan dapat dilihat di website.', 'type' => 'Admission', 'date' => '2024-05-20', 'views' => 892, 'important' => true],
                ['title' => 'Libur Hari Raya Idul Fitri 1445 H', 'content' => 'Sekolah akan diliburkan tanggal 8-12 April 2024. Kegiatan belajar mengajar akan kembali normal tanggal 15 April 2024.', 'type' => 'Holiday', 'date' => '2024-04-01', 'views' => 754, 'important' => false],
                ['title' => 'Workshop Digital Literacy untuk Guru', 'content' => 'Workshop akan diadakan pada tanggal 25 Mei 2024 pukul 09.00 - 15.00 WIB di ruang multimedia.', 'type' => 'Workshop', 'date' => '2024-05-15', 'views' => 543, 'important' => false],
                ['title' => 'Pengumuman Hasil Seleksi OSN 2024', 'content' => 'Hasil seleksi Olimpiade Sains Nasional tingkat sekolah dapat dilihat di papan pengumuman atau website sekolah.', 'type' => 'Competition', 'date' => '2024-05-10', 'views' => 1,203, 'important' => true],
                ['title' => 'Perubahan Jadwal Ekstrakurikuler', 'content' => 'Ada perubahan jadwal untuk ekstrakurikuler basket dan paduan suara. Silakan cek jadwal terbaru.', 'type' => 'Schedule', 'date' => '2024-05-05', 'views' => 432, 'important' => false],
                ['title' => 'Sosialisasi Program Beasiswa', 'content' => 'Akan diadakan sosialisasi program beasiswa untuk siswa berprestasi pada tanggal 30 Mei 2024.', 'type' => 'Scholarship', 'date' => '2024-05-03', 'views' => 678, 'important' => false],
                ['title' => 'Pemeliharaan Sistem IT', 'content' => 'Akan dilakukan pemeliharaan sistem IT pada tanggal 28 Mei 2024 pukul 00.00 - 05.00 WIB. Sistem mungkin tidak dapat diakses.', 'type' => 'Maintenance', 'date' => '2024-05-25', 'views' => 321, 'important' => false],
                ['title' => 'Kegiatan Bakti Sosial', 'content' => 'Siswa diundang untuk berpartisipasi dalam kegiatan bakti sosial di panti asuhan pada tanggal 1 Juni 2024.', 'type' => 'Event', 'date' => '2024-05-22', 'views' => 456, 'important' => false],
            ];
        @endphp
        
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
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-info-circle me-1"></i> Detail
                        </button>
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
<div class="modal fade" id="addAnnouncement" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Pengumuman Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Pengumuman</label>
                        <input type="text" class="form-control" placeholder="Masukkan judul pengumuman">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kategori</label>
                            <select class="form-select">
                                <option selected>Umum</option>
                                <option>Akademik</option>
                                <option>Kegiatan</option>
                                <option>Penting</option>
                                <option>Beasiswa</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Publikasi</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Isi Pengumuman</label>
                        <textarea class="form-control" rows="5" placeholder="Tulis isi pengumuman di sini..."></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="importantCheck">
                        <label class="form-check-label" for="importantCheck">Tandai sebagai pengumuman penting</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-gradient">Simpan Pengumuman</button>
            </div>
        </div>
    </div>
</div>
@endsection