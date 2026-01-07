@extends('layouts.app')

@section('title', 'Messages - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">School Messages</h1>
                    <p class="text-muted">Communicate with students, parents, and staff</p>
                </div>
                <div class="bg-gradient-4 text-white p-3 rounded-circle">
                    <i class="fas fa-envelope fa-2x"></i>
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
                        <h3 class="fw-bold">{{ $messages->count() }}</h3>
                        <p class="mb-0">Total Messages</p>
                    </div>
                    <i class="fas fa-inbox fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">{{ $messages->where('is_read', false)->count() }} unread</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @php
                            $today = \Carbon\Carbon::today();
                            $messagesToday = $messages->filter(function($message) use ($today) {
                                return $message->created_at->format('Y-m-d') == $today->format('Y-m-d');
                            })->count();
                        @endphp
                        <h3 class="fw-bold">{{ $messagesToday }}</h3>
                        <p class="mb-0">New Today</p>
                    </div>
                    <i class="fas fa-envelope-open-text fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">This week</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column - Message List -->
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Inbox</h5>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#composeModal">
                            <i class="fas fa-plus me-1"></i>New Message
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">
                        @forelse($messages as $message)
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="position-relative me-3">
                                        <div class="rounded-circle bg-{{ $message->is_read ? 'secondary' : 'primary' }} d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">
                                                {{ strtoupper(substr($message->sender_name, 0, 2)) }}
                                            </span>
                                        </div>
                                        @if(!$message->is_read)
                                        <span class="position-absolute top-0 end-0 translate-middle p-1 bg-primary border border-white rounded-circle"></span>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="{{ route('messages.show', $message->id) }}" class="text-decoration-none text-dark">
                                            <h6 class="fw-bold mb-0">{{ $message->sender_name }}</h6>
                                            <small class="text-muted">{{ $message->sender_role }}</small>
                                            <p class="mb-0 mt-2 text-truncate">{{ $message->subject }}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="text-end me-3">
                                        <small class="text-muted d-block">{{ $message->created_at->format('h:i A') }}</small>
                                        <small class="text-muted">{{ $message->created_at->format('M d') }}</small>
                                    </div>
                                    <!-- TITIK TIGA DROPDOWN - SUDAH DIPERBAIKI -->
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('messages.show', $message->id) }}">
                                                    <i class="fas fa-eye me-2"></i> View Details
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{ route('messages.destroy', $message->id) }}" 
                                                      method="POST" 
                                                      id="delete-form-{{ $message->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            class="dropdown-item text-danger"
                                                            onclick="confirmDelete({{ $message->id }}, '{{ $message->sender_name }}')">
                                                        <i class="fas fa-trash me-2"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No messages yet</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Compose Modal -->
<div class="modal fade" id="composeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compose New Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Sender Name *</label>
                        <input type="text" class="form-control" name="sender_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="sender_email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role *</label>
                        <select class="form-select" name="sender_role" required>
                            <option value="">Select Role</option>
                            <option value="Student">Student</option>
                            <option value="Parent">Parent</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject *</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message *</label>
                        <textarea class="form-control" name="content" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Auto-resize textarea
        $('textarea').on('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Show success message
        @if(session('success'))
        showToast('{{ session("success") }}', 'success');
        @endif

        @if($errors->any())
        showToast('Please check the form for errors', 'error');
        @endif
    });

    function showToast(message, type = 'success') {
        const toast = $(`<div class="toast align-items-center text-bg-${type} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>`);
        $('.toast-container').append(toast);
        const bsToast = new bootstrap.Toast(toast[0]);
        bsToast.show();
        setTimeout(() => toast.remove(), 3000);
    }

    // Fungsi konfirmasi delete
    function confirmDelete(messageId, senderName) {
        if (confirm(`Apakah Anda yakin ingin menghapus pesan ini??`)) {
            document.getElementById(`delete-form-${messageId}`).submit();
        }
    }
</script>
@endsection
@endsection