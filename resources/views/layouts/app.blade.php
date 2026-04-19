<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nusantara Rasa - Cita Rasa Autentik Indonesia')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-color: #8B4513;
            --accent-color: #D2691E;
            --success-color: #228B22;
            --gold-color: #DAA520;
            --dark-color: #1a1410;
            --light-color: #faf7f3;
        }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            min-height: 100%;
            background-color: #fafafa;
            color: #1a1410;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
        }

        main {
            flex: 1;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            box-shadow: 0 4px 14px rgba(139, 69, 19, 0.15);
            border-bottom: 2px solid var(--accent-color);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand::before {
            content: "🍲";
            font-size: 1.8rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 12px !important;
        }

        .nav-link:hover {
            color: var(--gold-color) !important;
        }

        .nav-link.active {
            color: var(--gold-color) !important;
            border-bottom: 2px solid var(--gold-color);
        }

        /* Batik Pattern Background */
        .batik-pattern {
            position: relative;
            background: linear-gradient(135deg, #F5E6D3 0%, #E8D4C0 25%, #D4A574 50%, #C99565 75%, #E8D4C0 100%);
            background-attachment: scroll;
            color: #1a1410;
        }

        .batik-pattern::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            opacity: 0.08;
            z-index: -1;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.95) 0%, rgba(210, 105, 30, 0.95) 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
            position: relative;
            width: 100%;
            overflow: visible;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .carousel-inner {
            min-height: auto;
            height: auto;
        }

        .carousel-item {
            min-height: auto;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }

        .carousel-item img,
        .card-img-top,
        .img-thumbnail {
            max-width: 100%;
            height: auto;
        }

        .container,
        .container-fluid {
            max-width: 100%;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media (max-width: 992px) {
            .hero-section {
                padding: 60px 0;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .navbar .navbar-nav {
                gap: 0.5rem;
            }

            .card {
                border-radius: 1rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 0;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            .nav-link {
                padding: 0.5rem 0 !important;
            }

            .sticky-top {
                position: static !important;
            }

            .product-card-menu img,
            .product-card img {
                height: 180px;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 30px 0;
            }

            .hero-section h1 {
                font-size: 1.75rem;
            }

            .carousel-indicators {
                bottom: -35px;
            }

            .navbar .navbar-nav {
                flex-direction: column;
            }

            .navbar-collapse {
                background: rgba(255, 255, 255, 0.05);
            }
        }

        /* Card Styling */
        .card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.15);
        }

        /* Button Styling */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #6d3410;
            border-color: #6d3410;
        }

        .btn-secondary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #b84e0a;
            border-color: #b84e0a;
            color: white;
        }

        /* Input Styling */
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-color) 0%, #2a241a 100%);
            color: var(--light-color);
            margin-top: 60px;
        }

        /* Heading Styling */
        h1, h2, h3, h4, h5, h6 {
            color: var(--primary-color);
            font-weight: 700;
        }

        .text-accent {
            color: var(--accent-color);
        }

        .text-success-custom {
            color: var(--success-color);
        }

        .badge-primary {
            background-color: var(--primary-color);
        }

        .badge-success {
            background-color: var(--success-color);
        }

        /* Link Styling */
        a {
            color: var(--primary-color);
            text-decoration: none;
        }

        a:hover {
            color: var(--accent-color);
        }

        /* Container Custom */
        .container-custom {
            max-width: 1200px;
        }
    </style>
</head>
<body class="batik-pattern">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('getuk.index') }}">Nusantara Rasa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getuk.index') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getuk.produk') }}">
                            <i class="fas fa-utensils"></i> Produk
                        </a>
                    </li>
                    @if(session('user'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">
                                <i class="fas fa-user"></i> Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-5 mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3" style="color: white;">🍲 Nusantara Rasa</h5>
                    <p style="color: white;">Membawa cita rasa autentik nusantara ke meja makan Anda dengan kualitas terbaik.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm text-light"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-sm text-light"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-sm text-light"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="mb-3" style="color: white;">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('getuk.index') }}" style="color: white; text-decoration: none;">Home</a></li>
                        <li><a href="{{ route('getuk.produk') }}" style="color: white; text-decoration: none;">Produk</a></li>
                        <li><a href="{{ route('profile') }}" style="color: white; text-decoration: none;">Profil</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="mb-3" style="color: white;">Hubungi Kami</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="fas fa-phone text-accent"></i> <span style="color: white; margin-left: 8px;">+62 821 1234 5678</span></li>
                        <li class="mb-2"><i class="fas fa-envelope text-accent"></i> <span style="color: white; margin-left: 8px;">info@nusantararasa.id</span></li>
                        <li><i class="fas fa-map-marker-alt text-accent"></i> <span style="color: white; margin-left: 8px;">Jakarta, Indonesia</span></li>
                    </ul>
                </div>
            </div>
            <hr class="bg-secondary-subtle">
            <div class="text-center small" style="color: white;">
                <p>&copy; 2024 Nusantara Rasa. Semua hak dilindungi. | Dibuat dengan ❤️ untuk Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
