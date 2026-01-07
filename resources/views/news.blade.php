@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')
<div class="container-fluid">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- HEADER -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Latest News & Updates</h1>
                        <p class="lead mb-4">Stay informed with the latest happenings at our school</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-newspaper fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FEATURED NEWS -->
    <div class="row mb-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-center"
                             style="height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="text-center text-white p-5">
                                <h2 class="fw-bold mb-3">FEATURED STORY</h2>
                                <i class="fas fa-star fa-4x mb-3"></i>
                                <p>School Wins National Science Competition</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body p-5">
                            <span class="badge bg-danger mb-3">BREAKING NEWS</span>
                            <h2 class="fw-bold mb-3">
                                Our Students Win Gold at International Math Olympiad
                            </h2>
                            <p class="text-muted mb-4">
                                Team SchoolPro brings home 3 gold medals from the International Mathematics
                                Olympiad held in Tokyo, Japan.
                            </p>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light rounded-circle p-2 me-3">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Sarah Johnson</p>
                                    <small class="text-muted">School Correspondent | 15 May 2024</small>
                                </div>
                            </div>
                            <button class="btn btn-gradient">
                                Read Full Story <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JUDUL + TOMBOL TAMBAH -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold">Recent News</h3>

                {{-- HANYA ADMIN --}}
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('news.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Berita
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <!-- LIST NEWS -->
    <div class="row">
        @forelse ($news as $item)
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $item->category }}</span>

                        <h6 class="fw-bold">{{ $item->title }}</h6>

                        <p class="text-muted small">
                            {{ Str::limit($item->desc, 80) }}
                        </p>

                        <div class="d-flex justify-content-between">
                            <small>
                                <i class="far fa-clock"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </small>
                            <small>
                                <i class="fas fa-eye"></i>
                                {{ $item->views ?? 0 }}
                            </small>
                        </div>

                        <a href="{{ route('news.show', $item->id) }}"
                           class="btn btn-outline-primary btn-sm w-100 mt-3">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                Belum ada berita
            </div>
        @endforelse
    </div>

    <!-- NEWSLETTER -->
    <div class="row mt-5" id="subscribe">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <i class="fas fa-envelope-open-text fa-4x text-primary mb-4"></i>
                    <h3 class="fw-bold mb-3">Subscribe to Our Newsletter</h3>
                    <p class="text-muted mb-4">
                        Get the latest news and updates directly in your inbox
                    </p>
                    <form class="row g-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="email" class="form-control"
                                       placeholder="Enter your email address">
                                <button class="btn btn-gradient" type="submit">
                                    Subscribe
                                </button>
                            </div>
                            <small class="text-muted">
                                We respect your privacy. Unsubscribe at any time.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
