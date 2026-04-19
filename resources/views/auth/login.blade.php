@extends('layouts.app')

@section('title', 'Login - Nusantara Rasa')

@section('content')
<style>
    /* Login Page Styling */
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 25%, #FF6F00 50%, #FF9800 75%, #FFB74D 100%);
        padding: 40px 20px;
    }

    .login-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        animation: slideUp 0.5s ease-out;
        max-width: 450px;
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

    .login-card-header {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 100%);
        padding: 50px 40px;
        text-align: center;
        color: white;
    }

    .login-card-header h1 {
        font-size: 2rem;
        font-weight: 900;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
    }

    .login-card-header p {
        font-size: 1rem;
        opacity: 0.95;
        margin: 0;
    }

    .login-card-body {
        padding: 40px;
        background: white;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        color: #222;
        font-size: 0.95rem;
        margin-bottom: 10px;
        letter-spacing: 0.3px;
    }

    .form-label i {
        color: #FF9800;
        font-size: 1rem;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 14px 16px;
        font-size: 0.95rem;
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

    .btn-login {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 100%);
        border: none;
        color: white;
        padding: 14px 28px;
        font-weight: 700;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        width: 100%;
        letter-spacing: 0.3px;
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.2);
    }

    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 152, 0, 0.3);
        background: linear-gradient(135deg, #FF7043 0%, #FF6F00 100%);
        color: white;
    }

    .btn-login:active {
        transform: translateY(-1px);
    }

    .login-footer {
        text-align: center;
        margin-top: 28px;
        padding-top: 28px;
        border-top: 1px solid #e8e8e8;
    }

    .login-footer p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .login-footer a {
        color: #FF9800;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .login-footer a:hover {
        color: #FF7043;
        text-decoration: underline;
    }

    .alert {
        border: none;
        border-radius: 10px;
        padding: 16px 20px;
        margin-bottom: 24px;
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

    .alert-danger .btn-close {
        opacity: 0.5;
    }

    .alert-danger .btn-close:hover {
        opacity: 1;
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
        font-size: 0.85rem;
        margin-top: 8px;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .login-card-header {
            padding: 40px 30px;
        }

        .login-card-header h1 {
            font-size: 1.7rem;
        }

        .login-card-body {
            padding: 30px;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <!-- Card Header -->
        <div class="login-card-header">
            <h1>
                <i class="fas fa-lock"></i> Selamat Datang
            </h1>
            <p>Login ke akun Nusantara Rasa Anda</p>
        </div>

        <!-- Card Body -->
        <div class="login-card-body">
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

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" required 
                           placeholder="Masukkan email Anda">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required 
                           placeholder="Masukkan password Anda">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>

            <!-- Footer Links -->
            <div class="login-footer">
                <p>Belum punya akun? 
                    <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

