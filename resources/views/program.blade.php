@extends('layouts.app')

@section('title', 'Program Sekolah')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Academic Programs & Curriculum</h1>
                        <p class="lead mb-4">Comprehensive educational programs designed to nurture future leaders and innovators</p>
                        <a href="#enroll" class="btn btn-light btn-lg fw-bold">
                            <i class="fas fa-file-signature me-2"></i>Enroll Now
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-book-open fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Program Categories -->
    <div class="row mb-5">
        <div class="col">
            <h2 class="fw-bold mb-4 text-center">Program Categories</h2>
            <div class="row">
                @php
                    $categories = [
                        ['title' => 'STEM Program', 'icon' => 'fas fa-atom', 'count' => 12, 'color' => 'primary'],
                        ['title' => 'Language Arts', 'icon' => 'fas fa-language', 'count' => 8, 'color' => 'success'],
                        ['title' => 'Social Sciences', 'icon' => 'fas fa-globe-asia', 'count' => 10, 'color' => 'warning'],
                        ['title' => 'Arts & Music', 'icon' => 'fas fa-palette', 'count' => 15, 'color' => 'danger'],
                        ['title' => 'Sports & Health', 'icon' => 'fas fa-running', 'count' => 7, 'color' => 'info'],
                        ['title' => 'Technology', 'icon' => 'fas fa-laptop-code', 'count' => 14, 'color' => 'secondary'],
                    ];
                @endphp
                
                @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4 text-center">
                            <div class="bg-{{ $category['color'] }} bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                <i class="{{ $category['icon'] }} fa-3x text-{{ $category['color'] }}"></i>
                            </div>
                            <h4 class="fw-bold mb-2">{{ $category['title'] }}</h4>
                            <p class="text-muted">{{ $category['count'] }} Programs Available</p>
                            <a href="#" class="btn btn-outline-{{ $category['color'] }}">Explore Programs</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Featured Programs -->
<div class="row mb-5">
    <div class="col">
        <h2 class="fw-bold mb-4">Featured Programs</h2>
        <div class="row">
            @foreach ($programs as $program)
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm card-hover h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="fw-bold">{{ $program->title }}</h5>
                            <span class="badge bg-{{ $program->seats == 'Limited' ? 'danger' : 'success' }}">
                                {{ $program->seats }} Seats
                            </span>
                        </div>
                        <p class="text-muted mb-4">{{ $program->desc }}</p>
                        <div class="row">
                            <div class="col">
                                <small class="text-muted">Duration</small>
                                <p class="fw-bold mb-0">{{ $program->duration }}</p>
                            </div>
                            <div class="col">
                                <small class="text-muted">Level</small>
                                <p class="fw-bold mb-0">{{ $program->level }}</p>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('program.show', $program->id) }}" class="btn btn-outline-primary">Program Details</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


    <!-- Curriculum Structure -->
    <div class="row" id="enroll">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="fw-bold mb-0">
                        <i class="fas fa-layer-group me-2 text-primary"></i>Curriculum Structure
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="text-center p-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                    <i class="fas fa-child fa-3x text-primary"></i>
                                </div>
                                <h5 class="fw-bold">Elementary School</h5>
                                <p class="text-muted">Grade 1-6</p>
                                <ul class="list-unstyled text-start">
                                    <li><i class="fas fa-check text-success me-2"></i>Basic Literacy & Numeracy</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Social Skills Development</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Creative Arts</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="text-center p-4">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                    <i class="fas fa-user-graduate fa-3x text-success"></i>
                                </div>
                                <h5 class="fw-bold">Middle School</h5>
                                <p class="text-muted">Grade 7-9</p>
                                <ul class="list-unstyled text-start">
                                    <li><i class="fas fa-check text-success me-2"></i>Core Subject Specialization</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Project-Based Learning</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Career Exploration</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="text-center p-4">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                    <i class="fas fa-university fa-3x text-warning"></i>
                                </div>
                                <h5 class="fw-bold">High School</h5>
                                <p class="text-muted">Grade 10-12</p>
                                <ul class="list-unstyled text-start">
                                    <li><i class="fas fa-check text-success me-2"></i>Advanced Placement Courses</li>
                                    <li><i class="fas fa-check text-success me-2"></i>College Preparation</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Leadership Development</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enrollment Form -->
    <form action="{{ route('program.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Program Title</label>
            <input type="text" name="title" class="form-control" placeholder="Program Title" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Duration</label>
            <input type="text" name="duration" class="form-control" placeholder="Duration" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Description</label>
        <textarea name="desc" class="form-control" placeholder="Program Description" required></textarea>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Level</label>
            <input type="text" name="level" class="form-control" placeholder="Level" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Seats</label>
            <input type="text" name="seats" class="form-control" placeholder="Seats" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category" required>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-gradient btn-lg px-5">
            <i class="fas fa-plus me-2"></i>Add Program
        </button>
    </div>
</form>

@endsection