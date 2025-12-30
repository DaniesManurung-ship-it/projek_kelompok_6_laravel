@extends('layouts.app')

@section('title', 'Schedule - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">School Schedule</h1>
                    <p class="text-muted">Manage and view school schedules, classes, and events</p>
                </div>
                <div class="bg-gradient-1 text-white p-3 rounded-circle">
                    <i class="fas fa-calendar-alt fa-2x"></i>
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
                        <h3 class="fw-bold">45</h3>
                        <p class="mb-0">Classes Today</p>
                    </div>
                    <i class="fas fa-chalkboard-teacher fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 5 from yesterday</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">12</h3>
                        <p class="mb-0">Exams Scheduled</p>
                    </div>
                    <i class="fas fa-file-alt fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Next: Tomorrow</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-3 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">8</h3>
                        <p class="mb-0">Events This Week</p>
                    </div>
                    <i class="fas fa-calendar-check fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">3 Upcoming</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-4 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">92%</h3>
                        <p class="mb-0">Attendance Rate</p>
                    </div>
                    <i class="fas fa-user-check fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 2% from last week</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Today's Schedule -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-calendar-day me-2 text-primary"></i>Today's Schedule
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Schedule Item 1 -->
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3 card-hover">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <span class="fw-bold">08:00</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Mathematics - Grade 10</h6>
                                    <small class="text-muted">Room 201 | Mr. Johnson</small>
                                </div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <span class="badge bg-success">In Progress</span>
                        </div>
                    </div>
                    
                    <!-- Schedule Item 2 -->
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3 card-hover">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <span class="fw-bold">10:30</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Science Lab - Grade 11</h6>
                                    <small class="text-muted">Lab 3 | Dr. Smith</small>
                                </div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <span class="badge bg-warning">Upcoming</span>
                        </div>
                    </div>
                    
                    <!-- Schedule Item 3 -->
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded card-hover">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <span class="fw-bold">14:00</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">English Literature</h6>
                                    <small class="text-muted">Room 105 | Mrs. Davis</small>
                                </div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <span class="badge bg-light text-dark">Scheduled</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Weekly Calendar -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-calendar-week me-2 text-primary"></i>Weekly Calendar
                    </h5>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 200px; width: 100%;">
                        <canvas id="scheduleChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- Upcoming Events -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-bullhorn me-2 text-warning"></i>Upcoming Events
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">Parent-Teacher Meeting</h6>
                                <small class="text-muted">Tomorrow</small>
                            </div>
                            <small class="text-muted">14:00 - 16:00 | Auditorium</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">Science Fair</h6>
                                <small class="text-muted">Dec 30</small>
                            </div>
                            <small class="text-muted">09:00 - 15:00 | Science Block</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">Sports Day</h6>
                                <small class="text-muted">Jan 5</small>
                            </div>
                            <small class="text-muted">08:00 - 17:00 | School Field</small>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Quick Actions</h6>
                    <div class="row g-2">
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100 py-2">
                                <i class="fas fa-plus me-2"></i>Add Class
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-edit me-2"></i>Edit Schedule
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-info w-100 py-2">
                                <i class="fas fa-print me-2"></i>Print
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-warning w-100 py-2">
                                <i class="fas fa-share me-2"></i>Share
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Schedule Chart
        const scheduleCtx = document.getElementById('scheduleChart').getContext('2d');
        const scheduleChart = new Chart(scheduleCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'Classes',
                    data: [12, 14, 10, 13, 11, 3],
                    backgroundColor: '#4f46e5',
                    borderColor: '#4f46e5',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Classes'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
@endsection