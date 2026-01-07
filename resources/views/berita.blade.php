@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Latest News & Updates</h1>
                        <p class="lead mb-4">Stay informed with the latest happenings at our school</p>
                        <div class="d-flex gap-2">
                            <a href="#subscribe" class="btn btn-light">
                                <i class="fas fa-bell me-2"></i>Subscribe to Newsletter
                            </a>
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-light">
                                <i class="fas fa-cog me-2"></i>Manage News
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-newspaper fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured News -->
    @if($featured)
    <div class="row mb-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div style="height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" 
                             class="d-flex align-items-center justify-content-center">
                            <div class="text-center text-white p-5">
                                <h2 class="fw-bold mb-3">FEATURED STORY</h2>
                                <i class="fas fa-star fa-4x mb-3"></i>
                                <p>{{ $featured->judul }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body p-5">
                            <span class="badge bg-danger mb-3">BREAKING NEWS</span>
                            <h2 class="fw-bold mb-3">{{ $featured->judul }}</h2>
                            <p class="text-muted mb-4">
                                {{ Str::limit($featured->konten, 200) }}
                            </p>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light rounded-circle p-2 me-3">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">{{ $featured->penulis }}</p>
                                    <small class="text-muted">
                                        {{ $featured->created_at->format('d M Y') }} | 
                                        {{ number_format($featured->dilihat) }} views
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('berita.show', $featured->slug) }}" class="btn btn-gradient">
                                    Read Full Story <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- News Grid -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Recent News</h3>
                <div class="btn-group">
                    <button class="btn btn-outline-primary active">All</button>
                    @foreach(['Academic', 'Events', 'Sports', 'Achievements'] as $category)
                    <button class="btn btn-outline-primary">{{ $category }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @php
            $icons = [
                'Academic' => 'flask',
                'Sports' => 'running',
                'Events' => 'music',
                'Achievements' => 'trophy'
            ];
            
            $colors = [
                'Academic' => 'primary',
                'Sports' => 'success',
                'Events' => 'warning',
                'Achievements' => 'danger'
            ];
        @endphp
        
        @foreach ($berita as $item)
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-img-top" style="height: 150px; background: linear-gradient(135deg, var(--bs-{{ $colors[$item->kategori] ?? 'primary' }}) 0%, #764ba2 100%);">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fas fa-{{ $icons[$item->kategori] ?? 'newspaper' }} fa-3x text-white opacity-50"></i>
                    </div>
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-white text-dark">{{ $item->kategori }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">{{ $item->judul }}</h6>
                    <p class="text-muted small">{{ Str::limit($item->konten, 80) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted">
                            <i class="far fa-clock me-1"></i> {{ $item->created_at->format('d M Y') }}
                        </small>
                        <small class="text-muted">
                            <i class="fas fa-eye me-1"></i> {{ number_format($item->dilihat) }}
                        </small>
                    </div>
                    <a href="{{ route('berita.show', $item->slug) }}" 
                       class="btn btn-outline-primary btn-sm w-100 mt-3">
                        Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="Page navigation">
                {{ $berita->links() }}
            </nav>
        </div>
    </div>

    <!-- Newsletter Subscription -->
    <div class="row mt-5" id="subscribe">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <i class="fas fa-envelope-open-text fa-4x text-primary mb-4"></i>
                    <h3 class="fw-bold mb-3">Subscribe to Our Newsletter</h3>
                    <p class="text-muted mb-4">Get the latest news and updates directly in your inbox</p>
                    <form class="row g-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email address">
                                <button class="btn btn-gradient" type="submit">
                                    Subscribe
                                </button>
                            </div>
                            <small class="text-muted">We respect your privacy. Unsubscribe at any time.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection