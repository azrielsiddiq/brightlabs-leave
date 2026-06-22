<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk - LeaveFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 0% 0%, #eef2ff 0%, #ffffff 50%);
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.05);
            padding: 40px 35px;
        }

        .brand-logo {
            font-weight: 700;
            font-size: 24px;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            margin-bottom: 30px;
        }

        .brand-logo i {
            color: #4f46e5;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-custom i {
            position: absolute;
            right: 16px;
            color: #94a3b8;
            font-size: 16px;
            pointer-events: none;
        }

        .form-control-modern {
            width: 100%;
            padding: 12px 45px 12px 16px;
            font-size: 14px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            background-color: #fff;
            color: #0f172a;
            transition: all 0.2s;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .form-control-modern.is-invalid {
            border-color: #ef4444;
        }

        .form-control-modern.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .btn-primary-modern {
            background: #4f46e5;
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
            background: #4338ca;
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.15);
        }

        .form-check-input:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .login-link {
            color: #4f46e5;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #4338ca;
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

        @if (session('status'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 py-2 px-3 mb-4" style="font-size: 13px;">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <div class="input-group-custom">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control-modern @error('email') is-invalid @enderror"
                        placeholder="nama@perusahaan.com"
                        required
                        autofocus
                    >
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
                    <input
                        type="password"
                        name="password"
                        class="form-control-modern @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                    >
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
                    <label class="form-check-label text-muted-custom" for="remember">
                        Ingat Saya
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="login-link">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-primary-modern mb-3">
                Masuk ke Aplikasi
            </button>

            <div class="text-center">
                <a href="{{ url('/') }}" class="text-muted-custom text-decoration-none">
                    <i class="fa-solid fa-arrow-left me-1" style="font-size: 11px;"></i> Kembali ke Halaman Utama
                </a>
            </div>

        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
