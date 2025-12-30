@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold">
                <i class="fas fa-images me-2 text-primary"></i>School Gallery
            </h1>
            <p class="text-muted">Capture moments, create memories - Explore our school life through photos</p>
        </div>
    </div>

    <!-- Gallery Filter -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-outline-primary active">All Photos</button>
                <button class="btn btn-outline-primary">Academic</button>
                <button class="btn btn-outline-primary">Events</button>
                <button class="btn btn-outline-primary">Sports</button>
                <button class="btn btn-outline-primary">Campus</button>
                <button class="btn btn-outline-primary">Students</button>
                <button class="btn btn-outline-primary">Teachers</button>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="row">
        @php
            $galleryItems = [
                ['title' => 'Graduation Ceremony 2024', 'category' => 'Events', 'count' => 45],
                ['title' => 'Science Fair Exhibition', 'category' => 'Academic', 'count' => 32],
                ['title' => 'Sports Day Competition', 'category' => 'Sports', 'count' => 28],
                ['title' => 'Campus Tour', 'category' => 'Campus', 'count' => 19],
                ['title' => 'Teacher\'s Day Celebration', 'category' => 'Events', 'count' => 37],
                ['title' => 'Library Inauguration', 'category' => 'Academic', 'count' => 24],
                ['title' => 'Cultural Festival', 'category' => 'Events', 'count' => 56],
                ['title' => 'Laboratory Sessions', 'category' => 'Academic', 'count' => 31],
                ['title' => 'Football Tournament', 'category' => 'Sports', 'count' => 42],
                ['title' => 'Art Exhibition', 'category' => 'Events', 'count' => 27],
                ['title' => 'Computer Lab', 'category' => 'Academic', 'count' => 18],
                ['title' => 'Annual Function', 'category' => 'Events', 'count' => 63],
            ];
        @endphp
        
        @foreach ($galleryItems as $item)
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm card-hover">
                <div class="card-img-top position-relative" style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-white text-dark">{{ $item['count'] }} photos</span>
                    </div>
                    <div class="position-absolute bottom-0 start-0 m-3">
                        <span class="badge bg-primary bg-opacity-75 text-white">{{ $item['category'] }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fas fa-camera fa-4x text-white opacity-50"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">{{ $item['title'] }}</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="far fa-calendar me-1"></i> {{ date('d M Y', strtotime('-' . rand(1, 30) . ' days')) }}
                        </small>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye me-1"></i> View
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Upload Section -->
    <div class="row mt-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <i class="fas fa-cloud-upload-alt fa-4x text-primary mb-4"></i>
                    <h4 class="fw-bold mb-3">Upload Your Photos</h4>
                    <p class="text-muted mb-4">Share your school memories with the community</p>
                    <div class="border rounded p-5 bg-light mb-4">
                        <p class="text-muted">Drag and drop photos here or</p>
                        <button class="btn btn-gradient">
                            <i class="fas fa-folder-open me-2"></i>Browse Files
                        </button>
                        <small class="d-block text-muted mt-2">Maximum file size: 5MB per photo</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection