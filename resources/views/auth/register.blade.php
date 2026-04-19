@extends('layouts.app')

@section('title', 'Register - Nusantara Rasa')

@section('content')
<style>
    /* Register Page Styling */
    .register-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 25%, #FF6F00 50%, #FF9800 75%, #FFB74D 100%);
        padding: 40px 20px;
    }

    .register-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        animation: slideUp 0.5s ease-out;
        max-width: 800px;
        width: 100%;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .register-card-header {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 100%);
        padding: 45px 40px;
        text-align: center;
        color: white;
    }

    .register-card-header h1 {
        font-size: 1.9rem;
        font-weight: 900;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .register-card-header p {
        font-size: 0.95rem;
        opacity: 0.95;
        margin: 0;
    }

    .register-card-body {
        padding: 40px;
        background: white;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        color: #222;
        font-size: 0.9rem;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
    }

    .form-label i {
        color: #FF9800;
        font-size: 0.9rem;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background-color: #fafafa;
        color: #222;
    }

    .form-control::placeholder {
        color: #999;
    }

    .form-control:focus {
        border-color: #FF9800;
        background-color: #fff9f5;
        color: #222;
        box-shadow: 0 0 0 4px rgba(255, 152, 0, 0.1);
        outline: none;
    }

    .form-control:hover {
        border-color: #FF9800;
    }

    .form-control.is-invalid {
        border-color: #F44336;
        background-color: #fff8f8;
    }

    .form-control.is-invalid:focus {
        border-color: #F44336;
        box-shadow: 0 0 0 4px rgba(244, 67, 54, 0.1);
    }

    .invalid-feedback {
        display: block;
        color: #F44336;
        font-size: 0.8rem;
        margin-top: 6px;
        font-weight: 500;
    }

    .form-text {
        color: #999;
        font-size: 0.8rem;
        margin-top: 6px;
        display: block;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .btn-register {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 100%);
        border: none;
        color: white;
        padding: 13px 28px;
        font-weight: 700;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        width: 100%;
        letter-spacing: 0.3px;
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.2);
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 152, 0, 0.3);
        background: linear-gradient(135deg, #FF7043 0%, #FF6F00 100%);
        color: white;
    }

    .btn-register:active {
        transform: translateY(-1px);
    }

    .form-check {
        margin-bottom: 20px;
        padding: 12px 14px;
        background: #fafafa;
        border-radius: 8px;
        border: 1px solid #e8e8e8;
        transition: all 0.2s ease;
    }

    .form-check:hover {
        background: #f5f5f5;
    }

    .form-check-input {
        width: 20px;
        height: 20px;
        border: 2.5px solid #ccc;
        cursor: pointer;
        transition: all 0.25s ease;
        background-color: white;
        margin: 0;
        margin-right: 10px;
        border-radius: 5px;
        flex-shrink: 0;
    }

    .form-check-input:checked {
        background-color: #FF9800;
        border-color: #FF9800;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    .form-check-label {
        cursor: pointer;
        transition: all 0.2s ease;
        color: #222;
        font-weight: 500;
        margin: 0;
        user-select: none;
        display: flex;
        align-items: center;
        padding: 0;
        font-size: 0.9rem;
        flex: 1;
    }

    .form-check-label a {
        color: #FF9800;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .form-check-label a:hover {
        color: #FF7043;
        text-decoration: underline;
    }

    .register-footer {
        text-align: center;
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid #e8e8e8;
    }

    .register-footer p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .register-footer a {
        color: #FF9800;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .register-footer a:hover {
        color: #FF7043;
        text-decoration: underline;
    }

    .alert {
        border: none;
        border-radius: 8px;
        padding: 14px 16px;
        margin-bottom: 20px;
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-danger {
        background: linear-gradient(135deg, rgba(244, 67, 54, 0.08) 0%, rgba(244, 67, 54, 0.04) 100%);
        border-left: 4px solid #F44336;
        color: #C62828;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .register-card-header {
            padding: 35px 30px;
        }

        .register-card-header h1 {
            font-size: 1.6rem;
        }

        .register-card-body {
            padding: 30px;
        }
    }
</style>

<div class="register-container">
    <div class="register-card">
        <!-- Card Header -->
        <div class="register-card-header">
            <h1>
                <i class="fas fa-user-plus"></i> Buat Akun Baru
            </h1>
            <p>Daftar dan mulai berbelanja di Nusantara Rasa</p>
        </div>

        <!-- Card Body -->
        <div class="register-card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex gap-2">
                        <div>
                            <strong><i class="fas fa-exclamation-circle"></i> Error!</strong>
                            @foreach ($errors->all() as $error)
                                <div class="mt-1">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('register.process') }}" id="registerForm">
                @csrf

                <!-- Name Fields Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label">
                            <i class="fas fa-user"></i> Nama Depan
                        </label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                               id="firstName" name="first_name" value="{{ old('first_name') }}" 
                               required placeholder="Nama depan">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lastName" class="form-label">
                            <i class="fas fa-user"></i> Nama Belakang
                        </label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                               id="lastName" name="last_name" value="{{ old('last_name') }}" 
                               required placeholder="Nama belakang">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" 
                           required placeholder="Alamat email Anda">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div class="form-group">
                    <label for="phone" class="form-label">
                        <i class="fas fa-phone"></i> Nomor Telepon
                    </label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" name="phone" value="{{ old('phone') }}" 
                           placeholder="+62 812-3456-7890">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address Field -->
                <div class="form-group">
                    <label for="address" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> Alamat Lengkap
                    </label>
                    <textarea class="form-control @error('address') is-invalid @enderror" 
                              id="address" name="address" rows="2" 
                              placeholder="Jl. Contoh No. 123">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- City & Postal Code Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="city" class="form-label">
                            <i class="fas fa-city"></i> Kota
                        </label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" 
                               id="city" name="city" value="{{ old('city') }}" 
                               placeholder="Kota Anda">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="postal_code" class="form-label">
                            <i class="fas fa-mailbox"></i> Kode Pos
                        </label>
                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror" 
                               id="postal_code" name="postal_code" value="{{ old('postal_code') }}" 
                               placeholder="12345">
                        @error('postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required 
                           placeholder="Minimal 8 karakter">
                    <span class="form-text">Gunakan kombinasi huruf besar, kecil, angka, dan simbol</span>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Confirmation Field -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-check"></i> Konfirmasi Password
                    </label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                           id="password_confirmation" name="password_confirmation" required 
                           placeholder="Ketik ulang password Anda">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Terms & Conditions -->
                <div class="form-check">
                    <input class="form-check-input @error('terms') is-invalid @enderror" 
                           type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        Saya setuju dengan 
                        <a href="#">Syarat & Ketentuan</a> dan 
                        <a href="#">Kebijakan Privasi</a>
                    </label>
                    @error('terms')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus"></i> Buat Akun
                </button>
            </form>

            <!-- Footer Links -->
            <div class="register-footer">
                <p>Sudah punya akun? 
                    <a href="{{ route('login') }}">Login di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
