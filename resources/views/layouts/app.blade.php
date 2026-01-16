<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Aroma - @yield('title', 'Welcome')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --primary: #8B4513;
            --primary-light: #A0522D;
            --secondary: #D2691E;
            --accent: #F4A460;
            --dark: #2C1810;
            --cream: #FFF8DC;
            --light: #FAEBD7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--cream) 0%, var(--light) 100%);
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--cream) !important;
        }

        .navbar-brand i {
            color: var(--accent);
            margin-right: 0.5rem;
        }

        .nav-link {
            color: var(--cream) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.15);
            transform: translateY(-2px);
        }

        .btn-auth {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(210, 105, 30, 0.4);
            color: white;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.3);
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 0.75rem 2rem;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            color: var(--cream);
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        footer a {
            color: var(--accent);
            text-decoration: none;
        }

        /* Alert */
        .alert {
            border-radius: 15px;
            border: none;
        }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
            text-align: center;
        }

        .page-title h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        /* Stars Rating */
        .star {
            color: #ddd;
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star.active, .star:hover {
            color: #FFD700;
        }

        .text-gold {
            color: #FFD700;
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
    </style>
    @yield('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-coffee"></i> Café Aroma
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}" href="{{ route('menu') }}">
                        <i class="fas fa-utensils me-1"></i> Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('reservations*') ? 'active' : '' }}" href="{{ route('reservations') }}">
                        <i class="fas fa-calendar-check me-1"></i> Reserve Table
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ratings*') ? 'active' : '' }}" href="{{ route('ratings') }}">
                        <i class="fas fa-star me-1"></i> Ratings
                    </a>
                </li>
            </ul>
            
            <div class="d-flex gap-2">
                @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm" style="border-radius: 25px;">
                            <i class="fas fa-cog me-1"></i>Admin Panel
                        </a>
                    @endif
                    <span class="nav-link text-white"><i class="fas fa-user me-1"></i> {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-auth btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-auth btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm" style="border-radius: 25px;">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main>
    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5><i class="fas fa-coffee me-2"></i>Café Aroma</h5>
                <p class="mt-3">Experience the finest coffee and delicious treats in a warm, welcoming atmosphere.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{ route('menu') }}"><i class="fas fa-chevron-right me-2"></i>Our Menu</a></li>
                    <li><a href="{{ route('reservations') }}"><i class="fas fa-chevron-right me-2"></i>Book a Table</a></li>
                    <li><a href="{{ route('ratings') }}"><i class="fas fa-chevron-right me-2"></i>Reviews</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled mt-3">
                    <li><i class="fas fa-map-marker-alt me-2"></i>123 Coffee Street, City</li>
                    <li><i class="fas fa-phone me-2"></i>+91 98765 43210</li>
                    <li><i class="fas fa-envelope me-2"></i>hello@cafearoma.com</li>
                </ul>
            </div>
        </div>
        <hr style="border-color: rgba(255,255,255,0.2);">
        <p class="text-center mb-0">&copy; 2024 Café Aroma. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
