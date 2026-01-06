<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'School Management System')</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #10b981;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
            --accent-color: #f59e0b;
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* ========== SIDEBAR STYLING ========== */
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, #3730a3 100%);
            color: white;
            min-height: 100vh;
            position: fixed;
            width: 250px;
            z-index: 1050;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-100%);
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            left: 0;
            top: 0;
        }
        
        .sidebar.active {
            transform: translateX(0);
        }
        
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1049;
            display: none;
            transition: opacity 0.3s;
        }
        
        .sidebar-overlay.active {
            display: block;
            animation: fadeIn 0.3s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Desktop view - FIXED SIDEBAR */
        @media (min-width: 992px) {
            .sidebar {
                transform: translateX(0) !important;
                width: 250px;
            }
            
            .main-container {
                margin-left: 250px;
                width: calc(100% - 250px);
                transition: all 0.3s;
            }
            
            .sidebar-overlay {
                display: none !important;
            }
            
            /* Adjust main content to not have extra padding */
            .main-content {
                margin-left: 0;
                padding-left: 0;
            }
        }
        
        /* Mobile optimizations */
        @media (max-width: 991.98px) {
            .main-container {
                margin-left: 0 !important;
                width: 100% !important;
            }
            
            .sidebar {
                width: 280px;
            }
            
            .main-content {
                padding: 15px;
            }
        }
        
        /* ========== MAIN CONTENT AREA ========== */
        .main-container {
            min-height: 100vh;
            transition: margin-left 0.3s;
            background-color: #f8f9fa;
        }
        
        .main-content {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            margin-top: 20px;
            padding: 30px;
            width: 100%;
        }
        
        @media (max-width: 767.98px) {
            .main-content {
                margin-top: 15px;
                padding: 20px;
                border-radius: 15px;
            }
        }
        
        @media (max-width: 575.98px) {
            .main-content {
                padding: 15px;
                border-radius: 12px;
                margin-top: 10px;
            }
        }
        
        /* ========== NAVBAR ========== */
        .navbar-custom {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            z-index: 1030;
            padding: 12px 0;
        }
        
        @media (max-width: 991.98px) {
            .navbar-custom {
                padding: 10px 0;
                position: sticky;
                top: 0;
            }
        }
        
        /* ========== CARDS & COMPONENTS ========== */
        .card-hover {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .btn-gradient {
            background: linear-gradient(45deg, var(--primary-color), #7c3aed);
            border: none;
            color: white;
            transition: all 0.3s;
        }
        
        .btn-gradient:hover {
            background: linear-gradient(45deg, #3730a3, var(--primary-color));
            transform: translateY(-2px);
        }
        
        .progress-bar-gradient {
            background: linear-gradient(90deg, var(--secondary-color), #34d399);
        }
        
        .stat-card {
            border-radius: 15px;
            padding: 20px;
            color: white;
            margin-bottom: 20px;
        }
        
        /* ========== RESPONSIVE TYPOGRAPHY ========== */
        h1 { font-size: clamp(1.75rem, 4vw, 2.5rem); line-height: 1.2; }
        h2 { font-size: clamp(1.5rem, 3.5vw, 2rem); line-height: 1.3; }
        h3 { font-size: clamp(1.25rem, 3vw, 1.75rem); line-height: 1.3; }
        h4 { font-size: clamp(1.1rem, 2.5vw, 1.5rem); line-height: 1.4; }
        h5 { font-size: clamp(1rem, 2vw, 1.25rem); line-height: 1.4; }
        h6 { font-size: clamp(0.9rem, 1.8vw, 1rem); line-height: 1.4; }
        
        /* ========== FOOTER ========== */
        footer {
            margin-top: 2rem;
            padding: 1.5rem 0;
        }
        
        /* ========== UTILITY CLASSES ========== */
        .bg-gradient-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .bg-gradient-2 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .bg-gradient-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .bg-gradient-4 { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        
        /* ========== SCROLLBAR STYLING ========== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }
    </style>

    <style>
    .nav-link {
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 5px;
        transition: 0.3s;
    }
    .nav-link:hover {
        background: rgba(255,255,255,0.1);
    }
    .nav-link.active {
        font-weight: bold;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    </style>
    
    @yield('styles')
</head>
<body>
    @auth
        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay"></div>
        
        <!-- Sidebar -->
        @include('layouts.sidebar')
        
        <!-- Main Container -->
        <div class="main-container">
            <!-- Navbar -->
            @include('layouts.navbar')
            
            <!-- Main Content -->
            <main class="main-content container-fluid">
                @yield('content')
            </main>
            
            <!-- Footer -->
            @include('layouts.footer')
        </div>
    @else
        <!-- Auth Pages (Login, Register) -->
        @yield('content')
    @endauth

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        $(document).ready(function() {
            // Sidebar toggle functionality
            $('#sidebarToggle').click(function(e) {
                e.preventDefault();
                $('.sidebar').toggleClass('active');
                $('.sidebar-overlay').toggleClass('active');
                $('body').toggleClass('overflow-hidden');
            });
            
            // Close sidebar when clicking overlay
            $('.sidebar-overlay').click(function() {
                $('.sidebar').removeClass('active');
                $(this).removeClass('active');
                $('body').removeClass('overflow-hidden');
            });
            
            // Close sidebar when clicking a link (mobile only)
            $('.sidebar .nav-link').click(function() {
                if ($(window).width() < 992) {
                    $('.sidebar').removeClass('active');
                    $('.sidebar-overlay').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                }
            });
            
            // Close sidebar with Escape key
            $(document).keydown(function(e) {
                if (e.key === 'Escape') {
                    $('.sidebar').removeClass('active');
                    $('.sidebar-overlay').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                }
            });
            
            // Logout handler
            $('#logout-btn').click(function(e) {
                e.preventDefault();
                if(confirm('Apakah Anda yakin ingin keluar?')) {
                    $('#logout-form').submit();
                }
            });
            
            // Handle window resize
            function handleResize() {
                if ($(window).width() >= 992) {
                    $('.sidebar').addClass('active');
                    $('.sidebar-overlay').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                } else {
                    $('.sidebar').removeClass('active');
                }
            }
            
            // Initial check
            handleResize();
            
            // Listen for resize events
            $(window).resize(function() {
                handleResize();
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>