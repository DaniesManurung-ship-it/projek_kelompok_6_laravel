@extends('layouts.app')

@section('title', 'Reports - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">School Reports</h1>
                    <p class="text-muted">Analytics and insights for school performance</p>
                </div>
                <div class="bg-gradient-2 text-white p-3 rounded-circle">
                    <i class="fas fa-chart-bar fa-2x"></i>
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
                        <h3 class="fw-bold">85%</h3>
                        <p class="mb-0">Overall Performance</p>
                    </div>
                    <i class="fas fa-chart-line fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 3.2% from last term</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">92%</h3>
                        <p class="mb-0">Attendance Rate</p>
                    </div>
                    <i class="fas fa-user-check fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 1.8% from last month</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-3 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">78%</h3>
                        <p class="mb-0">Exam Pass Rate</p>
                    </div>
                    <i class="fas fa-graduation-cap fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 5% from last exam</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-4 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">245</h3>
                        <p class="mb-0">Reports Generated</p>
                    </div>
                    <i class="fas fa-file-alt fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">This month</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Performance Overview -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-area me-2 text-primary"></i>Performance Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 300px; width: 100%;">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Recent Reports -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-history me-2 text-primary"></i>Recent Reports
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="border-bottom">
                                    <th>Report Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">Term 3 Final Report</td>
                                    <td><span class="badge bg-primary">Academic</span></td>
                                    <td>Dec 28, 2024</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Attendance Summary</td>
                                    <td><span class="badge bg-info">Attendance</span></td>
                                    <td>Dec 27, 2024</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Financial Report Q4</td>
                                    <td><span class="badge bg-warning">Financial</span></td>
                                    <td>Dec 26, 2024</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                            <i class="fas fa-clock"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Teacher Performance</td>
                                    <td><span class="badge bg-danger">Staff</span></td>
                                    <td>Dec 25, 2024</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-download"></i>
                                        </button>
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
            <!-- Quick Stats -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-tachometer-alt me-2 text-success"></i>Quick Stats
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="fw-bold mb-2">Top Performing Classes</h6>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-success" style="width: 95%">Grade 12A</div>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-primary" style="width: 88%">Grade 11B</div>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-info" style="width: 82%">Grade 10C</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="fw-bold mb-2">Subject Performance</h6>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Mathematics</span>
                            <span class="fw-bold">92%</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Science</span>
                            <span class="fw-bold">88%</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>English</span>
                            <span class="fw-bold">85%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Generate Report -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Generate New Report</h6>
                    <div class="mb-3">
                        <label class="form-label">Report Type</label>
                        <select class="form-select">
                            <option>Academic Performance</option>
                            <option>Attendance Report</option>
                            <option>Financial Summary</option>
                            <option>Staff Evaluation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" class="form-control" placeholder="Select date range">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Format</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="format" id="pdf" checked>
                            <label class="form-check-label" for="pdf">PDF</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="format" id="excel">
                            <label class="form-check-label" for="excel">Excel</label>
                        </div>
                    </div>
                    <button class="btn btn-gradient w-100">
                        <i class="fas fa-file-export me-2"></i>Generate Report
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Performance Chart
        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(performanceCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Academic Performance',
                        data: [78, 82, 80, 85, 83, 88, 86, 90, 87, 92, 89, 95],
                        borderColor: '#4f46e5',
                        backgroundColor: 'rgba(79, 70, 229, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Attendance Rate',
                        data: [85, 87, 86, 89, 88, 90, 89, 92, 91, 93, 92, 94],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 70,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
@endsection