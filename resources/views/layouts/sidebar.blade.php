<div class="sidebar d-flex flex-column">

    <!-- HEADER / LOGO -->
    <div class="p-4 text-center border-bottom position-relative sidebar-header">
        <button class="btn btn-sm btn-light d-lg-none position-absolute top-0 end-0 mt-3 me-3 close-sidebar">
            <i class="fas fa-times"></i>
        </button>

        <h2 class="fw-bold mb-0">
            <i class="fas fa-graduation-cap me-2"></i>School
        </h2>
        <small class="text-light opacity-75">Management System</small>
    </div>

    <!-- SCROLLABLE MENU AREA -->
    <div class="flex-grow-1 p-3 sidebar-scroll"
     id="sidebarScroll"
     style="overflow-y:auto; height: calc(100vh - 160px);">


        <!-- MAIN MENU -->
        <ul class="nav flex-column mb-3">
            <li class="nav-item mb-2">
                <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-primary text-dark rounded' : '' }}"
                   href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white {{ request()->routeIs('home') ? 'active bg-warning text-dark rounded' : '' }}"
                   href="{{ route('home') }}">
                    <i class="fas fa-home me-3"></i>Home
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white {{ request()->routeIs('about') ? 'active bg-info text-dark rounded' : '' }}"
                   href="{{ route('about') }}">
                    <i class="fas fa-info-circle me-3"></i>About
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white {{ request()->routeIs('biodata') ? 'active bg-success text-dark rounded' : '' }}"
                   href="{{ route('biodata') }}">
                    <i class="fas fa-id-card me-3"></i>Biodata
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white {{ request()->routeIs('gallery') ? 'active bg-primary text-dark rounded' : '' }}" 
                    href="{{ route('gallery') }}">
            <i class="fas fa-images me-3"></i>Gallery
                </a>
            </li>

<li class="nav-item mb-2">
    <a class="nav-link text-white {{ request()->routeIs('pengumuman*') ? 'active bg-warning text-dark rounded' : '' }}"
       href="{{ route('pengumuman.index') }}">
        <i class="fas fa-bullhorn me-3"></i>Pengumuman
    </a>
</li>

<li class="nav-item mb-2">
    <a class="nav-link text-white {{ request()->routeIs('program*') ? 'active bg-danger text-white rounded' : '' }}"
       href="{{ route('program.index') }}">
        <i class="fas fa-project-diagram me-3"></i>Program
    </a>
</li>

<li class="nav-item mb-2">
    <a class="nav-link text-white {{ request()->routeIs('berita*') ? 'active bg-danger text-white rounded' : '' }}"
       href="{{ route('berita.index') }}">
        <i class="fas fa-newspaper me-3"></i>Berita
    </a>
</li>
            </li>
        </ul>

        <!-- ACADEMIC -->
        <ul class="nav flex-column mb-3">
            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex justify-content-between align-items-center
                   {{ request()->routeIs('schedule','reports') ? 'active bg-warning text-dark rounded' : '' }}"
                   data-bs-toggle="collapse" href="#academicMenu">
                    <span><i class="fas fa-book me-3"></i>Akademik</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
            </li>

            <div class="collapse {{ request()->routeIs('schedule','reports') ? 'show' : '' }}" id="academicMenu">
                <ul class="nav flex-column ms-4">
<li class="nav-item mb-2">
    <a class="nav-link text-white {{ request()->routeIs('schedule*') ? 'active bg-danger text-white rounded' : '' }}"
       href="{{ route('schedule.index') }}">
        <i class="fas fa-calendar-alt me-3"></i>Schedule
    </a>
</li>

<li class="nav-item mb-2">
    <a class="nav-link text-white {{ request()->routeIs('report*') ? 'active bg-danger text-white rounded' : '' }}"
       href="{{ route('report.index') }}">
        <i class="fas fa-chart-bar me-3"></i>Reports
    </a>
</li>
                </ul>
            </div>
        </ul>

        <!-- RESOURCES -->
        <ul class="nav flex-column mb-3">
            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex justify-content-between align-items-center
                   {{ request()->routeIs('documents') ? 'active bg-dark text-dark rounded' : '' }}"
                   data-bs-toggle="collapse" href="#resourceMenu">
                    <span><i class="fas fa-folder-open me-3"></i>Resources</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
            </li>

            <div class="collapse {{ request()->routeIs('documents') ? 'show' : '' }}" id="resourceMenu">
                <ul class="nav flex-column ms-4">
                    <li class="nav-item mb-1">
                        <a class="nav-link text-white {{ request()->routeIs('documents') ? 'active bg-primary text-dark rounded' : '' }}"
                           href="{{ route('documents') }}">
                            <i class="fas fa-file-alt me-2"></i>Document
                        </a>
                    </li>
                </ul>
            </div>
        </ul>

        <!-- COMMUNICATION -->
        <ul class="nav flex-column mb-4">
            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex justify-content-between align-items-center
                   {{ request()->routeIs('messages') ? 'active bg-success text-dark rounded' : '' }}"
                   data-bs-toggle="collapse" href="#communicationMenu">
                    <span><i class="fas fa-comments me-3"></i>Communication</span>
                    <i class="fas fa-chevron-down small"></i>
                </a>
            </li>

            <div class="collapse {{ request()->routeIs('messages') ? 'show' : '' }}" id="communicationMenu">
                <ul class="nav flex-column ms-4">
                    <li class="nav-item mb-1">
                        <a class="nav-link text-white {{ request()->routeIs('messages') ? 'active bg-primary text-dark rounded' : '' }}"
                           href="{{ route('messages') }}">
                            <i class="fas fa-envelope me-2"></i>Messages
                        </a>
                    </li>
                </ul>
            </div>
        </ul>

        <!-- ADMIN MENU -->
        <div class="pt-3 border-top">
            <h6 class="text-uppercase text-light opacity-50 mb-3">Admin Menu</h6>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('students*') ? 'active-class-anda' : '' }}" 
                        href="{{ route('students.index') }}">
                    <i class="fas fa-users me-3"></i>Students
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->routeIs('teachers.index') ? 'active bg-primary text-dark rounded' : '' }}" 
                        href="{{ route('teachers.index') }}">
                    <i class="fas fa-chalkboard-teacher me-3"></i>Teachers
                    </a>
                </li>
               <!-- Menu Library -->
<li class="nav-item">
    <a class="nav-link text-white {{ Request::is('library*') ? 'active-menu' : '' }}" href="{{ route('library.index') }}">
    <i class="fas fa-book me-2"></i>
    <span>Library</span>
    </a>
</li>

            </ul>
        </div>

    </div>

    <!-- FOOTER -->
    <div class="p-3 text-center border-top sidebar-footer">
        <small class="text-light opacity-75">© 2024 SchoolPro v2.0</small>
    </div>
</div>
<style>
.sidebar {
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.sidebar-menu {
    overflow-y: auto;
    scrollbar-width: thin;
}

.sidebar-menu::-webkit-scrollbar {
    width: 6px;
}

.sidebar-menu::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,.3);
    border-radius: 10px;
}

.nav .nav-link {
    padding: 0.45rem 0.75rem;
    font-size: 0.9rem;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebarScroll");

    // Restore posisi scroll
    if (sidebar && localStorage.getItem("sidebarScrollTop")) {
        sidebar.scrollTop = localStorage.getItem("sidebarScrollTop");
    }

    // Simpan posisi scroll saat klik menu
    sidebar?.addEventListener("scroll", function () {
        localStorage.setItem("sidebarScrollTop", sidebar.scrollTop);
    });
});
</script>

