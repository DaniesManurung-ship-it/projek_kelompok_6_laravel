@extends('layouts.app')

@section('title', 'Documents - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">School Documents</h1>
                    <p class="text-muted">Manage and organize school documents and files</p>
                </div>
                <div class="bg-gradient-3 text-white p-3 rounded-circle">
                    <i class="fas fa-folder fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 g-md-4 mb-4">
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-1 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">1.2K</h3>
                        <p class="mb-0">Total Files</p>
                    </div>
                    <i class="fas fa-file fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 45 this month</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">485 MB</h3>
                        <p class="mb-0">Storage Used</p>
                    </div>
                    <i class="fas fa-database fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">65% of total</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-3 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">12</h3>
                        <p class="mb-0">Shared Folders</p>
                    </div>
                    <i class="fas fa-share-alt fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">3 new this week</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-4 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">28</h3>
                        <p class="mb-0">Recent Uploads</p>
                    </div>
                    <i class="fas fa-upload fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Today</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Document Categories -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-folder-open me-2 text-primary"></i>Document Categories
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Category 1 -->
                        <div class="col-md-4">
                            <div class="card card-hover border-0 bg-light">
                                <div class="card-body text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-graduation-cap fa-2x"></i>
                                    </div>
                                    <h6 class="fw-bold mb-1">Academic</h6>
                                    <p class="text-muted small mb-2">Syllabus, Notes, Papers</p>
                                    <span class="badge bg-primary">324 files</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Category 2 -->
                        <div class="col-md-4">
                            <div class="card card-hover border-0 bg-light">
                                <div class="card-body text-center">
                                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                    <h6 class="fw-bold mb-1">Administrative</h6>
                                    <p class="text-muted small mb-2">Forms, Policies, Records</p>
                                    <span class="badge bg-success">187 files</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Category 3 -->
                        <div class="col-md-4">
                            <div class="card card-hover border-0 bg-light">
                                <div class="card-body text-center">
                                    <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-money-bill-wave fa-2x"></i>
                                    </div>
                                    <h6 class="fw-bold mb-1">Financial</h6>
                                    <p class="text-muted small mb-2">Budgets, Fees, Reports</p>
                                    <span class="badge bg-warning">92 files</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Documents -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-history me-2 text-primary"></i>Recent Documents
                        </h5>
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-upload me-1"></i>Upload New
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="border-bottom">
                                    <th>Document Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Last Modified</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-pdf text-danger me-2"></i>
                                            <span class="fw-bold">Term_3_Report.pdf</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger">PDF</span></td>
                                    <td>2.4 MB</td>
                                    <td>2 hours ago</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-outline-info">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-excel text-success me-2"></i>
                                            <span class="fw-bold">Student_List.xlsx</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Excel</span></td>
                                    <td>1.8 MB</td>
                                    <td>Yesterday</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-outline-info">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-word text-primary me-2"></i>
                                            <span class="fw-bold">Academic_Calendar.docx</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary">Word</span></td>
                                    <td>3.1 MB</td>
                                    <td>2 days ago</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-outline-info">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-image text-info me-2"></i>
                                            <span class="fw-bold">School_Map.png</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info">Image</span></td>
                                    <td>4.2 MB</td>
                                    <td>1 week ago</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn btn-outline-info">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- Storage Usage -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-hdd me-2 text-warning"></i>Storage Usage
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-bold">Total Storage</span>
                            <span class="fw-bold">750 MB / 1 GB</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-success" style="width: 65%"></div>
                            <div class="progress-bar bg-warning" style="width: 10%"></div>
                            <div class="progress-bar bg-danger" style="width: 5%"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small class="text-success">Available: 250 MB</small>
                            <small class="text-danger">Limit: 1 GB</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="fw-bold mb-2">Usage by Type</h6>
                        <div class="d-flex justify-content-between mb-1">
                            <span>PDF Documents</span>
                            <span class="fw-bold">320 MB</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Images</span>
                            <span class="fw-bold">180 MB</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Other Files</span>
                            <span class="fw-bold">250 MB</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Upload -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Quick Upload</h6>
                    <div class="mb-3">
                        <label class="form-label">Select Files</label>
                        <div class="border rounded p-4 text-center bg-light">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                            <p class="text-muted small mb-2">Drag & drop files here or</p>
                            <button class="btn btn-sm btn-outline-primary">
                                Browse Files
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Academic</option>
                            <option>Administrative</option>
                            <option>Financial</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <button class="btn btn-gradient w-100">
                        <i class="fas fa-upload me-2"></i>Upload Files
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection