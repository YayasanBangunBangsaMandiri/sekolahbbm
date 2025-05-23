<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Admin Panel SMK" />
    <title>@yield('title', 'Admin Panel') - SMK</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom styles -->
    <style>
        :root {
            --sidebar-bg: #1e40af;
            --sidebar-hover: #2563eb;
            --sidebar-active: #3b82f6;
            --sidebar-text: rgba(255, 255, 255, 0.7);
            --header-height: 60px;
        }

        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            z-index: 100;
            transition: all 0.3s;
        }

        .sidebar-brand {
            height: var(--header-height);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .sidebar-header {
            color: var(--sidebar-text);
            font-size: 0.75rem;
            padding: 1.5rem 1.5rem 0.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-link:hover {
            color: white;
            background-color: var(--sidebar-hover);
            text-decoration: none;
        }

        .sidebar-link.active {
            color: white;
            background-color: var(--sidebar-active);
        }

        .sidebar-link i {
            width: 1.25rem;
            margin-right: 0.75rem;
            font-size: 1rem;
        }

        /* Dropdown Menu */
        .sidebar-dropdown {
            margin-left: 1.5rem;
            display: none;
        }

        .sidebar-dropdown.show {
            display: block;
        }

        .sidebar-dropdown .sidebar-link {
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
        }

        .sidebar-link[data-bs-toggle="collapse"] {
            position: relative;
        }

        .sidebar-link[data-bs-toggle="collapse"]::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s;
        }

        .sidebar-link[data-bs-toggle="collapse"][aria-expanded="true"]::after {
            transform: translateY(-50%) rotate(180deg);
        }

        /* Content Area */
        .content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        .content-header {
            background-color: white;
            margin: -20px -20px 20px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
        }

        /* Navbar */
        .top-navbar {
            position: fixed;
            right: 0;
            top: 0;
            left: 250px;
            height: var(--header-height);
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            z-index: 99;
        }

        /* Cards */
        .card {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            border: none;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.125);
            padding: 1rem 1.25rem;
        }

        /* Tables */
        .table thead th {
            background-color: #f8fafc;
            border-bottom: none;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--sidebar-active);
            border-color: var(--sidebar-active);
        }

        .btn-primary:hover {
            background-color: var(--sidebar-hover);
            border-color: var(--sidebar-hover);
        }

        /* User Dropdown */
        .user-dropdown {
            margin-left: auto;
        }

        .user-dropdown .dropdown-toggle {
            color: #1e3a8a;
            text-decoration: none;
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            
            .sidebar.active {
                margin-left: 0;
            }
            
            .content {
                margin-left: 0;
            }
            
            .content.active {
                margin-left: 250px;
            }
            
            .top-navbar {
                left: 0;
            }
            
            .top-navbar.active {
                left: 250px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            SMK Admin
        </a>

        <div class="sidebar-nav">
            <div class="sidebar-header">
                CORE
            </div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>

            <div class="sidebar-header">
                KONTEN
            </div>
            <!-- Konten Dropdown -->
            <a href="#kontenSubmenu" data-bs-toggle="collapse" class="sidebar-link {{ request()->is('admin/posts*', 'admin/programs*', 'admin/majors*', 'admin/staff*', 'admin/gallery*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                Konten
            </a>
            <div class="collapse {{ request()->is('admin/posts*', 'admin/programs*', 'admin/majors*', 'admin/staff*', 'admin/gallery*') ? 'show' : '' }}" id="kontenSubmenu">
                <div class="sidebar-dropdown">
                    <a href="{{ route('admin.posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i>
                        Berita & Blog
                    </a>
                    <a href="{{ route('admin.programs.index') }}" class="sidebar-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                        <i class="fas fa-graduation-cap"></i>
                        Program
                    </a>
                    <a href="{{ route('admin.majors.index') }}" class="sidebar-link {{ request()->routeIs('admin.majors.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        Jurusan
                    </a>
                    <a href="{{ route('admin.staff.index') }}" class="sidebar-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        Staff
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="sidebar-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                        <i class="fas fa-images"></i>
                        Galeri
                    </a>
                </div>
            </div>

            <div class="sidebar-header">
                PENDAFTARAN
            </div>
            <a href="{{ route('admin.registrations.index') }}" class="sidebar-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                Data Pendaftar
            </a>
            <a href="{{ route('admin.letter-settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.letter-settings.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                Pengaturan Surat
            </a>

            <div class="sidebar-header">
                ADMIN
            </div>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-user-cog"></i>
                Users
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fas fa-inbox"></i>
                Kontak Masuk
            </a>
        </div>
    </nav>

    <!-- Top Navbar -->
    <nav class="top-navbar">
        <button class="btn btn-link text-dark d-md-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="user-dropdown dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span class="ms-2">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="content-header">
            <h1 class="h3 mb-0">@yield('title')</h1>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            const topNavbar = document.querySelector('.top-navbar');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('active');
                    content.classList.toggle('active');
                    topNavbar.classList.toggle('active');
                });
            }

            // Restore sidebar state from localStorage
            const sidebarState = localStorage.getItem('sidebarState');
            if (sidebarState === 'closed') {
                sidebar.classList.add('active');
                content.classList.add('active');
                topNavbar.classList.add('active');
            }

            // Save sidebar state to localStorage
            function saveSidebarState() {
                localStorage.setItem('sidebarState', 
                    sidebar.classList.contains('active') ? 'closed' : 'open'
                );
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', saveSidebarState);
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html> 