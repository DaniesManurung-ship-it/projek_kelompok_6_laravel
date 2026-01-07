<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid px-3 px-md-4">
        <!-- Mobile Toggle & Logo -->
        <div class="d-flex align-items-center w-100">
            <!-- Sidebar Toggle for Mobile -->
            <button class="btn btn-outline-primary me-3 d-lg-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Logo for Mobile -->
            <a class="navbar-brand d-lg-none me-auto" href="{{ route('dashboard') }}">
                <i class="fas fa-graduation-cap me-2 text-primary"></i>
                <span class="fw-bold">School</span>
            </a>
            
            <!-- Search Form - Desktop -->
            <div class="d-none d-lg-flex flex-grow-1 me-4">
                <form class="w-100">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Mobile Search Toggle -->
            <button class="btn btn-outline-primary d-lg-none ms-auto me-2" id="mobileSearchToggle">
                <i class="fas fa-search"></i>
            </button>
            
            <!-- Right Side Menu -->
            <div class="navbar-nav align-items-center">
                <!-- Notifications -->
                <div class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Notifikasi</h6>
                        <a class="dropdown-item" href="#">Pengumuman baru</a>
                        <a class="dropdown-item" href="#">Jadwal ujian</a>
                        <a class="dropdown-item" href="#">Pembayaran</a>
                    </div>
                </div>
                
                <!-- User dropdown -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="d-none d-md-block me-2">
                            <div class="avatar">
                                <i class="fas fa-user-circle fa-2x text-primary"></i>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <span class="fw-bold">{{ Auth::user()->name ?? 'User' }}</span>
                            <small class="text-muted d-block">{{ Auth::user()->role ?? 'Administrator' }}</small>
                        </div>
                        <div class="d-md-none">
                            <i class="fas fa-user-circle fa-lg text-primary"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="nav-link {{ request()->routeIs('profile*') ? 'active' : '' }}" href="{{ route('profile.index') }}">
        <i class="fas fa-user me-1"></i>Profile
    </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" id="logout-btn" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Search Form -->
        <div class="d-lg-none w-100 mt-3 collapse" id="mobileSearchForm">
            <form class="w-100">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>

<script>
    // Mobile search toggle
    $(document).ready(function() {
        $('#mobileSearchToggle').click(function() {
            $('#mobileSearchForm').collapse('toggle');
        });
        
        // Close mobile search when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest('#mobileSearchToggle, #mobileSearchForm').length) {
                $('#mobileSearchForm').collapse('hide');
            }
        });
    });
</script>