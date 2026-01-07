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

    <div class="modal fade" id="editScheduleModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('schedule.update', $schedules->first()->id ?? 0) }}" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="subject" class="form-control mb-2" placeholder="Mata Pelajaran">
                    <input name="class" class="form-control mb-2" placeholder="Kelas">
                    <input name="room" class="form-control mb-2" placeholder="Ruangan">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Today's Schedule -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-clock me-2 text-primary"></i>Today's Schedule
                </div>
                <div class="card-body">
                    @forelse ($schedules as $schedule)
                        <div class="d-flex align-items-start mb-4">
                            <!-- TIME -->
                            <div class="text-center me-4" style="width:80px">
                                <span class="badge bg-primary px-3 py-2">
                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                </span>
                            </div>
                            <!-- CONTENT -->
                            <div class="flex-grow-1 bg-light rounded p-3 position-relative">
                                <h6 class="fw-bold mb-1">
                                    {{ $schedule->subject }} - {{ $schedule->class }}
                                </h6>
                                <small class="text-muted">
                                    {{ $schedule->room }} | {{ $schedule->teacher }}
                                </small>
                                <!-- DROPDOWN -->
                                <div class="dropdown position-absolute top-0 end-0 m-2">
                                    <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSchedule{{ $schedule->id }}">
                                                <i class="fas fa-edit me-2"></i>Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item text-danger" onclick="confirmDelete({{ $schedule->id }})">
                                                <i class="fas fa-trash me-2"></i>Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- FORM DELETE -->
                        <form id="delete-form-{{ $schedule->id }}" action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                        @include('schedules.edit-modal', ['schedule' => $schedule])
                    @empty
                        <p class="text-muted text-center">Belum ada jadwal hari ini</p>
                    @endforelse
                </div>
            </div>

            <!-- WEEKLY CHART -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-calendar-week me-2 text-primary"></i>Weekly Calendar
                </div>
                <div class="card-body" style="height:250px">
                    <canvas id="scheduleChart"></canvas>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-lg-4">
            <!-- UPCOMING EVENTS -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-bullhorn me-2 text-warning"></i>Upcoming Events
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <strong>Parent-Teacher Meeting</strong><br>
                        <small class="text-muted">Tomorrow • 14:00 - 16:00</small>
                    </div>
                    <div class="list-group-item">
                        <strong>Science Fair</strong><br>
                        <small class="text-muted">Dec 30 • 09:00 - 15:00</small>
                    </div>
                </div>
            </div>

            <!-- QUICK ACTION -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Quick Actions</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addSchedule">
                            <i class="fas fa-plus me-2"></i>Add Class
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD SCHEDULE MODAL -->
    <div class="modal fade" id="addSchedule" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('schedule.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Jadwal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">Mata Pelajaran</label>
                        <input name="subject" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Kelas</label>
                        <input name="class" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Ruangan</label>
                        <input name="room" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Guru</label>
                        <input name="teacher" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Mulai</label>
                            <input type="time" name="start_time" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Selesai</label>
                            <input type="time" name="end_time" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus jadwal ini? Data tidak bisa dikembalikan.')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

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