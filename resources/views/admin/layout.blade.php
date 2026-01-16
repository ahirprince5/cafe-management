<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body { background: #f4f6f9; }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2C1810 0%, #8B4513 100%);
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.1);
            border-left-color: #F4A460;
        }
        .sidebar a i { margin-right: 10px; width: 20px; }
        .main-content { padding: 20px; }
        .card { border: none; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .stat-card { background: linear-gradient(135deg, #8B4513, #D2691E); color: white; }
        .btn-primary { background: #8B4513; border-color: #8B4513; }
        .btn-primary:hover { background: #A0522D; border-color: #A0522D; }
        .table th { background: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4 class="text-white text-center mb-4">
                    <i class="fas fa-coffee"></i> Admin Panel
                </h4>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.menu-items') }}" class="{{ request()->routeIs('admin.menu-items*') ? 'active' : '' }}">
                    <i class="fas fa-utensils"></i> Menu Items
                </a>
                <a href="{{ route('admin.categories') }}" class="{{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i> Categories
                </a>
                <a href="{{ route('admin.tables') }}" class="{{ request()->routeIs('admin.tables*') ? 'active' : '' }}">
                    <i class="fas fa-chair"></i> Tables
                </a>
                <a href="{{ route('admin.reservations') }}" class="{{ request()->routeIs('admin.reservations*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i> Reservations
                </a>
                <a href="{{ route('admin.ratings') }}" class="{{ request()->routeIs('admin.ratings*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i> Ratings
                </a>
                <hr style="border-color: rgba(255,255,255,0.2);">
                <a href="{{ route('home') }}">
                    <i class="fas fa-home"></i> Back to Site
                </a>
                <form action="{{ route('logout') }}" method="POST" class="px-3 mt-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm w-100">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
