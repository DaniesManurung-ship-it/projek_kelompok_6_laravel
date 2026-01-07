@extends('layouts.app')

@section('title', 'Message Detail - SchoolPro')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <div class="row mb-4">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark">Message Detail</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- PERBAIKAN 1 -->
                            <li class="breadcrumb-item"><a href="{{ route('messages') }}">Messages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
                <!-- PERBAIKAN 2 -->
                <a href="{{ route('messages') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Inbox
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <span class="text-white fw-bold" style="font-size: 1.2rem;">
                                        {{ strtoupper(substr($message->sender_name, 0, 2)) }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">{{ $message->sender_name }}</h5>
                                <small class="text-muted">{{ $message->sender_role }} | {{ $message->sender_email }}</small>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('messages.read', $message->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-check me-2"></i> Mark as Read
                                        </button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" id="delete-form-detail">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="dropdown-item text-danger" 
                                                onclick="if(confirm('Delete this message?')) document.getElementById('delete-form-detail').submit()">
                                            <i class="fas fa-trash me-2"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Message Header -->
                    <div class="border-bottom pb-3 mb-3">
                        <h4 class="fw-bold">{{ $message->subject }}</h4>
                        <small class="text-muted">
                            Received: {{ $message->created_at->format('l, F j, Y \a\t h:i A') }}
                        </small>
                    </div>

                    <!-- Message Content -->
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($message->content)) !!}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <form action="{{ route('messages.read', $message->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-check me-1"></i> Mark as Read
                                    </button>
                                </form>
                            </div>
                            <div>
                                <!-- PERBAIKAN 3 -->
                                <a href="{{ route('messages') }}" class="btn btn-secondary btn-sm me-2">
                                    <i class="fas fa-times me-1"></i> Close
                                </a>
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Delete this message?')">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection