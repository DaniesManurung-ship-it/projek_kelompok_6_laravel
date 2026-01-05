@extends('layouts.app')

@section('title', 'Daftar Pesan Masuk')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-4 shadow-sm">
                <h2 class="fw-bold mb-0"><i class="fas fa-inbox me-3"></i>Messages Inbox</h2>
                <p class="mb-0 opacity-75">Daftar pesan yang dikirim oleh pengunjung melalui formulir kontak.</p>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Pengirim</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $index => $msg)
                        <tr>
                            <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $msg->name }}</div>
                                <small class="text-muted">{{ $msg->email }}</small>
                                @if($msg->subscribe)
                                    <span class="badge bg-info btn-sm" style="font-size: 10px;">Subscriber</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                                    {{ $msg->subject }}
                                </span>
                            </td>
                            <td style="max-width: 300px;">
                                <p class="mb-0 text-truncate text-muted small" title="{{ $msg->message }}">
                                    {{ $msg->message }}
                                </p>
                            </td>
                            <td class="small text-muted">
                                {{ $msg->created_at->format('d M Y') }}<br>
                                {{ $msg->created_at->format('H:i') }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light border shadow-sm rounded-pill px-3">
                                    <i class="fas fa-eye text-primary me-1"></i> Detail
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-envelope-open fa-3x mb-3 opacity-25"></i>
                                <p>Belum ada pesan yang masuk.</p>
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