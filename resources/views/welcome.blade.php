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

        .hero-stats{
    display:flex;
    gap:40px;
    flex-wrap:wrap;
}

.stat-item h3{
    color:#4f46e5;
    font-weight:700;
    margin:0;
}

.dashboard-preview{
    padding:30px;
    background:#f8fafc;
    border-radius:24px;
    border:1px solid #e2e8f0;
}

.preview-card{
    background:white;
    border-radius:18px;
    padding:24px;
    box-shadow:0 15px 40px rgba(0,0,0,.05);
}

.mini-card{
    padding:15px;
    border:1px solid #e2e8f0;
    border-radius:12px;
}

.mini-list{
    display:flex;
    justify-content:space-between;
    padding:12px 0;
    border-bottom:1px solid #f1f5f9;
}

.workflow-card{
    background:white;
    padding:30px;
    border-radius:16px;
    text-align:center;
    border:1px solid #e2e8f0;
    height:100%;
}

.step-number{
    width:55px;
    height:55px;
    margin:auto;
    background:#4f46e5;
    color:white;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
    margin-bottom:15px;
}

.cta-section{
    background:#4f46e5;
    color:white;
    text-align:center;
    padding:80px 30px;
    border-radius:24px;
}

@media(max-width:768px){

    .hero-title{
        font-size:32px !important;
    }

    .hero-stats{
        justify-content:center;
        text-align:center;
    }

    .cta-section{
        padding:50px 20px;
    }
}

        @media (max-width: 991px) {
            .hero-title { font-size: 40px; }
            .hero-section { padding: 100px 0 60px 0; }
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-calendar-check"></i>
                Brightlabs Leave
            </a>

            <div class="ms-auto d-flex gap-2">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary-modern">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-secondary-modern">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}" class="btn-primary-modern">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="hero-section">
        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <div class="badge-promo mb-3">
                        <i class="fa-solid fa-sparkles"></i>
                        Sistem Pengajuan Cuti Digital
                    </div>

                    <h1 class="hero-title mb-4">
                        Transformasi Proses Pengajuan Cuti Menjadi
                        <span>Lebih Efisien</span>
                    </h1>

                    <p class="hero-desc mb-4">
                        Platform terintegrasi yang membantu karyawan,
                        manager, dan HRD mengelola pengajuan,
                        persetujuan, serta monitoring cuti secara
                        real-time dalam satu sistem.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-5">

                        <a href="{{ route('login') }}"
                           class="btn-primary-modern">
                            Mulai Sekarang
                        </a>

                        <a href="#fitur"
                           class="btn-secondary-modern">
                            Pelajari Fitur
                        </a>

                    </div>

                    <div class="hero-stats">

                        <div class="stat-item">
                            <h3>500+</h3>
                            <span>Pengajuan Diproses</span>
                        </div>

                        <div class="stat-item">
                            <h3>99%</h3>
                            <span>Akurasi Data</span>
                        </div>

                        <div class="stat-item">
                            <h3>24/7</h3>
                            <span>Akses Sistem</span>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="dashboard-preview">

                        <div class="preview-card">

                            <div class="d-flex justify-content-between mb-4">
                                <strong>Dashboard HRD</strong>
                                <span class="badge bg-success">
                                    Online
                                </span>
                            </div>

                            <div class="row g-3 mb-3">

                                <div class="col-6">
                                    <div class="mini-card">
                                        <small>Total Cuti</small>
                                        <h4>124</h4>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mini-card">
                                        <small>Pending</small>
                                        <h4>12</h4>
                                    </div>
                                </div>

                            </div>

                            <div class="mini-list">
                                <div>Ahmad Fauzi</div>
                                <span>Disetujui</span>
                            </div>

                            <div class="mini-list">
                                <div>Dewi Lestari</div>
                                <span>Pending</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- FITUR --}}
    <section id="fitur" class="feature-section">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold">
                    Fitur Utama Sistem
                </h2>

                <p class="text-muted">
                    Dirancang untuk mempermudah seluruh proses pengelolaan cuti.
                </p>

            </div>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>

                        <h5>Pengajuan Instan</h5>

                        <p class="text-muted">
                            Ajukan cuti kapan saja tanpa formulir manual.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <h5>Tracking Real-Time</h5>

                        <p class="text-muted">
                            Pantau status pengajuan secara langsung.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fa-solid fa-chart-column"></i>
                        </div>

                        <h5>Laporan Otomatis</h5>

                        <p class="text-muted">
                            Statistik dan laporan tersedia secara otomatis.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- ALUR --}}
    <section class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold">
                    Alur Pengajuan Cuti
                </h2>

            </div>

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="workflow-card">
                        <div class="step-number">01</div>
                        <h5>Ajukan</h5>
                        <p>Karyawan mengisi formulir.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="workflow-card">
                        <div class="step-number">02</div>
                        <h5>Review</h5>
                        <p>Manager memeriksa pengajuan.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="workflow-card">
                        <div class="step-number">03</div>
                        <h5>Verifikasi</h5>
                        <p>HRD melakukan validasi.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="workflow-card">
                        <div class="step-number">04</div>
                        <h5>Selesai</h5>
                        <p>Status diterbitkan otomatis.</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- ROLE --}}
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">
                    Dirancang Untuk Semua Role
                </h2>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>Karyawan</h5>
                        <ul>
                            <li>Ajukan Cuti</li>
                            <li>Lihat Riwayat</li>
                            <li>Pantau Status</li>
                            <li>Lihat Pengumuman</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>Manager</h5>
                        <ul>
                            <li>Monitoring Tim</li>
                            <li>Persetujuan Cuti</li>
                            <li>Buat Akun Tim</li>
                            <li>Laporan Tim</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>HRD</h5>
                        <ul>
                            <li>Kelola Karyawan</li>
                            <li>Kelola Departemen</li>
                            <li>Laporan Keseluruhan</li>
                            <li>Persetujuan Akhir</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- CTA --}}
    <section class="container mb-5">

        <div class="cta-section">

            <h2>
                Siap Mengelola Cuti Secara Digital?
            </h2>

            <p>
                Tingkatkan efisiensi administrasi perusahaan dengan sistem pengajuan cuti modern.
            </p>

            <a href="{{ route('login') }}"
               class="btn btn-light px-4 py-2 fw-semibold">
                Masuk ke Sistem
            </a>

        </div>

    </section>

    {{-- FOOTER --}}
    <footer class="py-4 border-top">
        <div class="container text-center">
            <p class="text-muted mb-0">
                © {{ date('Y') }} Brightlabs Leave Management System
            </p>
        </div>
    </footer>

</body>
</html>
