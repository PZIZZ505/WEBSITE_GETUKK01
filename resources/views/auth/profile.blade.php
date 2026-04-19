@extends('layouts.app')

@section('title', 'Profil Pengguna - Nusantara Rasa')

@section('content')
@php
    $firstName = $user['first_name'] ?? (isset($user['name']) ? explode(' ', $user['name'])[0] : '');
    $lastName = $user['last_name'] ?? (isset($user['name']) ? trim(str_replace($firstName, '', $user['name'])) : '');
    $email = $user['email'] ?? '';
    $phone = $user['phone'] ?? '';
    $address = $user['address'] ?? '';
    $city = $user['city'] ?? '';
    $postal_code = $user['postal_code'] ?? '';
@endphp

<style>
    .profile-header {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 25%, #FF6F00 50%, #FF9800 75%, #FFB74D 100%);
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
    }

    .profile-header h1 {
        font-size: 2.5rem;
        font-weight: 900;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        margin-bottom: 10px;
    }

    .profile-header p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
    }

    .breadcrumb-item a {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s;
    }

    .breadcrumb-item a:hover {
        opacity: 0.8;
    }

    .breadcrumb-item.active {
        color: rgba(255,255,255,0.8);
    }

    .sidebar-menu {
        position: sticky;
        top: 100px;
    }

    .sidebar-menu .nav-link {
        border-left: 4px solid transparent;
        transition: all 0.3s ease;
        padding: 12px 20px;
        color: #333;
        font-weight: 500;
    }

    .sidebar-menu .nav-link:hover {
        background: #f8f9fa;
        border-left-color: #FF9800;
    }

    .sidebar-menu .nav-link.active {
        background: linear-gradient(90deg, rgba(255, 152, 0, 0.1) 0%, transparent 100%);
        border-left-color: #FF9800;
        color: #FF9800;
    }

    .profile-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .profile-card:hover {
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .profile-card-header {
        background: linear-gradient(90deg, #FF9800 0%, #FF7043 100%);
        padding: 25px;
        border: none;
    }

    .profile-card-header h5 {
        color: white;
        font-weight: 700;
        margin: 0;
        font-size: 1.3rem;
    }

    .profile-info-section {
        background: linear-gradient(135deg, rgba(255, 152, 0, 0.05) 0%, rgba(255, 112, 67, 0.05) 100%);
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
    }

    .avatar-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .avatar-circle {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        border: 6px solid #FF9800;
        box-shadow: 0 8px 20px rgba(255, 152, 0, 0.2);
        margin-bottom: 20px;
    }

    .upload-photo-btn {
        background: linear-gradient(135deg, #FF9800, #FF7043);
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        cursor: pointer;
    }

    .upload-photo-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(255, 152, 0, 0.3);
        background: linear-gradient(135deg, #FF7043, #FF6F00);
    }

    .user-info-item {
        margin-bottom: 15px;
        padding: 12px;
        background: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
    }

    .user-info-label {
        font-weight: 700;
        color: #FF9800;
        min-width: 150px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .user-info-value {
        color: #333;
        font-size: 0.95rem;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: #FF9800;
        box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.1);
    }

    .form-control:hover {
        border-color: #FF9800;
    }

    .btn-save {
        background: linear-gradient(135deg, #FF9800, #FF7043);
        border: none;
        color: white;
        padding: 12px 35px;
        font-weight: 700;
        border-radius: 8px;
        transition: all 0.3s;
        margin-top: 20px;
    }

    .btn-save:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 152, 0, 0.3);
        background: linear-gradient(135deg, #FF7043, #FF6F00);
        color: white;
    }

    .badge-status {
        background: linear-gradient(90deg, #4CAF50, #45a049);
        padding: 6px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .alert-success {
        background: linear-gradient(90deg, rgba(76, 175, 80, 0.08) 0%, rgba(76, 175, 80, 0.04) 100%);
        border: 2px solid #4CAF50;
        color: #2e7d32;
        border-radius: 8px;
    }

    /* Mobile Responsive */
    @media (max-width: 1024px) {
        .sidebar-menu {
            top: 80px;
        }

        .profile-card-header {
            padding: 20px;
        }

        .profile-card-header h5 {
            font-size: 1.2rem;
        }

        .profile-info-section {
            padding: 24px;
        }
    }

    @media (max-width: 768px) {
        .profile-header {
            padding: 40px 0;
            margin-bottom: 30px;
        }

        .profile-header h1 {
            font-size: 1.8rem;
            margin-bottom: 8px;
        }

        .profile-header p {
            font-size: 1rem;
        }

        .sidebar-menu {
            position: relative !important;
            top: auto !important;
            margin-bottom: 30px;
        }

        .sidebar-menu .nav-link {
            padding: 12px 16px;
            font-size: 0.95rem;
        }

        .profile-card {
            margin-bottom: 24px;
        }

        .profile-card-header {
            padding: 18px;
        }

        .profile-card-header h5 {
            font-size: 1.1rem;
        }

        .card-body {
            padding: 28px !important;
        }

        .profile-info-section {
            padding: 20px;
        }

        .avatar-circle {
            width: 140px;
            height: 140px;
            margin-bottom: 16px;
        }

        .upload-photo-btn {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .user-info-item {
            margin-bottom: 12px;
            padding: 10px;
            flex-direction: column;
            align-items: flex-start;
        }

        .user-info-label {
            min-width: auto;
            margin-bottom: 6px;
        }

        .user-info-value {
            font-size: 0.9rem;
        }

        .form-label {
            font-size: 0.9rem;
            margin-bottom: 6px;
        }

        .form-control {
            padding: 10px 12px;
            font-size: 0.9rem;
        }

        .btn-save {
            padding: 10px 28px;
            font-size: 0.9rem;
            margin-top: 16px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .row.g-4 > [class*='col-'] {
            padding-left: 8px;
            padding-right: 8px;
        }

        .col-md-3, .col-md-9 {
            width: 100% !important;
        }
    }

    @media (max-width: 576px) {
        .container.py-5 {
            padding: 20px 0 !important;
        }

        .profile-header {
            padding: 30px 0;
            margin-bottom: 20px;
        }

        .profile-header h1 {
            font-size: 1.4rem;
            margin-bottom: 6px;
        }

        .profile-header p {
            font-size: 0.9rem;
        }

        .profile-header i {
            font-size: 1.3rem;
        }

        .breadcrumb {
            font-size: 0.8rem;
            padding: 6px 0;
        }

        .breadcrumb-item {
            display: none;
        }

        .breadcrumb-item.active {
            display: inline;
        }

        .sidebar-menu {
            margin-bottom: 24px;
        }

        .sidebar-menu .nav-link {
            padding: 10px 14px;
            font-size: 0.85rem;
        }

        .sidebar-menu .nav-link i {
            font-size: 0.95rem;
        }

        .profile-card {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .profile-card-header {
            padding: 14px;
        }

        .profile-card-header h5 {
            font-size: 0.95rem;
        }

        .profile-card-header i {
            font-size: 0.95rem;
        }

        .card-body {
            padding: 16px !important;
        }

        .profile-info-section {
            padding: 16px;
            background: rgba(255, 152, 0, 0.04);
            margin-bottom: 20px;
        }

        .avatar-section {
            padding: 16px 0;
        }

        .avatar-circle {
            width: 120px;
            height: 120px;
            border-width: 4px;
            margin-bottom: 12px;
        }

        .upload-photo-btn {
            padding: 7px 14px;
            font-size: 0.8rem;
            width: 100%;
        }

        .user-info-item {
            margin-bottom: 10px;
            padding: 8px;
            flex-direction: row;
            align-items: center;
            background: #fafafa;
            border-radius: 6px;
        }

        .user-info-label {
            min-width: 100px;
            font-size: 0.8rem;
            gap: 4px;
            margin-bottom: 0;
        }

        .user-info-label i {
            font-size: 0.9rem;
        }

        .user-info-value {
            font-size: 0.8rem;
            color: #555;
        }

        .form-label {
            font-size: 0.8rem;
            gap: 5px;
            margin-bottom: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .form-label i {
            font-size: 0.8rem;
        }

        .form-control {
            padding: 9px 11px;
            font-size: 0.85rem;
            border-width: 2px;
            border-radius: 6px;
            min-height: 38px;
        }

        .form-control::placeholder {
            font-size: 0.85rem;
        }

        .btn-save {
            padding: 10px 16px;
            font-size: 0.85rem;
            margin-top: 12px;
            width: 100%;
            min-height: 40px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-row {
            gap: 10px;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        .row > [class*='col-'] {
            padding-left: 0;
            padding-right: 0;
            margin-bottom: 8px;
        }

        .mb-3 {
            margin-bottom: 12px !important;
        }

        .mb-2 {
            margin-bottom: 8px !important;
        }

        .alert {
            padding: 10px 12px;
            margin-bottom: 16px;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        .alert i {
            font-size: 0.95rem;
        }

        .badge-status {
            font-size: 0.75rem;
            padding: 4px 12px;
        }

        .col-lg-3, .col-lg-9, .col-md-3, .col-md-9 {
            width: 100% !important;
        }
    }
</style>

<div class="profile-header">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('getuk.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Profil Saya</li>
            </ol>
        </nav>

        <!-- Header -->
        <h1 class="mb-2">
            <i class="fas fa-user-circle"></i> Profil Saya
        </h1>
        <p>Kelola informasi pengguna dan pengaturan akun Anda</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar Menu -->
        <div class="col-lg-3">
            <div class="card sidebar-menu" style="border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <div class="nav flex-column">
                    <a class="nav-link active" href="#" style="border-radius: 0;">
                        <i class="fas fa-user" style="color: #FF9800; margin-right: 8px;"></i> Data Pribadi
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- Profile Section -->
            <div id="profile-section" class="content-section">
                <div class="profile-card">
                    <div class="profile-card-header">
                        <h5><i class="fas fa-user"></i> Data Pribadi</h5>
                    </div>
                    <div class="card-body" style="padding: 40px;">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf

                            <!-- Profile Info Section -->
                            <div class="profile-info-section">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="avatar-section">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($firstName . ' ' . $lastName) }}&size=180&background=FF9800&color=fff" 
                                                 class="avatar-circle" alt="Avatar">
                                            <button type="button" class="upload-photo-btn">
                                                <i class="fas fa-camera"></i> Ubah Foto
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="user-info-item">
                                            <div class="user-info-label">
                                                <i class="fas fa-envelope" style="color: #FF9800;"></i> Email:
                                            </div>
                                            <div class="user-info-value">{{ $email }}</div>
                                        </div>
                                        <div class="user-info-item">
                                            <div class="user-info-label">
                                                <i class="fas fa-user-tag" style="color: #FF9800;"></i> Nama:
                                            </div>
                                            <div class="user-info-value">{{ trim($firstName . ' ' . $lastName) }}</div>
                                        </div>
                                        <div class="user-info-item">
                                            <div class="user-info-label">
                                                <i class="fas fa-phone" style="color: #FF9800;"></i> Telepon:
                                            </div>
                                            <div class="user-info-value">{{ $phone ?: '-' }}</div>
                                        </div>
                                        <div class="user-info-item">
                                            <div class="user-info-label">
                                                <i class="fas fa-shield-alt" style="color: #FF9800;"></i> Status:
                                            </div>
                                            <span class="badge-status">Aktif</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr style="margin: 40px 0; border: 1px solid #e0e0e0;">

                            <!-- Form Fields -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">
                                        <i class="fas fa-user" style="color: #FF9800;"></i> Nama Depan
                                    </label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" 
                                           value="{{ old('first_name', $firstName) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">
                                        <i class="fas fa-user" style="color: #FF9800;"></i> Nama Belakang
                                    </label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" 
                                           value="{{ old('last_name', $lastName) }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope" style="color: #FF9800;"></i> Email
                                </label>
                                <input type="email" class="form-control" id="email" value="{{ $email }}" disabled 
                                       style="background-color: #f5f5f5; cursor: not-allowed;">
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">
                                    <i class="fas fa-phone" style="color: #FF9800;"></i> Nomor Telepon
                                </label>
                                <input type="tel" class="form-control" id="phone" name="phone" 
                                       value="{{ old('phone', $phone) }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label">
                                    <i class="fas fa-map-marker-alt" style="color: #FF9800;"></i> Alamat Utama
                                </label>
                                <textarea class="form-control" id="address" name="address" rows="4" required>{{ old('address', $address) }}</textarea>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="city" class="form-label">
                                        <i class="fas fa-city" style="color: #FF9800;"></i> Kota
                                    </label>
                                    <input type="text" class="form-control" id="city" name="city" 
                                           value="{{ old('city', $city ?? 'Jakarta') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="postal_code" class="form-label">
                                        <i class="fas fa-mailbox" style="color: #FF9800;"></i> Kode Pos
                                    </label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" 
                                           value="{{ old('postal_code', $postal_code ?? '12345') }}" required>
                                </div>
                            </div>

                            <div class="mt-5 pt-4" style="border-top: 2px solid #e0e0e0;">
                                <button type="submit" class="btn btn-save">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

