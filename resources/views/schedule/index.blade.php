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
                <div class="d-flex gap-2">
                    <div class="bg-gradient-1 text-white p-3 rounded-circle">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <a href="{{ route('schedule.create') }}" class="btn btn-primary align-self-center">
                        <i class="fas fa-plus me-2"></i>Tambah Jadwal
                    </a>
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
                        <h3 class="fw-bold">{{ $todaySchedules->count() }}</h3>
                        <p class="mb-0">Classes Today</p>
                    </div>
                    <i class="fas fa-chalkboard-teacher fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Hari {{ date('l') }}</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">{{ $schedules->where('type', 'Exam')->count() }}</h3>
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
                        <h3 class="fw-bold">{{ $schedules->where('type', 'Event')->count() }}</h3>
                        <p class="mb-0">Events This Week</p>
                    </div>
                    <i class="fas fa-calendar-check fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">{{ $schedules->where('status', 'Upcoming')->count() }} Upcoming</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-4 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">{{ $schedules->count() }}</h3>
                        <p class="mb-0">Total Schedules</p>
                    </div>
                    <i class="fas fa-list-alt fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">All schedules</small>
            </div>
        </div>
    </div>

    <!-- Today's Schedule -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">
                    <i class="fas fa-calendar-day me-2 text-primary"></i>Today's Schedule
                </h5>
                <a href="{{ route('schedule.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            @forelse($todaySchedules as $schedule)
            <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3 card-hover">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-{{ $schedule->type == 'Class' ? 'primary' : ($schedule->type == 'Exam' ? 'danger' : 'success') }} text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                             style="width: 40px; height: 40px;">
                            <small class="fw-bold">{{ date('H:i', strtotime($schedule->start_time)) }}</small>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">{{ $schedule->title }} - {{ $schedule->class_name }}</h6>
                            <small class="text-muted">{{ $schedule->room }} | {{ $schedule->teacher }}</small>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-{{ $schedule->status == 'In Progress' ? 'success' : ($schedule->status == 'Upcoming' ? 'warning' : 'secondary') }}">
                        {{ $schedule->status }}
                    </span>
                    <div class="btn-group">
                        <a href="{{ route('schedule.show', $schedule->id) }}" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" 
                                class="btn btn-sm btn-outline-danger"
                                onclick="confirmDelete({{ $schedule->id }}, '{{ $schedule->title }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form action="{{ route('schedule.destroy', $schedule->id) }}" 
                              method="POST" 
                              id="delete-form-{{ $schedule->id }}"
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-4">
                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                <p class="text-muted">No schedules for today</p>
                <a href="{{ route('schedule.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Jadwal Pertama
                </a>
            </div>
            @endforelse
        </div>
    </div>

    <!-- All Schedules -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="fw-bold mb-0">
                <i class="fas fa-list-alt me-2 text-primary"></i>All Schedules
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Class</th>
                            <th>Teacher</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                        <tr>
                            <td>
                                <strong>{{ $schedule->title }}</strong>
                                @if($schedule->description)
                                <small class="d-block text-muted">{{ Str::limit($schedule->description, 30) }}</small>
                                @endif
                            </td>
                            <td>{{ $schedule->class_name }}</td>
                            <td>{{ $schedule->teacher }}</td>
                            <td>{{ $schedule->day }}</td>
                            <td>{{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}</td>
                            <td>{{ $schedule->room }}</td>
                            <td>
                                <span class="badge bg-{{ $schedule->type == 'Class' ? 'primary' : ($schedule->type == 'Exam' ? 'danger' : 'success') }}">
                                    {{ $schedule->type }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $schedule->status == 'In Progress' ? 'success' : ($schedule->status == 'Upcoming' ? 'warning' : 'secondary') }}">
                                    {{ $schedule->status }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('schedule.show', $schedule->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="confirmDelete({{ $schedule->id }}, '{{ $schedule->title }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <i class="fas fa-calendar-alt fa-2x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada jadwal tersedia</p>
                                <a href="{{ route('schedule.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Tambah Jadwal Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        @if(session('success'))
            showToast('{{ session("success") }}', 'success');
        @endif

        @if($errors->any())
            showToast('Terjadi kesalahan, silakan periksa form!', 'error');
        @endif
    });

    function showToast(message, type = 'success') {
        const toast = $(`
            <div class="toast align-items-center text-bg-${type} border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `);
        $('.toast-container').append(toast);
        new bootstrap.Toast(toast[0]).show();
        setTimeout(() => toast.remove(), 3000);
    }

    function confirmDelete(id, title) {
        if (confirm(`Yakin ingin menghapus jadwal "${title}"?`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
@endsection
@endsection