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
                        <a href="#subscribe" class="btn btn-light">
                            <i class="fas fa-bell me-2"></i>Subscribe to Newsletter
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-newspaper fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured News -->
    <div class="row mb-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div style="height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" class="d-flex align-items-center justify-content-center">
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
                            <h2 class="fw-bold mb-3">Our Students Win Gold at International Math Olympiad</h2>
                            <p class="text-muted mb-4">
                                Team SchoolPro brings home 3 gold medals from the International Mathematics Olympiad 
                                held in Tokyo, Japan. This marks our best performance in the competition's history.
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
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary">
                                    <i class="far fa-thumbs-up me-2"></i>Like
                                </button>
                                <button class="btn btn-outline-success">
                                    <i class="fas fa-share me-2"></i>Share
                                </button>
                                <button class="btn btn-gradient">
                                    Read Full Story <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Recent News</h3>
                <div class="btn-group">
                    <button class="btn btn-outline-primary active">All</button>
                    <button class="btn btn-outline-primary">Academic</button>
                    <button class="btn btn-outline-primary">Events</button>
                    <button class="btn btn-outline-primary">Sports</button>
                    <button class="btn btn-outline-primary">Achievements</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @php
            $news = [
                ['title' => 'New STEM Lab Inauguration', 'desc' => 'State-of-the-art laboratory equipped with latest technology for science education', 'category' => 'Academic', 'date' => '2024-05-20', 'views' => 1245, 'image' => 'lab'],
                ['title' => 'Annual Sports Day Results', 'desc' => 'Green House emerges as overall champion in inter-house sports competition', 'category' => 'Sports', 'date' => '2024-05-18', 'views' => 892, 'image' => 'sports'],
                ['title' => 'Teacher Training Workshop', 'desc' => 'Professional development program for teachers on innovative teaching methods', 'category' => 'Academic', 'date' => '2024-05-15', 'views' => 543, 'image' => 'workshop'],
                ['title' => 'Cultural Festival 2024', 'desc' => 'Celebration of diversity with performances from different cultures', 'category' => 'Events', 'date' => '2024-05-12', 'views' => 1567, 'image' => 'culture'],
                ['title' => 'Debate Competition Winners', 'desc' => 'Our debate team wins regional championship, qualifies for nationals', 'category' => 'Achievements', 'date' => '2024-05-10', 'views' => 678, 'image' => 'debate'],
                ['title' => 'Environmental Awareness Campaign', 'desc' => 'Tree plantation drive and recycling initiative by eco-club', 'category' => 'Events', 'date' => '2024-05-08', 'views' => 432, 'image' => 'environment'],
                ['title' => 'Robotics Club Achievement', 'desc' => 'First prize in national robotics competition with autonomous robot', 'category' => 'Achievements', 'date' => '2024-05-05', 'views' => 987, 'image' => 'robotics'],
                ['title' => 'Parent-Teacher Meeting', 'desc' => 'Successful meeting with 95% parent participation rate', 'category' => 'Academic', 'date' => '2024-05-03', 'views' => 321, 'image' => 'meeting'],
            ];
            
            $colors = ['primary', 'success', 'warning', 'danger', 'info', 'secondary'];
            $icons = ['flask', 'running', 'chalkboard-teacher', 'music', 'trophy', 'recycle', 'robot', 'users'];
        @endphp
        
        @foreach ($news as $index => $item)
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-img-top" style="height: 150px; background: linear-gradient(135deg, var(--primary-color) 0%, #764ba2 100%);">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fas fa-{{ $icons[$index] ?? 'newspaper' }} fa-3x text-white opacity-50"></i>
                    </div>
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-white text-dark">{{ $item['category'] }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">{{ $item['title'] }}</h6>
                    <p class="text-muted small">{{ Str::limit($item['desc'], 80) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted">
                            <i class="far fa-clock me-1"></i> {{ date('d M Y', strtotime($item['date'])) }}
                        </small>
                        <small class="text-muted">
                            <i class="fas fa-eye me-1"></i> {{ number_format($item['views']) }}
                        </small>
                    </div>
                    <button class="btn btn-outline-primary btn-sm w-100 mt-3">
                        Read More <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
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

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection