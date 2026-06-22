<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pengajuan Cuti Online</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #0f172a;
            overflow-x: hidden;
        }

        /* Navbar Styling */
        .navbar {
            padding: 20px 0;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #f1f5f9;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 20px;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar-brand i {
            color: #4f46e5;
        }

        /* Hero Section */
        .hero-section {
            padding: 140px 0 100px 0;
            background: radial-gradient(circle at 90% 10%, #eef2ff 0%, #ffffff 70%);
        }
        .badge-promo {
            background: #e0e7ff;
            color: #4f46e5;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .hero-title {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.2;
            color: #0f172a;
            letter-spacing: -1px;
        }
        .hero-title span {
            color: #4f46e5;
        }
        .hero-desc {
            font-size: 18px;
            color: #475569;
            line-height: 1.6;
        }

        /* Buttons Styling */
        .btn-primary-modern {
            background: #4f46e5;
            color: #fff;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary-modern:hover {
            background: #4338ca;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.15);
        }
        .btn-secondary-modern {
            background: #fff;
            color: #475569;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s;
            border: 1px solid #e2e8f0;
            text-decoration: none;
            display: inline-block;
        }
        .btn-secondary-modern:hover {
            background: #f8fafc;
            color: #0f172a;
            border-color: #cbd5e1;
        }

        /* Features Section */
        .feature-section {
            padding: 80px 0;
            border-top: 1px solid #f1f5f9;
        }
        .feature-card {
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            background: #fff;
            transition: all 0.3s;
            height: 100%;
        }
        .feature-card:hover {
            border-color: #4f46e5;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.04);
            transform: translateY(-5px);
        }
        .feature-icon {
            width: 50px;
            height: 50px;
            background: #f5f3ff;
            color: #4f46e5;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 991px) {
            .hero-title { font-size: 40px; }
            .hero-section { padding: 100px 0 60px 0; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-calendar-check"></i> LeaveFlow
            </a>

            <div class="ms-auto d-flex gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary-modern py-2 px-4" style="font-size: 14px;">
                            Ke Dashboard <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-secondary-modern py-2 px-4" style="font-size: 14px;">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary-modern py-2 px-4" style="font-size: 14px;">
                                Daftar Akun
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="badge-promo mb-3">
                        <i class="fa-solid fa-sparkles"></i> Sistem Manajemen Cuti Modern
                    </div>
                    <h1 class="hero-title mb-3">
                        Kelola Cuti Karyawan Lebih <span>Mudah & Cepat</span>
                    </h1>
                    <p class="hero-desc mb-4">
                        Ajukan cuti, pantau persetujuan manajer secara real-time, dan kelola transparansi informasi perusahaan dalam satu platform terintegrasi.
                    </p>

           <div class="d-flex flex-wrap gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary-modern">
                            Kembali ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary-modern">
                            Ajukan Cuti Sekarang <i class="fa-solid fa-chevron-right ms-2" style="font-size: 12px;"></i>
                        </a>
                        <a href="#fitur" class="btn-secondary-modern">
                            Pelajari Fitur
                        </a>
                    @endif </div>
                </div>

                <div class="col-lg-6 d-none d-lg-block">
                    <div class="p-4" style="background: rgba(241, 245, 249, 0.6); border-radius: 24px; border: 1px solid #e2e8f0;">
                        <div class="bg-white p-4 shadow-sm" style="border-radius: 16px; border: 1px solid #e2e8f0;">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-bold text-secondary" style="font-size: 14px;">Pratinjau Sistem</span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Aktif</span>
                            </div>
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="p-3 border rounded-3" style="background:#f8fafc">
                                        <small class="text-muted d-block mb-1" style="font-size:11px;">Total Pengajuan</small>
                                        <span class="fw-bold" style="font-size:18px;">24 Data</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded-3" style="background:#fff7ed">
                                        <small class="text-warning d-block mb-1" style="font-size:11px;">Menunggu Persetujuan</small>
                                        <span class="fw-bold text-warning" style="font-size:18px;">3 Pending</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border rounded-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width:8px; height:8px; background:#22c55e; border-radius:50%"></div>
                                    <small class="fw-medium">Cuti Tahunan - Ahmad Fauzi</small>
                                </div>
                                <span class="text-muted" style="font-size:12px;">Disetujui</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="feature-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="letter-spacing: -0.5px;">Mengapa Menggunakan Platform Kami?</h2>
                <p class="text-muted mx-auto" style="max-width: 500px;">Efisiensi penuh untuk kenyamanan HR, Manajer, dan seluruh Karyawan.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>
                        <h4 class="fw-bold" style="font-size: 18px;">Pengajuan Instan</h4>
                        <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                            Karyawan dapat mengajukan permohonan cuti dalam hitungan detik secara mandiri lewat gawai atau komputer.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>
                        <h4 class="fw-bold" style="font-size: 18px;">Pantau Real-Time</h4>
                        <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                            Statistik data cuti terhitung otomatis. Status *pending*, disetujui, atau ditolak langsung terperbarui otomatis.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <h4 class="fw-bold" style="font-size: 18px;">Informasi Terpusat</h4>
                        <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                            Sampaikan pengumuman penting internal perusahaan langsung ke halaman utama dashboard karyawan Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 border-top">
        <div class="container text-center">
            <p class="text-muted mb-0" style="font-size: 13px;">
                &copy; {{ date('Y') }} Copyright © 2026 Brightlabs. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
