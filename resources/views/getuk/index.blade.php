@extends('layouts.app')

@section('title', 'Beranda - Nusantara Rasa')

@section('content')
<!-- Hero Section with Carousel -->
<div class="hero-section position-relative" style="background: linear-gradient(135deg, #FF9800 0%, #FF7043 25%, #FF6F00 50%, #FF9800 75%, #FFB74D 100%); padding: 0; width: 100%; overflow: visible; min-height: 700px; display: flex; align-items: center;">
    <div id="carouselHero" class="carousel slide carousel-fade w-100" data-bs-ride="carousel" style="height: 100%;">
        <div class="carousel-indicators" style="bottom: 50px; gap: 8px;">
            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="0" class="active" aria-current="true" style="width: 14px; height: 14px; background-color: white; border: 2px solid white; border-radius: 50%; transition: all 0.3s ease;"></button>
            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="1" style="width: 14px; height: 14px; background-color: rgba(255,255,255,0.5); border: 2px solid white; border-radius: 50%; transition: all 0.3s ease;"></button>
            <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="2" style="width: 14px; height: 14px; background-color: rgba(255,255,255,0.5); border: 2px solid white; border-radius: 50%; transition: all 0.3s ease;"></button>
        </div>
        <div class="carousel-inner h-100">
            <!-- Slide 1 -->
            <div class="carousel-item active h-100" style="display: flex; align-items: center; padding: 100px 0;">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 style="font-size: 4rem; font-weight: 900; margin-bottom: 20px; text-shadow: 3px 3px 12px rgba(0,0,0,0.5); letter-spacing: 2px; color: white;">NUSANTARA RASA</h1>
                        <div style="height: 3px; width: 100px; background: linear-gradient(90deg, #FF9800, #FFC107); margin: 20px auto;"></div>
                        <p style="font-size: 1.15rem; margin-bottom: 40px; color: rgba(255,255,255,0.98); line-height: 2; max-width: 800px; margin-left: auto; margin-right: auto; text-shadow: 1px 1px 4px rgba(0,0,0,0.3);">Nikmati cita rasa autentik makanan tradisional Nusantara yang telah dipercaya selama bertahun-tahun. Dibuat dengan bahan-bahan pilihan terbaik untuk Anda.</p>
                        <a href="{{ route('getuk.produk') }}" class="btn btn-lg btn-primary" style="background: linear-gradient(135deg, #FF9800, #FF6F00); border: none; padding: 12px 40px; font-weight: 600; transition: all 0.3s ease;">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item h-100" style="display: flex; align-items: center; padding: 100px 0;">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 style="font-size: 4rem; font-weight: 900; margin-bottom: 20px; text-shadow: 3px 3px 12px rgba(0,0,0,0.5); letter-spacing: 2px; color: white;">JAJANAN NUSANTARA</h1>
                        <div style="height: 3px; width: 100px; background: linear-gradient(90deg, #FF9800, #FFC107); margin: 20px auto;"></div>
                        <p style="font-size: 1.15rem; margin-bottom: 40px; color: rgba(255,255,255,0.98); line-height: 2; max-width: 800px; margin-left: auto; margin-right: auto; text-shadow: 1px 1px 4px rgba(0,0,0,0.3);">Camilan istimewa dengan motif batik yang unik. Garing, renyah, dan penuh cita rasa yang memanjakan lidah. Sempurna untuk hadiah atau menemani waktu Anda.</p>
                        <a href="{{ route('getuk.produk') }}" class="btn btn-lg btn-primary" style="background: linear-gradient(135deg, #FF9800, #FF6F00); border: none; padding: 12px 40px; font-weight: 600; transition: all 0.3s ease;">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item h-100" style="display: flex; align-items: center; padding: 100px 0;">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 style="font-size: 4rem; font-weight: 900; margin-bottom: 20px; text-shadow: 3px 3px 12px rgba(0,0,0,0.5); letter-spacing: 2px; color: white;">HARGA MURAH MERIAH</h1>
                        <div style="height: 3px; width: 100px; background: linear-gradient(90deg, #FF9800, #FFC107); margin: 20px auto;"></div>
                        <p style="font-size: 1.15rem; margin-bottom: 40px; color: rgba(255,255,255,0.98); line-height: 2; max-width: 800px; margin-left: auto; margin-right: auto; text-shadow: 1px 1px 4px rgba(0,0,0,0.3);">Tidak perlu merogoh kocek dalam untuk menikmati hidangan lezat. Kami menyajikan berbagai pilihan menu khas Nusantara dengan rasa autentik, porsi yang mengenyangkan, serta kualitas terbaik. Dengan harga yang bersahabat, Anda bisa menikmati pengalaman kuliner yang memuaskan kapan saja bersama keluarga dan teman.</p>
                        <a href="{{ route('getuk.produk') }}" class="btn btn-lg btn-primary" style="background: linear-gradient(135deg, #FF9800, #FF6F00); border: none; padding: 12px 40px; font-weight: 600; transition: all 0.3s ease;">Lihat Produk</a>
                    </div>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHero" data-bs-slide="prev" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.3); opacity: 1; left: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 2px solid white;">
            <span style="font-size: 24px; color: white;">&#10094;</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHero" data-bs-slide="next" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.3); opacity: 1; right: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 2px solid white;">
            <span style="font-size: 24px; color: white;">&#10095;</span>
        </button>
    </div>
</div>

<style>
    .carousel-fade .carousel-item {
        opacity: 0;
        transition-property: opacity;
        transition-duration: 0.8s;
    }
    
    .carousel-fade .carousel-item.active {
        opacity: 1;
    }
    
    .hero-section {
        box-shadow: 0 8px 30px rgba(255, 152, 0, 0.2);
        position: relative;
    }
    
    .btn-primary {
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #FF6F00, #FF9800) !important;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 152, 0, 0.4) !important;
    }
    
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: rgba(255, 255, 255, 0.6) !important;
        transform: scale(1.1);
    }
    
    .carousel-indicators button.active {
        background-color: white !important;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    
    .carousel-indicators button:hover {
        background-color: rgba(255, 255, 255, 0.7) !important;
        transform: scale(1.2);
    }
    
    .btn-light:hover {
        background-color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2) !important;
    }
    
    .hero-section button:hover {
        opacity: 1 !important;
    }

    section {
        min-height: auto;
        overflow: visible;
        clear: both;
    }

    section.py-5 {
        padding: 60px 0 !important;
    }

    .carousel-inner {
        min-height: auto;
        height: 100%;
    }

    .carousel-item {
        min-height: auto;
        height: 100%;
        padding-top: 0;
        padding-bottom: 0;
    }
</style>

<!-- Featured Products Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">
            <i class="fas fa-star" style="color: #FF9800;"></i> Produk Unggulan
        </h2>
        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 product-card">
                    <img src="/Getuk.jpeg" class="card-img-top cursor-pointer" alt="Getuk Tradisional" data-id="1">
                    <div class="card-body">
                        <h5 class="card-title">Getuk</h5>
                        <p class="card-text text-muted small">Getuk singkong asli dengan cita rasa tradisional yang lezat.</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-success-custom">
                                <i class="fas fa-star"></i> 4.8 | 120 Rating
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="h5 text-accent">Rp 25.000</strong>
                            <a href="{{ route('getuk.detail', 1) }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 product-card">
                    <img src="/klepon.jpeg" class="card-img-top cursor-pointer" alt="Batik Chips" data-id="2">
                    <div class="card-body">
                        <h5 class="card-title">Klepon</h5>
                        <p class="card-text text-muted small">Keripik dengan motif batik yang unik dan rasa gurih maksimal.</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-success-custom">
                                <i class="fas fa-star"></i> 4.9 | 250 Rating
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="h5 text-accent">Rp 12.000</strong>
                            <a href="{{ route('getuk.detail', 2) }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 product-card">
                    <img src="/kue kucur.jpeg" class="card-img-top cursor-pointer" alt="Kue Lapis" data-id="3">
                    <div class="card-body">
                        <h5 class="card-title">Kue Kuncur</h5>
                        <p class="card-text text-muted small">Kue berlapis dengan warna-warna cerah dan rasa yang manis.</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-success-custom">
                                <i class="fas fa-star"></i> 4.7 | 180 Rating
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="h5 text-accent">Rp 20.000</strong>
                            <a href="{{ route('getuk.detail', 3) }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 product-card">
                    <img src="/kue rangi.jpeg" class="card-img-top cursor-pointer" alt="Teh Tradisional" data-id="4">
                    <div class="card-body">
                        <h5 class="card-title">Kue Rangi</h5>
                        <p class="card-text text-muted small">Teh pilihan dari berbagai daerah dengan aroma yang khas.</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-success-custom">
                                <i class="fas fa-star"></i> 4.6 | 95 Rating
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="h5 text-accent">Rp 10.000</strong>
                            <a href="{{ route('getuk.detail', 4) }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">
            <i class="fas fa-comments" style="color: #FF9800;"></i> Apa Kata Pelanggan
        </h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                        </div>
                        <p class="card-text">"Produk berkualitas tinggi dengan rasa yang autentik. Pengiriman cepat dan tepat waktu. Sangat merekomendasikan!"</p>
                        <h6 class="mb-0"><strong>Budi Santoso</strong></h6>
                        <small class="text-muted">Pelanggan Setia</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                        </div>
                        <p class="card-text">"Getuk-nya benar-benar enak, rasa tradisional yang autentik. Cocok untuk hadiah ke teman dan keluarga."</p>
                        <h6 class="mb-0"><strong>Siti Nurhaliza</strong></h6>
                        <small class="text-muted">Pembeli Produk</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                            <i class="fas fa-star" style="color: #FF9800;"></i>
                        </div>
                        <p class="card-text">"Layanan pelanggan yang responsif. Produk sampai dalam kondisi sempurna. Harga sangat terjangkau untuk kualitas seperti ini."</p>
                        <h6 class="mb-0"><strong>Ahmad Rizki</strong></h6>
                        <small class="text-muted">Reseller</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .category-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .category-card:hover {
        border-color: var(--primary-color);
        background-color: rgba(139, 69, 19, 0.02);
    }

    .product-card {
        overflow: hidden;
    }

    .product-card img {
        cursor: pointer;
        transition: transform 0.3s ease;
        height: 200px;
        object-fit: cover;
    }

    .product-card img:hover {
        transform: scale(1.1);
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>

<script>
    // Product image click handler for detail view
    document.querySelectorAll('.product-card img').forEach(img => {
        img.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            window.location.href = '{{ route("getuk.detail", ":id") }}'.replace(':id', productId);
        });
    });
</script>
@endsection
