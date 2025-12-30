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
                        <h3 class="fw-bold">156</h3>
                        <p class="mb-0">Total Messages</p>
                    </div>
                    <i class="fas fa-inbox fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">12 unread</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-2 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">28</h3>
                        <p class="mb-0">New Today</p>
                    </div>
                    <i class="fas fa-envelope-open-text fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 8 from yesterday</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-3 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">45</h3>
                        <p class="mb-0">Sent Messages</p>
                    </div>
                    <i class="fas fa-paper-plane fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">This week</small>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-card bg-gradient-4 card-hover h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">92%</h3>
                        <p class="mb-0">Response Rate</p>
                    </div>
                    <i class="fas fa-reply-all fa-2x opacity-50"></i>
                </div>
                <small class="opacity-75 d-block mt-2">↑ 3% from last month</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column - Message List -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Inbox</h5>
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i>New Message
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">
                        <!-- Message 1 -->
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3 active">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">JP</span>
                                        </div>
                                        <span class="position-absolute bottom-0 end-0 translate-middle p-1 bg-success border border-white rounded-circle"></span>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">John Peterson</h6>
                                        <small class="text-muted">Parent - Grade 10</small>
                                    </div>
                                </div>
                                <small class="text-muted">10:30 AM</small>
                            </div>
                            <p class="mb-0 mt-2">Regarding the upcoming parent-teacher meeting...</p>
                            <span class="badge bg-primary mt-1">Important</span>
                        </a>
                        
                        <!-- Message 2 -->
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <div class="rounded-circle bg-success d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">SD</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">Sarah Davis</h6>
                                        <small class="text-muted">Teacher - Mathematics</small>
                                    </div>
                                </div>
                                <small class="text-muted">Yesterday</small>
                            </div>
                            <p class="mb-0 mt-2">Need to discuss the exam schedule for next...</p>
                        </a>
                        
                        <!-- Message 3 -->
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">AS</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">Admin Staff</h6>
                                        <small class="text-muted">Administration</small>
                                    </div>
                                </div>
                                <small class="text-muted">2 days ago</small>
                            </div>
                            <p class="mb-0 mt-2">Monthly report submission reminder...</p>
                            <span class="badge bg-warning mt-1">Reminder</span>
                        </a>
                        
                        <!-- Message 4 -->
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <div class="rounded-circle bg-info d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">MS</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">Michael Smith</h6>
                                        <small class="text-muted">Student - Grade 12</small>
                                    </div>
                                </div>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-0 mt-2">Question about the science project deadline...</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Message Details -->
        <div class="col-lg-8">
            <!-- Message Thread -->
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <span class="text-white fw-bold" style="font-size: 1.2rem;">JP</span>
                                </div>
                                <span class="position-absolute bottom-0 end-0 translate-middle p-1 bg-success border border-white rounded-circle"></span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">John Peterson</h5>
                                <small class="text-muted">Parent - Grade 10 | john.p@email.com</small>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-reply me-2"></i>Reply</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-forward me-2"></i>Forward</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-archive me-2"></i>Archive</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <!-- Received Message -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="fw-bold">John Peterson</small>
                            <small class="text-muted">Today, 10:30 AM</small>
                        </div>
                        <div class="p-3 bg-light rounded">
                            <p class="mb-0">Dear Admin,</p>
                            <p class="mb-0">I hope this message finds you well. I'm writing to inquire about the upcoming parent-teacher meeting scheduled for next week. Could you please confirm the exact time and venue?</p>
                            <p class="mb-0">Also, I would like to discuss my daughter's progress in mathematics. Would it be possible to schedule a separate meeting with Mr. Johnson?</p>
                            <p class="mb-0">Thank you for your assistance.</p>
                            <p class="mb-0 mt-2">Best regards,<br>John Peterson</p>
                        </div>
                    </div>
                    
                    <!-- Reply Area -->
                    <div class="border-top pt-3">
                        <h6 class="fw-bold mb-3">Write Reply</h6>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-smile"></i>
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary btn-sm me-2">
                                    Save Draft
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-paper-plane me-1"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Quick Actions</h6>
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <button class="btn btn-outline-primary w-100 py-2">
                                <i class="fas fa-envelope me-2"></i>Compose
                            </button>
                        </div>
                        <div class="col-md-3 col-6">
                            <button class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-user-friends me-2"></i>Group Message
                            </button>
                        </div>
                        <div class="col-md-3 col-6">
                            <button class="btn btn-outline-info w-100 py-2">
                                <i class="fas fa-bell me-2"></i>Announcement
                            </button>
                        </div>
                        <div class="col-md-3 col-6">
                            <button class="btn btn-outline-warning w-100 py-2">
                                <i class="fas fa-cog me-2"></i>Settings
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
        // Message list click handler
        $('.list-group-item').click(function(e) {
            e.preventDefault();
            $('.list-group-item').removeClass('active');
            $(this).addClass('active');
            
            // Update message details (simulated)
            var sender = $(this).find('h6').text();
            $('.card-header h5').text(sender);
        });
        
        // Auto-resize textarea
        $('textarea').on('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
</script>
@endsection
@endsection