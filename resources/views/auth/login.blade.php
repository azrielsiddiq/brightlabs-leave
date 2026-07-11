<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk - Brightlabs Leave</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(100, 116, 139, 0.15);
            padding: 36px 28px;
        }

        .brand-logo {
            font-weight: 700;
            font-size: 22px;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            margin-bottom: 24px;
        }

        .brand-logo i {
            color: #64748b;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-custom i {
            position: absolute;
            right: 14px;
            color: #94a3b8;
            font-size: 15px;
            pointer-events: none;
        }

        .form-control-modern {
            width: 100%;
            padding: 12px 40px 12px 14px;
            font-size: 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            color: #0f172a;
            transition: all 0.2s;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: #94a3b8;
            box-shadow: 0 0 0 3px rgba(148, 163, 184, 0.2);
        }

        .btn-primary-modern {
            background: #64748b;
            color: #fff;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            width: 100%;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-primary-modern:hover {
            background: #475569;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(71, 85, 105, 0.25);
        }

        .login-link {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #475569;
        }

        .text-muted-custom {
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="login-container">
    <a href="{{ url('/') }}" class="brand-logo">
        <i class="fa-solid fa-calendar-check"></i> Brightlabs
    </a>

    <div class="login-card">
        <div class="text-center mb-4">
            <h1 class="fw-bold h4 mb-1">Selamat Datang Kembali</h1>
            <p class="text-muted-custom">Silakan masuk ke akun Anda</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <div class="input-group-custom">
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control-modern @error('email') is-invalid @enderror"
                           placeholder="nama@perusahaan.com" required autofocus>
                    <i class="fa-regular fa-envelope"></i>
                </div>
                @error('email')
                <div class="text-danger mt-2" style="font-size: 12px;">
                    <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Kata Sandi</label>
                <div class="input-group-custom">
                    <input type="password" name="password"
                           class="form-control-modern @error('password') is-invalid @enderror"
                           placeholder="Masukan kata sandi" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                @error('password')
                <div class="text-danger mt-2" style="font-size: 12px;">
                    <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check m-0">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label text-muted-custom" for="remember">Ingat Saya</label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="login-link">Lupa Password?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary-modern mb-3">Masuk ke Aplikasi</button>

            <div class="text-center">
                <a href="{{ url('/register') }}" class="text-muted-custom text-decoration-none">
                    <i class="fa-solid fa-arrow-left me-1" style="font-size: 11px;"></i>
                    Belum punya akun? Daftar di sini
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
