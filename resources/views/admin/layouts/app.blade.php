<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Gunjannagar Khane Pani')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d47a1;
            --secondary-color: #2196f3;
            --accent-color: #00bcd4;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --warning-color: #ff9800;
            --light-bg: #f5f5f5;
            --dark-text: #333;
        }
        
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            background-color: var(--light-bg);
        }
        
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, var(--primary-color) 0%, #1565c0 100%);
            color: white;
            overflow-y: auto;
            z-index: 1000;
        }
        
        .sidebar-brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .sidebar-brand small {
            font-size: 0.8rem;
            opacity: 0.8;
        }
        
        .sidebar-menu {
            padding: 10px 0;
        }
        
        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .sidebar-menu .nav-link:hover,
        .sidebar-menu .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar-menu .nav-link i {
            width: 25px;
            margin-right: 10px;
        }
        
        .sidebar-menu .nav-link .badge {
            margin-left: auto;
        }
        
        .main-content {
            margin-left: 280px;
            padding: 20px;
            min-height: 100vh;
        }
        
        .top-bar {
            background: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            font-weight: 600;
        }
        
        .stat-card {
            padding: 20px;
            border-radius: 10px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card.primary { background: linear-gradient(135deg, var(--primary-color), #1976d2); }
        .stat-card.secondary { background: linear-gradient(135deg, var(--secondary-color), #03a9f4); }
        .stat-card.success { background: linear-gradient(135deg, var(--success-color), #8bc34a); }
        .stat-card.warning { background: linear-gradient(135deg, var(--warning-color), #ffc107); }
        .stat-card.danger { background: linear-gradient(135deg, var(--danger-color), #e91e63); }
        .stat-card.info { background: linear-gradient(135deg, var(--accent-color), #00bcd4); }
        
        .stat-card .icon {
            font-size: 2.5rem;
            opacity: 0.3;
            position: absolute;
            right: 20px;
            top: 20px;
        }
        
        .stat-card h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }
        
        .stat-card p {
            margin: 0;
            opacity: 0.9;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background: #1565c0;
            border-color: #1565c0;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            border-bottom: 2px solid var(--primary-color);
            font-weight: 600;
        }
        
        .pagination .page-link {
            color: var(--primary-color);
        }
        
        .pagination .page-item.active .page-link {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    @if(auth()->check())
    <aside class="sidebar">
        <div class="sidebar-brand">
            <h4>गुन्जनगर खानेपानी</h4>
            <small>Admin Panel</small>
        </div>
        
        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            
            <div class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#website-menu">
                    <i class="fas fa-home"></i>
                    <span>Website Management</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse ms-4" id="website-menu">
                    <a href="{{ route('admin.homepage.index') }}" class="nav-link {{ request()->routeIs('admin.homepage.*') ? 'active' : '' }}">Homepage</a>
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">Sliders</a>
                    <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">Pages</a>
                    <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('admin.statistics.index') }}" class="nav-link {{ request()->routeIs('admin.statistics.*') ? 'active' : '' }}">Statistics</a>
                    <a href="{{ route('admin.important-links.index') }}" class="nav-link {{ request()->routeIs('admin.important-links.*') ? 'active' : '' }}">Important Links</a>
                </div>
            </div>
            
            <div class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#content-menu">
                    <i class="fas fa-newspaper"></i>
                    <span>Content</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse ms-4" id="content-menu">
                    <a href="{{ route('admin.notices.index') }}" class="nav-link {{ request()->routeIs('admin.notices.*') ? 'active' : '' }}">Notices</a>
                    <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">News</a>
                    <a href="{{ route('admin.downloads.index') }}" class="nav-link {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">Downloads</a>
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">Gallery</a>
                    <a href="{{ route('admin.videos.index') }}" class="nav-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">Videos</a>
                    <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">FAQ</a>
                </div>
            </div>
            
            <div class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#organization-menu">
                    <i class="fas fa-users"></i>
                    <span>Organization</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse ms-4" id="organization-menu">
                    <a href="{{ route('admin.officials.index') }}" class="nav-link {{ request()->routeIs('admin.officials.*') ? 'active' : '' }}">Officials</a>
                </div>
            </div>
            
            <div class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#website-config-menu">
                    <i class="fas fa-cog"></i>
                    <span>Website Config</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse ms-4" id="website-config-menu">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Settings</a>
                    <a href="{{ route('admin.menus.index') }}" class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">Menus</a>
                    <a href="{{ route('admin.tariffs.index') }}" class="nav-link {{ request()->routeIs('admin.tariffs.*') ? 'active' : '' }}">Tariffs</a>
                </div>
            </div>
            
            <div class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#messages-menu">
                    <i class="fas fa-envelope"></i>
                    <span>Messages</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse ms-4" id="messages-menu">
                    <a href="{{ route('admin.contact-messages.index') }}" class="nav-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">Contact Messages</a>
                </div>
            </div>
            
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>
    @endif
    
    <main class="main-content">
        @if(auth()->check())
        <div class="top-bar">
            <div>
                <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted">
                    <i class="fas fa-user-circle me-2"></i>
                    {{ auth()->user()->name }}
                </span>
                <button class="btn btn-outline-primary btn-sm d-md-none" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        @endif
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @yield('content')
    </main>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }
    </script>
    
    @stack('scripts')
</body>
</html>
