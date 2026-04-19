@extends('layouts.app')

@section('title', 'Kontak UMKM Getuk')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="mb-3" style="font-size: 2.5rem; font-weight: 700;">Hubungi UMKM Getuk</h1>
        <p class="lead text-muted">Kami siap melayani pesanan dan menjawab pertanyaan Anda</p>
    </div>

    <div class="row g-4">
        <!-- Contact Information Section -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title mb-4">Informasi Kontak</h3>
                    
                    <!-- Alamat -->
                    <div class="mb-4">
                        <div class="d-flex mb-2">
                            <div style="color: #D2691E; font-size: 1.5rem; margin-right: 15px;">📍</div>
                            <div>
                                <h5 class="mb-1">Alamat</h5>
                                <p class="text-muted mb-0">Jl. Contoh No. 123<br>Kota Getuk, Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="mb-4">
                        <div class="d-flex mb-2">
                            <div style="color: #228B22; font-size: 1.5rem; margin-right: 15px;">📱</div>
                            <div>
                                <h5 class="mb-1">Telepon</h5>
                                <p class="mb-0">
                                    <a href="tel:+628123456789" class="text-decoration-none">+62 812-3456-7890</a><br>
                                    <a href="tel:+628123456790" class="text-decoration-none">+62 812-3456-7891</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <div class="d-flex mb-2">
                            <div style="color: #8B4513; font-size: 1.5rem; margin-right: 15px;">✉️</div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0">
                                    <a href="mailto:info@getukumkm.com" class="text-decoration-none">info@getukumkm.com</a><br>
                                    <a href="mailto:pesanan@getukumkm.com" class="text-decoration-none">pesanan@getukumkm.com</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="mb-4">
                        <div class="d-flex mb-2">
                            <div style="color: #DAA520; font-size: 1.5rem; margin-right: 15px;">🕐</div>
                            <div>
                                <h5 class="mb-1">Jam Operasional</h5>
                                <p class="text-muted mb-1"><strong>Senin - Jumat:</strong> 08:00 - 17:00</p>
                                <p class="text-muted mb-1"><strong>Sabtu:</strong> 09:00 - 15:00</p>
                                <p class="text-muted mb-0"><strong>Minggu:</strong> Tutup</p>
                            </div>
                        </div>
                    </div>

                    <!-- Media Sosial -->
                    <div class="mt-5 pt-4 border-top">
                        <h5 class="mb-3">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="https://facebook.com/getukumkm" target="_blank" class="btn btn-sm" style="background-color: #1877F2; color: white;">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="https://instagram.com/getukumkm" target="_blank" class="btn btn-sm" style="background-color: #E4405F; color: white;">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="https://wa.me/628123456789" target="_blank" class="btn btn-sm" style="background-color: #25D366; color: white;">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title mb-4">Kirim Pesan</h3>
                    <form>
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" required>
                        </div>

                        <!-- Subjek -->
                        <div class="mb-3">
                            <label for="subjek" class="form-label">Subjek</label>
                            <select class="form-select" id="subjek" name="subjek" required>
                                <option value="">-- Pilih Subjek --</option>
                                <option value="pemesanan">Pertanyaan Pemesanan</option>
                                <option value="produk">Pertanyaan Produk</option>
                                <option value="kolaborasi">Kolaborasi Bisnis</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Pesan -->
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tuliskan pesan Anda..." required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #8B4513; border-color: #8B4513; font-weight: 600;">
                            Kirim Pesan
                        </button>
                        <a href="{{ route('getuk.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                            Kembali ke Beranda
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Maps Section (Optional) -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-3">Lokasi Kami</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d110.40298!3d-7.797068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNyc0Ny40NiJTIDExMMKwMjQnMDEuMiJF!5e0!3m2!1sen!2sid!4v1234567890" 
                            width="100%" height="400" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="row mt-5 mb-5">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm" style="background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%); color: white; border: none;">
                <div class="card-body text-center">
                    <h4 class="card-title mb-3">Dapatkan Penawaran Eksklusif</h4>
                    <p class="mb-4">Berlangganan newsletter kami untuk mendapatkan promo spesial dan informasi produk terbaru.</p>
                    <form class="d-flex gap-2 justify-content-center">
                        <input type="email" class="form-control" style="max-width: 300px;" placeholder="Masukkan email Anda" required>
                        <button type="submit" class="btn btn-light" style="font-weight: 600;">Berlangganan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .card {
        border: 1px solid #e9ecef;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(139, 69, 19, 0.15) !important;
    }
    
    .btn-primary {
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #6d3410 !important;
        border-color: #6d3410 !important;
    }
    
    a[href^="tel:"], a[href^="mailto:"] {
        color: #8B4513;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    a[href^="tel:"]:hover, a[href^="mailto:"]:hover {
        color: #D2691E;
        text-decoration: underline;
    }
</style>
@endsection
