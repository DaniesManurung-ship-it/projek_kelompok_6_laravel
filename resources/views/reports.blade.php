@extends('layouts.app')

@section('title', 'Reports - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Header -->
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold">School Reports</h1>
            <p class="text-muted">Analytics and insights for school performance</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="card bg-primary text-white h-100 p-3">
                <h3>85%</h3>
                <p>Overall Performance</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-success text-white h-100 p-3">
                <h3>92%</h3>
                <p>Attendance Rate</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-warning text-white h-100 p-3">
                <h3>78%</h3>
                <p>Exam Pass Rate</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-info text-white h-100 p-3">
                <h3>{{ $reports->count() }}</h3>
                <p>Reports Generated</p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Performance Chart -->
            <div class="card mb-4">
                <div class="card-header">Performance Overview</div>
                <div class="card-body">
                    <canvas id="performanceChart" style="height:300px;"></canvas>
                </div>
            </div>

            <!-- Recent Reports Table -->
            <div class="card">
                <div class="card-header">Recent Reports</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Report Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $report)
                                <tr>
                                    <td>{{ $report->title }}</td>
                                    <td>{{ $report->type }}</td>
                                    <td>{{ $report->report_date->format('d M Y') }}</td>
                                    <td>{{ $report->status }}</td>
                                    <td>
                                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada laporan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Generate Report -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5>Generate New Report</h5>
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="title" class="form-control" placeholder="Report Name" required>
                        </div>
                        <div class="mb-2">
                            <select name="type" class="form-select" required>
                                <option value="Academic">Academic Performance</option>
                                <option value="Attendance">Attendance</option>
                                <option value="Financial">Financial Summary</option>
                                <option value="Staff">Staff Evaluation</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <input type="date" name="report_date" class="form-control" required>
                        </div>
                        <input type="hidden" name="status" value="Pending">
                        <button type="submit" class="btn btn-primary w-100">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('performanceChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [
            {
                label: 'Academic Performance',
                data: [78,82,80,85,83,88,86,90,87,92,89,95],
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79,70,229,0.1)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Attendance Rate',
                data: [85,87,86,89,88,90,89,92,91,93,92,94],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16,185,129,0.1)',
                fill: true,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive:true,
        scales:{ y:{ min:70, max:100, ticks:{callback: v => v+'%'} } }
    }
});
</script>
@endsection
