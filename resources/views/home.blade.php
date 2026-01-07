@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Teaching in the Internet age means we must teach tomorrow's skills today</h1>
                        <p class="lead mb-4">Provides you with the latest online learning system and material that help your education journey</p>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-light btn-lg fw-bold">
                                <i class="fas fa-chalkboard-teacher me-2"></i>Jobs as Instructor
                            </a>
                            <a href="#" class="btn btn-outline-light btn-lg fw-bold">
                                <i class="fas fa-user-graduate me-2"></i>Jobs as Student
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-graduation-cap fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Courses -->
    <div class="row mb-5">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">
                    <i class="fas fa-fire me-2 text-danger"></i>Our Most Popular Courses
                </h2>
                <a href="#" class="btn btn-outline-primary">
                    Explore All Courses <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <p class="text-muted mb-5 text-center">Let's join our best classes with our famous instructor and institutes.</p>
            
            <div class="row">
               
                
                @foreach ($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-light rounded-circle p-3 me-3">
                                    <i class="{{ $course['icon'] }} fa-2x text-{{ $course['color'] }}"></i>
                                </div>
                                <div>
                                    <span class="badge bg-{{ $course['color'] }} bg-opacity-10 text-{{ $course['color'] }} mb-2">{{ $course['category'] }}</span>
                                    <h5 class="fw-bold">{{ $course['title'] }}</h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <small class="text-muted">Instructor:</small>
                                    <p class="fw-bold mb-0">{{ $course['instructor'] }}</p>
                                </div>
                                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
    @csrf
    <button class="btn btn-outline-primary btn-sm">
        Enroll Now
    </button>
</form>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Running Courses -->
    <div class="row">
        <div class="col">
            <h3 class="fw-bold mb-4">Running Courses</h3>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2">UX Design</span>
                                    <h5 class="fw-bold">UX & Web Design Master Course A-Z</h5>
                                    <p class="text-muted mb-3">Author: Sheikh Al</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 me-3">
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" style="width: 48%"></div>
                                            </div>
                                        </div>
                                        <span class="fw-bold text-primary">48%</span>
                                    </div>
                                </div>
                                <i class="fas fa-palette fa-3x text-primary opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-success bg-opacity-10 text-success mb-2">Animation</span>
                                    <h5 class="fw-bold">Adobe After Effects Masterclass</h5>
                                    <p class="text-muted mb-3">Author: Surja Sen</p>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 me-3">
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 78%"></div>
                                            </div>
                                        </div>
                                        <span class="fw-bold text-success">78%</span>
                                    </div>
                                </div>
                                <i class="fas fa-film fa-3x text-success opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection