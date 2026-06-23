<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar - Brightlabs Leave</title>

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

        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .register-card {
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

        .text-muted-custom {
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="register-container">

    <a href="{{ url('/') }}" class="brand-logo">
        <i class="fa-solid fa-calendar-check"></i> Brightlabs
    </a>

    <div class="register-card">

        <div class="text-center mb-4">
            <h1 class="fw-bold h4 mb-1">Daftar Akun Baru</h1>
            <p class="text-muted-custom">Silakan isi formulir di bawah ini</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <div class="input-group-custom">
                    <input
                        type="text"
                        name="name"
                        class="form-control-modern @error('name') is-invalid @enderror"
                        placeholder="Nama Lengkap"
                        required
                    >
                    <i class="fa-solid fa-user"></i>
                </div>
                @error('name')
                    <div class="text-danger mt-2" style="font-size: 12px;">
                        <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <div class="input-group-custom">
                    <input
                        type="email"
                        name="email"
                        class="form-control-modern @error('email') is-invalid @enderror"
                        placeholder="nama@perusahaan.com"
                        required
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

            <div class="mb-4">
                <label class="form-label">Konfirmasi Kata Sandi</label>
                <div class="input-group-custom">
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control-modern"
                        placeholder="••••••••"
                        required
                    >
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>

            <button type="submit" class="btn-primary-modern mb-3">
                Daftar Akun
            </button>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-muted-custom text-decoration-none">
                    Sudah punya akun? Masuk
                </a>
            </div>

        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
