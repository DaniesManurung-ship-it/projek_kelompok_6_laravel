@extends('layouts.app')

@section('title', 'Akademik')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Academic Excellence</h1>
                        <p class="lead mb-4">Comprehensive academic programs, curriculum, and learning resources</p>
                        <a href="#calendar" class="btn btn-light">
                            <i class="fas fa-calendar-alt me-2"></i>Academic Calendar
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-graduation-cap fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Dashboard -->
    <div class="row mb-5">
        <div class="col">
            <h3 class="fw-bold mb-4">Academic Dashboard</h3>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm card-hover text-center">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-book-open fa-2x text-primary"></i>
                            </div>
                            <h2 class="fw-bold">45+</h2>
                            <p class="text-muted mb-0">Courses Offered</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm card-hover text-center">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-chalkboard-teacher fa-2x text-success"></i>
                            </div>
                            <h2 class="fw-bold">200+</h2>
                            <p class="text-muted mb-0">Qualified Teachers</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm card-hover text-center">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-user-graduate fa-2x text-warning"></i>
                            </div>
                            <h2 class="fw-bold">98%</h2>
                            <p class="text-muted mb-0">Pass Rate</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm card-hover text-center">
                        <div class="card-body p-4">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-university fa-2x text-danger"></i>
                            </div>
                            <h2 class="fw-bold">85%</h2>
                            <p class="text-muted mb-0">University Placement</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Curriculum & Programs -->
    <div class="row mb-5">
        <div class="col">
            <h3 class="fw-bold mb-4">Curriculum & Programs</h3>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Program</th>
                                    <th>Grade Levels</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fas fa-atom text-primary me-2"></i>
                                        <strong>STEM Program</strong>
                                    </td>
                                    <td>7-12</td>
                                    <td>Science, Technology, Engineering, Mathematics</td>
                                    <td>6 Years</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-language text-success me-2"></i>
                                        <strong>IB Diploma</strong>
                                    </td>
                                    <td>11-12</td>
                                    <td>International Baccalaureate Diploma Programme</td>
                                    <td>2 Years</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-success">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-palette text-warning me-2"></i>
                                        <strong>Arts & Humanities</strong>
                                    </td>
                                    <td>7-12</td>
                                    <td>Visual Arts, Music, Literature, History</td>
                                    <td>6 Years</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-warning">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-briefcase text-danger me-2"></i>
                                        <strong>Career & Technical</strong>
                                    </td>
                                    <td>9-12</td>
                                    <td>Business, Technology, Healthcare Pathways</td>
                                    <td>4 Years</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-danger">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-globe text-info me-2"></i>
                                        <strong>Global Studies</strong>
                                    </td>
                                    <td>10-12</td>
                                    <td>International Relations, Languages, Cultures</td>
                                    <td>3 Years</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-info">Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Exam Results -->
    <div class="row mb-5" id="calendar">
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-line me-2 text-primary"></i>Exam Results Trends
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="resultsChart" height="250"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-calendar-alt me-2 text-primary"></i>Academic Calendar 2024
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @php
                            $events = [
                                ['date' => '15 Jan', 'event' => 'First Day of Semester', 'type' => 'academic'],
                                ['date' => '10-14 Feb', 'event' => 'Mid-Term Exams', 'type' => 'exam'],
                                ['date' => '8-12 Apr', 'event' => 'Spring Break', 'type' => 'holiday'],
                                ['date' => '15-19 Apr', 'event' => 'Project Week', 'type' => 'activity'],
                                ['date' => '1 May', 'event' => 'Labor Day Holiday', 'type' => 'holiday'],
                                ['date' => '20-24 May', 'event' => 'Final Exams', 'type' => 'exam'],
                                ['date' => '7 Jun', 'event' => 'Graduation Ceremony', 'type' => 'ceremony'],
                                ['date' => '10 Jun', 'event' => 'Last Day of School', 'type' => 'academic'],
                            ];
                        @endphp
                        
                        @foreach ($events as $event)
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3 text-center" style="min-width: 60px;">
                                    <div class="fw-bold">{{ explode(' ', $event['date'])[0] }}</div>
                                    <small class="text-muted">{{ explode(' ', $event['date'])[1] }}</small>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1">{{ $event['event'] }}</h6>
                                    <span class="badge bg-{{ $event['type'] == 'exam' ? 'danger' : ($event['type'] == 'holiday' ? 'success' : 'primary') }}">
                                        {{ ucfirst($event['type']) }}
                                    </span>
                                </div> 
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            View Full Calendar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Learning Resources -->
    <div class="row">
        <div class="col">
            <h3 class="fw-bold mb-4">Learning Resources</h3>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4 text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-book fa-2x text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Digital Library</h5>
                            <p class="text-muted">Access to thousands of e-books, journals, and research papers</p>
                            <button class="btn btn-outline-primary">Access Library</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4 text-center">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-laptop-code fa-2x text-success"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Online Learning</h5>
                            <p class="text-muted">Interactive courses, video lectures, and virtual classrooms</p>
                            <button class="btn btn-outline-success">Start Learning</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <div class="card-body p-4 text-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-flask fa-2x text-warning"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Lab Resources</h5>
                            <p class="text-muted">Virtual labs, simulations, and experiment guides</p>
                            <button class="btn btn-outline-warning">Explore Labs</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Policies -->
    <div class="row mt-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h4 class="fw-bold text-center mb-4">Academic Policies & Guidelines</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-file-alt text-primary fa-2x me-3 mt-1"></i>
                                <div>
                                    <h5 class="fw-bold">Grading System</h5>
                                    <p class="text-muted">Comprehensive grading criteria and evaluation methods</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-user-check text-success fa-2x me-3 mt-1"></i>
                                <div>
                                    <h5 class="fw-bold">Attendance Policy</h5>
                                    <p class="text-muted">Requirements and procedures for attendance</p>
                                    <a href="#" class="btn btn-sm btn-outline-success">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-balance-scale text-warning fa-2x me-3 mt-1"></i>
                                <div>
                                    <h5 class="fw-bold">Code of Conduct</h5>
                                    <p class="text-muted">Academic integrity and behavioral expectations</p>
                                    <a href="#" class="btn btn-sm btn-outline-warning">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-graduation-cap text-danger fa-2x me-3 mt-1"></i>
                                <div>
                                    <h5 class="fw-bold">Graduation Requirements</h5>
                                    <p class="text-muted">Criteria for successful program completion</p>
                                    <a href="#" class="btn btn-sm btn-outline-danger">View Details</a>
                                </div>
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
    // Exam Results Chart
    const resultsCtx = document.getElementById('resultsChart').getContext('2d');
    const resultsChart = new Chart(resultsCtx, {
        type: 'bar',
        data: {
            labels: ['2020', '2021', '2022', '2023', '2024'],
            datasets: [
                {
                    label: 'Average Score',
                    data: [78, 82, 85, 88, 91],
                    backgroundColor: 'rgba(79, 70, 229, 0.7)',
                    borderColor: '#4f46e5',
                    borderWidth: 1
                },
                {
                    label: 'Pass Rate %',
                    data: [85, 88, 90, 93, 95],
                    backgroundColor: 'rgba(16, 185, 129, 0.7)',
                    borderColor: '#10b981',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
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