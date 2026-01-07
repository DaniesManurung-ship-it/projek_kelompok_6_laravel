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
                <div class="bg-primary text-white p-3 rounded-circle" style="background: linear-gradient(45deg, #007bff, #6610f2);">
                    <i class="fas fa-envelope fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 g-md-4 mb-4">
        <div class="col-md-3 col-6">
            <div class="card bg-primary text-white p-3 border-0 shadow-sm" style="background: linear-gradient(45deg, #6f42c1, #a951ed);">
                <div class="d-flex justify-content-between">
                    <div><h3 class="fw-bold mb-0">{{ $stats['total'] }}</h3><p class="mb-0">Total Messages</p></div>
                    <i class="fas fa-inbox fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 mt-2 d-block">{{ $stats['unread'] }} unread</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-danger text-white p-3 border-0 shadow-sm" style="background: linear-gradient(45deg, #f06292, #f8bbd0);">
                <div class="d-flex justify-content-between">
                    <div><h3 class="fw-bold mb-0">{{ $stats['new_today'] }}</h3><p class="mb-0">New Today</p></div>
                    <i class="fas fa-envelope-open-text fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 mt-2 d-block">Fresh messages</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-info text-white p-3 border-0 shadow-sm" style="background: linear-gradient(45deg, #2196f3, #4dd0e1);">
                <div class="d-flex justify-content-between">
                    <div><h3 class="fw-bold mb-0">{{ $stats['sent'] }}</h3><p class="mb-0">Sent Messages</p></div>
                    <i class="fas fa-paper-plane fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 mt-2 d-block">This week</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card bg-success text-white p-3 border-0 shadow-sm" style="background: linear-gradient(45deg, #00bfa5, #b2dfdb);">
                <div class="d-flex justify-content-between">
                    <div><h3 class="fw-bold mb-0">92%</h3><p class="mb-0">Response Rate</p></div>
                    <i class="fas fa-reply-all fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 mt-2 d-block">↑ 3% from last month</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column - Message List -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Inbox</h5>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newMsgModal">
                        <i class="fas fa-plus me-1"></i>New Message
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">
                        @forelse($messages as $msg)
                        <a href="{{ route('messages.index', ['id' => $msg->id]) }}" 
                           class="list-group-item list-group-item-action border-0 py-3 {{ ($selectedMessage && $selectedMessage->id == $msg->id) ? 'active' : '' }}">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <div class="rounded-circle bg-{{ $msg->is_read ? 'secondary' : 'primary' }} d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">{{ $msg->sender_initials ?? '??' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">{{ $msg->sender_name }}</h6>
                                        <small class="{{ ($selectedMessage && $selectedMessage->id == $msg->id) ? 'text-white' : 'text-muted' }}">{{ $msg->sender_role }}</small>
                                    </div>
                                </div>
                                <small>{{ $msg->created_at->format('H:i A') }}</small>
                            </div>
                            <p class="mb-0 mt-2 text-truncate" style="max-width: 250px;">{{ $msg->body }}</p>
                        </a>
                        @empty
                        <div class="p-4 text-center text-muted">No messages found.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Message Details -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                @if($selectedMessage)
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                            {{ $selectedMessage->sender_initials ?? '??' }}
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">{{ $selectedMessage->sender_name }}</h5>
                            <small class="text-muted">{{ $selectedMessage->sender_role }} | {{ $selectedMessage->email ?? 'no-email@school.com' }}</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <!-- FITUR BARU: TOMBOL EDIT (PENSIL) -->
                        <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editMsgModal">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Tombol Delete -->
                        <form action="{{ route('messages.destroy', $selectedMessage->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this message?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="fw-bold text-primary">{{ $selectedMessage->subject }}</small>
                            <small class="text-muted">{{ $selectedMessage->created_at->format('M d, Y H:i') }}</small>
                        </div>
                        <div class="p-3 bg-light rounded shadow-sm">
                            {!! nl2br(e($selectedMessage->body)) !!}
                        </div>
                    </div>
                    
                    <!-- Reply Form -->
                    <div class="border-top pt-3">
                        <h6 class="fw-bold mb-3">Write Reply</h6>
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Reply: {{ $selectedMessage->subject }}">
                            <input type="hidden" name="sender_name" value="Admin">
                            <input type="hidden" name="sender_role" value="Administrator">
                            <input type="hidden" name="sender_initials" value="AD">
                            <div class="mb-3">
                                <textarea name="body" class="form-control" rows="4" placeholder="Type your reply here..." required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm px-4">
                                    <i class="fas fa-paper-plane me-1"></i> Send Reply
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="card-body d-flex align-items-center justify-content-center bg-light">
                    <div class="text-center">
                        <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                        <p class="text-muted">Select a message from the inbox to read</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- MODAL NEW MESSAGE -->
<div class="modal fade" id="newMsgModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold"><i class="fas fa-paper-plane me-2"></i>New Message</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">From (Name)</label>
                        <input type="text" name="sender_name" class="form-control" placeholder="Sender Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Role</label>
                        <select name="sender_role" class="form-select">
                            <option value="Parent - Grade 10">Parent</option>
                            <option value="Teacher - Mathematics">Teacher</option>
                            <option value="Student">Student</option>
                            <option value="Administration">Staff</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Initials (2 letters)</label>
                        <input type="text" name="sender_initials" class="form-control" maxlength="2" placeholder="Ex: JP" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="What is this about?" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message</label>
                        <textarea name="body" class="form-control" rows="5" placeholder="Type message..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Create Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FITUR BARU: MODAL EDIT MESSAGE -->
@if($selectedMessage)
<div class="modal fade" id="editMsgModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark border-0">
                <h5 class="modal-title fw-bold"><i class="fas fa-edit me-2"></i>Edit Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('messages.update', $selectedMessage->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Sender Name</label>
                        <input type="text" name="sender_name" class="form-control" value="{{ $selectedMessage->sender_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" name="subject" class="form-control" value="{{ $selectedMessage->subject }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message Body</label>
                        <textarea name="body" class="form-control" rows="5" required>{{ $selectedMessage->body }}</textarea>
                    </div>
                    <input type="hidden" name="sender_role" value="{{ $selectedMessage->sender_role }}">
                    <input type="hidden" name="sender_initials" value="{{ $selectedMessage->sender_initials }}">
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning px-4">Update Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection