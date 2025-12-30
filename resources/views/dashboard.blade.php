@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">Welcome, {{ Auth::user()->name }}</h1>
                    <p class="text-muted">Education is the passport to the future, So Learn more & more</p>
                </div>
                <div class="bg-gradient-1 text-white p-3 rounded-circle">
                    <i class="fas fa-graduation-cap fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-card bg-gradient-1 card-hover">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">15.00K</h3>
                        <p class="mb-0">Students</p>
                    </div>
                    <i class="fas fa-users fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75">↑ 12% from last month</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card bg-gradient-2 card-hover">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">2.00K</h3>
                        <p class="mb-0">Teachers</p>
                    </div>
                    <i class="fas fa-chalkboard-teacher fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75">↑ 8% from last month</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card bg-gradient-3 card-hover">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">5.6K</h3>
                        <p class="mb-0">Parents</p>
                    </div>
                    <i class="fas fa-user-friends fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75">↑ 15% from last month</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card bg-gradient-4 card-hover">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">$19.3K</h3>
                        <p class="mb-0">Earnings</p>
                    </div>
                    <i class="fas fa-dollar-sign fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75">↑ 23% from last month</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-8">
            <!-- Active Courses -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-play-circle me-2 text-primary"></i>Active Courses
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Course 1 -->
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3 card-hover">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold">Learn UI/UX with ZHF Design Studio</h6>
                            <div class="d-flex text-muted small mb-2">
                                <span class="me-3"><i class="fas fa-video me-1"></i> 35 Tutorials</span>
                                <span><i class="fas fa-clock me-1"></i> 02:30 hours/Daily</span>
                            </div>
                            <div class="progress mb-2" style="height: 8px;">
                                <div class="progress-bar progress-bar-gradient" style="width: 65%"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-primary">65% Complete</small>
                                <small class="text-muted">Next class in 30 mins</small>
                            </div>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-palette fa-2x text-primary"></i>
                        </div>
                    </div>
                    
                    <!-- Course 2 -->
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3 card-hover">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold">Structure Expert - Making Things Look 3D</h6>
                            <div class="d-flex text-muted small mb-2">
                                <span class="me-3"><i class="fas fa-video me-1"></i> 120 Tutorials</span>
                                <span><i class="fas fa-clock me-1"></i> 02:00 hours/Daily</span>
                            </div>
                            <div class="progress mb-2" style="height: 8px;">
                                <div class="progress-bar progress-bar-gradient" style="width: 30%"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-primary">30% Complete</small>
                                <small class="text-muted">Next class in 01:44 hour</small>
                            </div>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-cube fa-2x text-success"></i>
                        </div>
                    </div>
                    
                    <!-- Course 3 -->
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded card-hover">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold">Learn Programming FAST! My Favorite Method!</h6>
                            <div class="d-flex text-muted small mb-2">
                                <span class="me-3"><i class="fas fa-video me-1"></i> 55 Tutorials</span>
                                <span><i class="fas fa-clock me-1"></i> 03:00 hours/Daily</span>
                            </div>
                            <div class="progress mb-2" style="height: 8px;">
                                <div class="progress-bar progress-bar-gradient" style="width: 8%"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-primary">8% Complete</small>
                                <small class="text-muted">Next class in 22:24 hours</small>
                            </div>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-code fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Exam Statistics -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-line me-2 text-primary"></i>Exam Grade Statistics
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="examChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4">
            <!-- Star Students -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-star me-2 text-warning"></i>Star Students
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="border-bottom">
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Marks</th>
                                    <th>Percent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Evelyn Harper</td>
                                    <td><span class="badge bg-primary">PRE:4378</span></td>
                                    <td>1185</td>
                                    <td><span class="badge bg-success">98%</span></td>
                                </tr>
                                <tr>
                                    <td>Diana Pierdy</td>
                                    <td><span class="badge bg-primary">PRE:4374</span></td>
                                    <td>1165</td>
                                    <td><span class="badge bg-success">91%</span></td>
                                </tr>
                                <tr>
                                    <td>John Millar</td>
                                    <td><span class="badge bg-primary">PRE:4317</span></td>
                                    <td>1175</td>
                                    <td><span class="badge bg-success">92%</span></td>
                                </tr>
                                <tr>
                                    <td>Miles Esther</td>
                                    <td><span class="badge bg-primary">PRE:45371</span></td>
                                    <td>1180</td>
                                    <td><span class="badge bg-success">93%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-4">
                            <div class="p-3 bg-light rounded">
                                <h3 class="fw-bold text-primary">100+</h3>
                                <p class="text-muted mb-0">Total Courses</p>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="p-3 bg-light rounded">
                                <h3 class="fw-bold text-success">245+</h3>
                                <p class="text-muted mb-0">Hours Spend</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded">
                                <h3 class="fw-bold text-warning">5</h3>
                                <p class="text-muted mb-0">Achievements</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded">
                                <h3 class="fw-bold text-info">10</h3>
                                <p class="text-muted mb-0">Exams Cleared</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Exam Statistics Chart
    const ctx = document.getElementById('examChart').getContext('2d');
    const examChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Average Score',
                data: [65, 70, 75, 80, 78, 85, 82, 88, 86, 90, 87, 92],
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>
@endsection
@endsection