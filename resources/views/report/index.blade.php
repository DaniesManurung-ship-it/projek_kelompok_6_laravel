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
                <div class="d-flex gap-2">
                    <div class="bg-gradient-2 text-white p-3 rounded-circle">
                        <i class="fas fa-chart-bar fa-2x"></i>
                    </div>
                    <a href="{{ route('report.create') }}" class="btn btn-primary align-self-center">
                        <i class="fas fa-plus me-2"></i>Tambah Laporan
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
                        <h3 class="fw-bold">{{ $reports->count() }}</h3>
                        <p class="mb-0">Total Laporan</p>
                    </div>
                    <i class="fas fa-file-alt fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Semua laporan</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">{{ $publishedCount }}</h3>
                        <p class="mb-0">Published</p>
                    </div>
                    <i class="fas fa-check-circle fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Laporan terpublikasi</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-3 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">{{ $pendingCount }}</h3>
                        <p class="mb-0">Pending</p>
                    </div>
                    <i class="fas fa-clock fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Menunggu publikasi</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-4 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">{{ $academicCount }}</h3>
                        <p class="mb-0">Academic</p>
                    </div>
                    <i class="fas fa-graduation-cap fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">Laporan akademik</small>
            </div>
        </div>
    </div>

    <!-- Recent Reports -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">
                    <i class="fas fa-history me-2 text-primary"></i>Recent Reports
                </h5>
                <a href="{{ route('report.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>Tambah
                </a>
            </div>
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
                            <th>Format</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                        <tr>
                            <td class="fw-bold">{{ $report->title }}</td>
                            <td>
                                @php
                                    $typeColors = [
                                        'Academic' => 'primary',
                                        'Attendance' => 'info',
                                        'Financial' => 'warning',
                                        'Staff' => 'danger',
                                        'Other' => 'secondary'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $typeColors[$report->type] ?? 'secondary' }}">
                                    {{ $report->type }}
                                </span>
                            </td>
                            <td>{{ $report->report_date->format('M d, Y') }}</td>
                            <td>
                                @php
                                    $statusColors = [
                                        'Published' => 'success',
                                        'Pending' => 'warning',
                                        'Draft' => 'secondary'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$report->status] ?? 'secondary' }}">
                                    {{ $report->status }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $report->format }}</span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('report.show', $report->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('report.edit', $report->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="confirmDelete({{ $report->id }}, '{{ $report->title }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form action="{{ route('report.destroy', $report->id) }}" 
                                          method="POST" 
                                          id="delete-form-{{ $report->id }}"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-file-alt fa-2x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada laporan tersedia</p>
                                <a href="{{ route('report.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Tambah Laporan Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-pie me-2 text-success"></i>Report Types Distribution
                    </h5>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 200px; width: 100%;">
                        <canvas id="typeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-calendar-alt me-2 text-info"></i>Monthly Reports
                    </h5>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 200px; width: 100%;">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>
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

        // Type Distribution Chart
        const typeCtx = document.getElementById('typeChart').getContext('2d');
        const typeChart = new Chart(typeCtx, {
            type: 'doughnut',
            data: {
                labels: ['Academic', 'Attendance', 'Financial', 'Staff', 'Other'],
                datasets: [{
                    data: [
                        {{ $reports->where('type', 'Academic')->count() }},
                        {{ $reports->where('type', 'Attendance')->count() }},
                        {{ $reports->where('type', 'Financial')->count() }},
                        {{ $reports->where('type', 'Staff')->count() }},
                        {{ $reports->where('type', 'Other')->count() }}
                    ],
                    backgroundColor: [
                        '#4f46e5',
                        '#0ea5e9',
                        '#f59e0b',
                        '#ef4444',
                        '#6b7280'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Monthly Reports Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        const monthlyChart = new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Reports Generated',
                    data: [5, 8, 6, 10, 7, 12, 9, 11, 8, 10, 7, 9],
                    backgroundColor: '#10b981'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 2
                        }
                    }
                }
            }
        });
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
        if (confirm(`Yakin ingin menghapus laporan "${title}"?`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
@endsection
@endsection