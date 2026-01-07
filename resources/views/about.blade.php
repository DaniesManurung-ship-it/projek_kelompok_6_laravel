@extends('layouts.app')

@section('title', 'About Us')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-light rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Welcome to <span class="text-primary">SchoolPro</span></h1>
                        <p class="lead mb-4">Discover the world of possibility with UniCamp!</p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-primary fs-6 p-3">FALL 2026 APPLICATIONS ARE NOW OPEN</span>
                            <a href="#" class="btn btn-gradient btn-lg">Admissions</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-university fa-10x text-primary opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="bg-gradient-1 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-bullseye fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold">Our Mission</h3>
                    </div>
                    <p class="text-muted">
                        Our community is being called to reimagine the future. As the only university where a 
                        renowned design school comes together with premier colleges, we are making learning 
                        more relevant and transformational.
                    </p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Quality education for all</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Innovative teaching methods</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Future-ready curriculum</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i>Global perspective</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="bg-gradient-2 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-eye fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold">Our Vision</h3>
                    </div>
                    <p class="text-muted">
                        To become a world-class educational institution that nurtures talent, fosters innovation, 
                        and prepares students to become leaders in their chosen fields, contributing positively 
                        to society and the global community.
                    </p>
                    <div class="mt-4">
                        <h5 class="fw-bold">Core Values</h5>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary p-2">Excellence</span>
                            <span class="badge bg-success bg-opacity-10 text-success p-2">Integrity</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning p-2">Innovation</span>
                            <span class="badge bg-info bg-opacity-10 text-info p-2">Collaboration</span>
                            <span class="badge bg-danger bg-opacity-10 text-danger p-2">Diversity</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-dark text-white rounded p-5">
                <div class="row text-center">
                    <div class="col-md-3 mb-4">
                        <h1 class="fw-bold display-4">15K+</h1>
                        <p class="mb-0">Students</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h1 class="fw-bold display-4">2K+</h1>
                        <p class="mb-0">Teachers</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h1 class="fw-bold display-4">50+</h1>
                        <p class="mb-0">Courses</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h1 class="fw-bold display-4">95%</h1>
                        <p class="mb-0">Success Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News & Updates -->
    <div class="row">
        <div class="col">
            <h2 class="fw-bold mb-4">News & Updates</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="badge bg-primary">ALUMNI</span>
                                <span class="badge bg-success">RESEARCH</span>
                            </div>
                            @foreach ($news as $item)
<div class="col-md-4 mb-4">
    <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
            <span class="badge bg-primary mb-2">{{ $item->category }}</span>

            <h5 class="fw-bold mb-3">{{ $item->title }}</h5>

            <p class="text-muted">
                {{ Str::limit($item->content, 100) }}
            </p>

            <div class="mt-3">
                <small class="text-muted">
                    {{ $item->created_at?->format('d M Y') ?? 'Date not available' }}
                </small>
            </div>
        </div>
    </div>
</div>
@endforeach
                            <p class="text-muted">Recent research shows significant findings in autism spectrum disorders across different populations.</p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="bg-light rounded-circle p-2 me-3">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Danies Manurung</p>
                                    <small class="text-muted">Jan 07, 2026</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="badge bg-warning">STUDENT LIFE</span>
                                <span class="badge bg-info">RESEARCH</span>
                            </div>
                            <h5 class="fw-bold mb-3">Most students say their mental health suffered in...</h5>
                            <p class="text-muted">A comprehensive study reveals the impact of modern education on student mental health.</p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="bg-light rounded-circle p-2 me-3">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Ariel Silitonga</p>
                                    <small class="text-muted">Jan 22, 2026</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="badge bg-danger">CAREER</span>
                                <span class="badge bg-success">RESEARCH</span>
                            </div>
                            <h5 class="fw-bold mb-3">Most students pleased with their digital learning</h5>
                            <p class="text-muted">Survey shows positive response to digital transformation in education.</p>
                            <div class="d-flex align-items-center mt-4">
                                <div class="bg-light rounded-circle p-2 me-3">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Obet Siahaan</p>
                                    <small class="text-muted">Feb 28, 2026</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('berita') }}" class="btn btn-outline-primary">
                    View all news <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection