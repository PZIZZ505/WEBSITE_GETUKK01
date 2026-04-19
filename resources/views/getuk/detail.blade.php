@extends('layouts.app')

@section('title', 'Detail Produk - Nusantara Rasa')

@section('content')
@php
    // Product Data
    $products = [
        1 => [
            'title' => 'GETUK',
            'image' => '/Getuk.jpeg',
            'price' => 25000,
            'rating' => 4.6,
            'reviews' => 250,
            'description' => 'Getuk kami dibuat dari singkong pilihan berkualitas tinggi, diproduksi dengan resep turun-temurun yang telah teruji formula dan rasanya. Setiap gigitan memberikan tekstur yang lembut dan rasa manis yang sempurna, dikombinasikan dengan kelapa parut segar dan gula alami.',
            'features' => ['Berta bersih: 200g per kemasan', 'Bahan baku pilihan 100% alami', 'Tanpa pengawet dan pewarna buatan', 'Cocok untuk berbagai acara dan hadiah'],
            'seller' => [
                'name' => 'Oh My Gethuk',
                'phone' => '0877-6676-7798',
                'address' => 'P1 8A, Jl. Blimbing Indah Megah, Araya, Kec. Blimbing, Kota Malang, Jawa Timur 65122',
                'rating' => 4.6,
                'map_url' => 'https://maps.app.goo.gl/kLQB5AoRYkVZWqkV8'
            ]
        ],
        2 => [
            'title' => 'KLEPON',
            'image' => '/klepon.jpeg',
            'price' => 12000,
            'rating' => 4.7,
            'reviews' => 280,
            'description' => 'Klepon kami adalah kue tradisional yang dibuat dengan bahan-bahan pilihan terbaik. Lembut dengan rasa gula merah yang nikmat, diselimuti kelapa parut yang lezat. Diproduksi menggunakan resep autentik yang telah terbukti kualitasnya.',
            'features' => ['Berta bersih: 150g per kemasan', 'Bahan premium pilihan', 'Tanpa pengawet dan pewarna buatan', 'Cocok untuk hadiah dan acara spesial'],
            'seller' => [
                'name' => 'Klepon Ku',
                'phone' => '0856-789-456',
                'address' => 'Pasar Jl. Guntur No.20, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119',
                'rating' => 4.7,
                'map_url' => 'https://maps.app.goo.gl/d4kkMMjTPHMRoeDg9'
            ]
        ],
        3 => [
            'title' => 'KUE KUNCUR',
            'image' => '/kue kucur.jpeg',
            'price' => 20000,
            'rating' => 4.7,
            'reviews' => 265,
            'description' => 'Kue Kuncur adalah camilan tradisional dari Jawa yang dibuat dari tepung beras dan kelapa. Teksturnya yang renyah dan lezat menjadi favorit banyak orang. Dibuat dengan proses tradisional dan vahan berkualitas tinggi untuk menghasilkan rasa yang autentik.',
            'features' => ['Berta bersih: 250g per kemasan', 'Bahan beras pilihan berkualitas', 'Renyah dan gurih', 'Awet hingga 21 hari'],
            'seller' => [
                'name' => 'UMKM Kue Kuncur Jaya',
                'phone' => '0821-555-789',
                'address' => 'Jl. Ahmad Yani No. 67, Yogyakarta, DI Yogyakarta 55143',
                'rating' => 4.7,
                'map_url' => 'https://maps.google.com/?q=Yogyakarta'
            ]
        ],
        4 => [
            'title' => 'KUE RANGI',
            'image' => '/kue rangi.jpeg',
            'price' => 10000,
            'rating' => 5.0,
            'reviews' => 300,
            'description' => 'Kue Rangi adalah kue tradisional yang memiliki rasa manis dan tekstur lembut yang sempurna. Dibuat dari bahan-bahan pilihan terbaik dengan proses yang teliti untuk menghasilkan kualitas premium. Cocok untuk berbagai acara dan momen spesial.',
            'features' => ['Berta bersih: 180g per kemasan', 'Bahan premium 100% alami', 'Tanpa MSG dan pengawet', 'Cocok untuk oleh-oleh'],
            'seller' => [
                'name' => 'UMKM Kue Rangi Berkah',
                'phone' => '0858-123-456',
                'address' => 'Jl. Gajah Mada No. 88, Bandung, Jawa Barat 40123',
                'rating' => 5.0,
                'map_url' => 'https://maps.google.com/?q=Bandung'
            ]
        ],
        5 => [
            'title' => 'ONDE ONDE',
            'image' => '/onde onde.jpeg',
            'price' => 14000,
            'rating' => 4.6,
            'reviews' => 240,
            'description' => 'Onde Onde adalah kue tradisional favorit yang memiliki cita rasa manis dan gurih yang seimbang. Dibuat dengan isian kacang hijau dan gula merah, diselimuti cokelat sehingga menciptakan kombinasi rasa yang lezat dan menggugah selera.',
            'features' => ['Berta bersih: 200g per kemasan', 'Isian kacang hijau premium', 'Cokelat berkualitas tinggi', 'Cocok untuk dessert atau hadiah'],
            'seller' => [
                'name' => 'UMKM Onde Onde Nusantara',
                'phone' => '0877-456-789',
                'address' => 'Jl. Diponegoro No. 120, Surabaya, Jawa Timur 60123',
                'rating' => 4.6,
                'map_url' => 'https://maps.google.com/?q=Surabaya'
            ]
        ],
        6 => [
            'title' => 'ES ANGSLE',
            'image' => '/Angsle.jpg',
            'price' => 8000,
            'rating' => 4.8,
            'reviews' => 220,
            'description' => 'Es Angsle adalah minuman tradisional yang menyegarkan dengan rasa manis dari gula merah. Dibuat dari bahan-bahan alami pilihan yang dipadukan dengan es serut yang halus. Minuman ini cocok untuk menemani hari-hari panas Anda.',
            'features' => ['Minuman segar tradisional', 'Dibuat dari bahan alami pilihan', 'Disajikan dengan es serut halus', 'Rasa manis alami dari gula merah'],
            'seller' => [
                'name' => 'UMKM Es Angsle Segar',
                'phone' => '0812-999-555',
                'address' => 'Jl. Sudirman No. 200, Surakarta, Jawa Tengah 57123',
                'rating' => 4.8,
                'map_url' => 'https://maps.google.com/?q=Surakarta'
            ]
        ],
        7 => [
            'title' => 'ES TAWON',
            'image' => '/Es Tawon.jpg',
            'price' => 10000,
            'rating' => 4.9,
            'reviews' => 290,
            'description' => 'Es Tawon adalah minuman tradisional yang unik dengan tekstur yang menarik. Dibuat dari bahan-bahan pilihan dan memiliki rasa yang istimewa yang tidak dapat Anda temukan di tempat lain. Minuman ini sangat menyegarkan dan cocok untuk dinikmati kapan saja.',
            'features' => ['Minuman istimewa tradisional', 'Tekstur unik yang lezat', 'Bahan berkualitas premium', 'Menyegarkan dan nikmat'],
            'seller' => [
                'name' => 'UMKM Es Tawon Premium',
                'phone' => '0898-777-666',
                'address' => 'Jl. Hayam Wuruk No. 150, Kediri, Jawa Timur 64123',
                'rating' => 4.9,
                'map_url' => 'https://maps.google.com/?q=Kediri'
            ]
        ],
        8 => [
            'title' => 'ES PLERET',
            'image' => '/Es Pleret .jpg',
            'price' => 7000,
            'rating' => 4.7,
            'reviews' => 270,
            'description' => 'Es Pleret adalah minuman tradisional yang simpel namun sangat menyegarkan. Dibuat dengan bahan-bahan natural yang berkualitas tinggi. Minuman ini sempurna untuk melepas dahaga di tengah kesibukan Anda sehari-hari.',
            'features' => ['Minuman simpel tradisional', 'Bahan berkualitas alami', 'Menyegarkan dan gurih', 'Harga terjangkau dan nikmat'],
            'seller' => [
                'name' => 'UMKM Es Pleret Asli',
                'phone' => '0822-333-444',
                'address' => 'Jl. Pahlawan No. 300, Blitar, Jawa Timur 66123',
                'rating' => 4.7,
                'map_url' => 'https://maps.google.com/?q=Blitar'
            ]
        ]
    ];

    // Get product ID from route
    $productId = request()->route('id') ?? 1;
    $product = $products[$productId] ?? $products[1];
    
    // Sample comments data - in real app would be from database
    $productComments = [
        $productId => isset($_SESSION["comments_$productId"]) ? json_decode($_SESSION["comments_$productId"], true) : []
    ];
@endphp

<style>
    :root {
        --accent-color: #8B4513;
        --light-accent: #D2B48C;
    }

    .product-detail-container {
        background: #D4B59A;
    }

    .product-image-wrapper {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .product-image {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 12px;
    }

    .rating-section {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .rating-stars {
        display: flex;
        gap: 4px;
        font-size: 18px;
    }

    .rating-text {
        font-size: 16px;
        font-weight: 600;
    }

    .rating-reviews {
        color: #666;
        font-size: 14px;
        margin-top: 6px;
    }

    .price-section {
        background: linear-gradient(135deg, #fff9f0 0%, #ffe8d6 100%);
        border-left: 4px solid var(--accent-color);
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 24px;
    }

    .price-display {
        font-size: 28px;
        font-weight: 700;
        color: var(--accent-color);
        margin-bottom: 6px;
    }

    .price-label {
        color: #666;
        font-size: 13px;
        font-weight: 500;
    }

    .section-card {
        background: white;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 20px;
        border: 1px solid #e5e5e5;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
        color: #1a1a1a;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: var(--accent-color);
        font-size: 20px;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .features-list li {
        padding: 10px 0;
        padding-left: 24px;
        position: relative;
        color: #555;
        border-bottom: 1px solid #f0f0f0;
    }

    .features-list li:last-child {
        border-bottom: none;
    }

    .features-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: var(--accent-color);
        font-weight: bold;
        font-size: 16px;
    }

    .seller-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
    }

    .seller-item {
        padding: 16px;
        background: #f9f9f9;
        border-radius: 8px;
    }

    .seller-label {
        font-size: 12px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }

    .seller-value {
        font-size: 14px;
        color: #1a1a1a;
        font-weight: 500;
    }

    .seller-value a {
        color: var(--accent-color);
        text-decoration: none;
    }

    .seller-value a:hover {
        text-decoration: underline;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        margin-top: 24px;
        flex-wrap: wrap;
    }

    .btn-custom {
        flex: 1;
        min-width: 150px;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary-custom {
        background: var(--accent-color);
        color: white;
    }

    .btn-primary-custom:hover {
        background: #6b3410;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
    }

    .btn-secondary-custom {
        background: white;
        color: var(--accent-color);
        border: 2px solid var(--accent-color);
    }

    .btn-secondary-custom:hover {
        background: var(--accent-color);
        color: white;
    }

    /* Comments Section */
    .comments-container {
        background: white;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid #e5e5e5;
    }

    .comment-form {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
    }

    .form-control textarea {
        resize: vertical;
        min-height: 100px;
    }

    .rating-input {
        display: flex;
        gap: 8px;
        font-size: 24px;
    }

    .rating-input i {
        cursor: pointer;
        color: #ddd;
        transition: all 0.2s ease;
    }

    .rating-input i:hover,
    .rating-input i.active {
        color: #ffc107;
        transform: scale(1.2);
    }

    .form-button {
        background: var(--accent-color);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-button:hover {
        background: #6b3410;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
    }

    .comment-item {
        background: white;
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 16px;
        transition: all 0.3s ease;
    }

    .comment-item:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .comment-user {
        font-weight: 600;
        color: #1a1a1a;
        font-size: 15px;
    }

    .comment-time {
        color: #999;
        font-size: 13px;
    }

    .comment-rating {
        display: flex;
        gap: 4px;
        font-size: 16px;
    }

    .comment-text {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 12px;
    }

    .comment-product {
        display: inline-block;
        background: #f0f0f0;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
        color: var(--accent-color);
        font-weight: 600;
    }

    .no-comments {
        text-align: center;
        padding: 40px 20px;
        color: #999;
    }

    .no-comments i {
        font-size: 48px;
        color: #ddd;
        margin-bottom: 16px;
        display: block;
    }

    .tabs-nav {
        display: flex;
        gap: 20px;
        border-bottom: 2px solid #e5e5e5;
        margin-bottom: 30px;
    }

    .tab-item {
        padding: 12px 4px;
        border-bottom: 3px solid transparent;
        cursor: pointer;
        font-weight: 600;
        color: #999;
        transition: all 0.3s ease;
        position: relative;
        bottom: -2px;
    }

    .tab-item.active {
        color: var(--accent-color);
        border-bottom-color: var(--accent-color);
    }

    @media (max-width: 768px) {
        .product-title {
            font-size: 1.5rem;
        }

        .price-display {
            font-size: 24px;
        }

        .seller-info {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-custom {
            min-width: unset;
        }

        .rating-section {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="product-detail-container py-5">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb" style="background: transparent; padding: 0;">
                <li class="breadcrumb-item"><a href="{{ route('getuk.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('getuk.produk') }}">Produk</a></li>
                <li class="breadcrumb-item active">{{ $product['title'] }}</li>
            </ol>
        </nav>

        <!-- Main Product Section -->
        <div class="row g-4 mb-5">
            <!-- Product Image -->
            <div class="col-lg-5">
                <div class="product-image-wrapper">
                    <img src="{{ $product['image'] }}" class="product-image" alt="{{ $product['title'] }}">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-7">
                <h1 class="product-title">{{ $product['title'] }}</h1>

                <!-- Rating -->
                <div class="rating-section">
                    <div>
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product['rating']))
                                    <i class="fas fa-star" style="color: #ffc107;"></i>
                                @elseif($i - $product['rating'] < 1)
                                    <i class="fas fa-star-half-alt" style="color: #ffc107;"></i>
                                @else
                                    <i class="fas fa-star" style="color: #ddd;"></i>
                                @endif
                            @endfor
                            <span class="rating-text" style="margin-left: 8px;">{{ $product['rating'] }}/5.0</span>
                        </div>
                        <a href="#comments" class="rating-reviews"><i class="fas fa-comment"></i> {{ $product['reviews'] }} ulasan</a>
                    </div>
                </div>

                <!-- Price -->
                <div class="price-section">
                    <div class="price-display">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    <div class="price-label"><i class="fas fa-tag"></i> Harga Spesial Pelanggan</div>
                </div>

                <!-- Description -->
                <div class="section-card mb-3">
                    <h5 class="section-title" style="margin-bottom: 12px;">
                        <i class="fas fa-info-circle"></i> Deskripsi Produk
                    </h5>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 16px;">{{ $product['description'] }}</p>
                    
                    <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a;">Spesifikasi & Fitur:</h6>
                    <ul class="features-list">
                        @foreach($product['features'] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Seller Information -->
        <div class="section-card mb-5">
            <h5 class="section-title">
                <i class="fas fa-store"></i> Informasi Penjual
            </h5>
            
            <div class="seller-info">
                <div class="seller-item">
                    <span class="seller-label">Nama Penjual</span>
                    <div class="seller-value">{{ $product['seller']['name'] }}</div>
                </div>
                <div class="seller-item">
                    <span class="seller-label">Nomor Telepon</span>
                    <div class="seller-value">
                        <a href="tel:{{ str_replace('-', '', $product['seller']['phone']) }}">
                            <i class="fas fa-phone"></i> {{ $product['seller']['phone'] }}
                        </a>
                    </div>
                </div>
                <div class="seller-item">
                    <span class="seller-label">Alamat</span>
                    <div class="seller-value">{{ $product['seller']['address'] }}</div>
                </div>
                <div class="seller-item">
                    <span class="seller-label">Rating Penjual</span>
                    <div class="seller-value">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product['seller']['rating']))
                                <i class="fas fa-star" style="color: #ffc107; margin-right: 2px;"></i>
                            @elseif($i - $product['seller']['rating'] < 1)
                                <i class="fas fa-star-half-alt" style="color: #ffc107; margin-right: 2px;"></i>
                            @else
                                <i class="fas fa-star" style="color: #ddd; margin-right: 2px;"></i>
                            @endif
                        @endfor
                        <strong style="margin-left: 8px;">{{ $product['seller']['rating'] }}/5.0</strong>
                    </div>
                </div>
            </div>

            <a href="{{ $product['seller']['map_url'] }}" target="_blank" class="btn-custom btn-secondary-custom" style="margin-top: 20px; display: inline-flex; align-items: center; justify-content: center;">
                <i class="fas fa-map-marker-alt"></i>&nbsp; Lihat Lokasi di Maps
            </a>
        </div>

        <!-- Comments Section -->
        <div id="comments" class="comments-container mb-5">
            <h5 class="section-title mb-4">
                <i class="fas fa-comments"></i> Komentar & Ulasan Pelanggan
            </h5>

            <!-- Tabs -->
            <div class="tabs-nav">
                <div class="tab-item active" onclick="switchTab(event, 'comments-list')">
                    <i class="fas fa-list"></i> Semua Komentar
                </div>
                <div class="tab-item" onclick="switchTab(event, 'add-comment')">
                    <i class="fas fa-plus-circle"></i> Tambah Komentar
                </div>
            </div>

            <!-- Comments List Tab -->
            <div id="comments-list" class="tab-content active">
                <div id="commentsList">
                    @if(empty($productComments[$productId]))
                        <div class="no-comments">
                            <i class="fas fa-inbox"></i>
                            <h6 style="color: #666;">Belum ada komentar</h6>
                            <p style="font-size: 13px;">Jadilah yang pertama memberikan komentar untuk produk {{ $product['title'] }}!</p>
                        </div>
                    @else
                        @foreach($productComments[$productId] as $comment)
                            <div class="comment-item">
                                <div class="comment-header">
                                    <div>
                                        <div class="comment-user">{{ $comment['name'] }}</div>
                                        <div class="comment-time"><i class="fas fa-clock"></i> {{ $comment['time'] }}</div>
                                    </div>
                                    <div class="comment-rating">
                                        @for($i = 0; $i < $comment['rating']; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="comment-text">{{ $comment['text'] }}</p>
                                <span class="comment-product"><i class="fas fa-tag"></i> {{ $product['title'] }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Add Comment Tab -->
            <div id="add-comment" class="tab-content" style="display: none;">
                <div class="comment-form">
                    <form id="commentForm" onsubmit="submitComment(event, {{ $productId }})">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
                            <div class="form-group">
                                <label class="form-label">Nama Anda</label>
                                <input type="text" class="form-control" id="commentName" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="commentEmail" placeholder="nama@email.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Rating Produk</label>
                            <div class="rating-input" id="ratingInput">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star" data-rating="{{ $i }}" title="{{ $i }} bintang"></i>
                                @endfor
                            </div>
                            <input type="hidden" id="selectedRating" value="0">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Komentar Anda</label>
                            <textarea class="form-control" id="commentText" placeholder="Bagikan pengalaman Anda dengan produk {{ $product['title'] }}..." required></textarea>
                        </div>

                        <button type="submit" class="form-button">
                            <i class="fas fa-check-circle"></i> Kirim Komentar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab switching
    function switchTab(e, tabName) {
        e.preventDefault();
        
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.style.display = 'none';
        });
        
        // Remove active class from all tabs
        document.querySelectorAll('.tab-item').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById(tabName).style.display = 'block';
        event.target.closest('.tab-item').classList.add('active');
    }

    // Rating system
    let selectedRating = 0;
    const ratingInput = document.getElementById('ratingInput');
    
    ratingInput.querySelectorAll('i').forEach(star => {
        star.addEventListener('click', function() {
            selectedRating = parseInt(this.getAttribute('data-rating'));
            document.getElementById('selectedRating').value = selectedRating;
            updateRatingDisplay();
        });
        
        star.addEventListener('mouseover', function() {
            const hoverRating = parseInt(this.getAttribute('data-rating'));
            ratingInput.querySelectorAll('i').forEach(s => {
                if (parseInt(s.getAttribute('data-rating')) <= hoverRating) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });
    });
    
    ratingInput.addEventListener('mouseleave', updateRatingDisplay);
    
    function updateRatingDisplay() {
        ratingInput.querySelectorAll('i').forEach(s => {
            if (parseInt(s.getAttribute('data-rating')) <= selectedRating) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });
    }

    // Submit comment
    function submitComment(e, productId) {
        e.preventDefault();
        
        const name = document.getElementById('commentName').value.trim();
        const email = document.getElementById('commentEmail').value.trim();
        const rating = parseInt(document.getElementById('selectedRating').value);
        const text = document.getElementById('commentText').value.trim();
        
        if (!name || !email || rating === 0 || !text) {
            alert('Mohon isi semua field termasuk rating!');
            return;
        }
        
        // Create comment object
        const comment = {
            name: name,
            email: email,
            rating: rating,
            text: text,
            time: 'Baru saja'
        };
        
        // Get existing comments from localStorage
        let comments = JSON.parse(localStorage.getItem(`comments_${productId}`) || '[]');
        
        // Add new comment
        comments.unshift(comment);
        
        // Save to localStorage
        localStorage.setItem(`comments_${productId}`, JSON.stringify(comments));
        
        // Create comment HTML
        const starsHTML = '<i class="fas fa-star"></i>'.repeat(rating);
        const commentHTML = `
            <div class="comment-item">
                <div class="comment-header">
                    <div>
                        <div class="comment-user">${name}</div>
                        <div class="comment-time"><i class="fas fa-clock"></i> Baru saja</div>
                    </div>
                    <div class="comment-rating">${starsHTML}</div>
                </div>
                <p class="comment-text">${text}</p>
                <span class="comment-product"><i class="fas fa-tag"></i> ${document.querySelector('.product-title').textContent}</span>
            </div>
        `;
        
        // Update UI
        const commentsList = document.getElementById('commentsList');
        
        // Remove "no comments" message if exists
        const noComments = commentsList.querySelector('.no-comments');
        if (noComments) {
            noComments.remove();
        }
        
        // Add new comment at the beginning
        commentsList.insertAdjacentHTML('afterbegin', commentHTML);
        
        // Reset form
        document.getElementById('commentForm').reset();
        selectedRating = 0;
        updateRatingDisplay();
        
        // Show success message
        alert('Komentar berhasil ditambahkan! Komentar Anda akan ditampilkan untuk produk ini.');
        
        // Switch back to comments list tab
        document.getElementById('comments-list').style.display = 'block';
        document.getElementById('add-comment').style.display = 'none';
        document.querySelectorAll('.tab-item')[0].classList.add('active');
        document.querySelectorAll('.tab-item')[1].classList.remove('active');
    }

    // Load comments from localStorage on page load
    window.addEventListener('DOMContentLoaded', function() {
        const productId = {{ $productId }};
        const comments = JSON.parse(localStorage.getItem(`comments_${productId}`) || '[]');
        
        if (comments.length > 0) {
            const commentsList = document.getElementById('commentsList');
            
            // Clear existing content
            const noComments = commentsList.querySelector('.no-comments');
            if (noComments) {
                noComments.remove();
            }
            commentsList.innerHTML = '';
            
            // Add all comments
            comments.forEach(comment => {
                const starsHTML = '<i class="fas fa-star"></i>'.repeat(comment.rating);
                const productTitle = document.querySelector('.product-title').textContent;
                const commentHTML = `
                    <div class="comment-item">
                        <div class="comment-header">
                            <div>
                                <div class="comment-user">${comment.name}</div>
                                <div class="comment-time"><i class="fas fa-clock"></i> ${comment.time}</div>
                            </div>
                            <div class="comment-rating">${starsHTML}</div>
                        </div>
                        <p class="comment-text">${comment.text}</p>
                        <span class="comment-product"><i class="fas fa-tag"></i> ${productTitle}</span>
                    </div>
                `;
                commentsList.insertAdjacentHTML('beforeend', commentHTML);
            });
        }
    });
</script>

@endsection
