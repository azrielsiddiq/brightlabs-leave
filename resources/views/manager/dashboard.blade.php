```blade
<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Dashboard HRD
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Kelola data karyawan, pengajuan cuti, departemen, dan informasi perusahaan.
            </p>
        </div>
    </x-slot>

    <style>
        body {
            background: #f8fafc;
        }

        .dashboard-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
        }

        .dashboard-title {
            font-size: 15px;
            font-weight: 600;
            color: #0f172a;
        }

        .dashboard-subtitle {
            font-size: 13px;
            color: #64748b;
        }

        .stat-box {
            padding: 20px;
        }

        .stat-label {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
        }

        .quick-link {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: inherit;
            padding: 16px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            transition: .2s;
        }

        .quick-link:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .quick-icon {
            width: 42px;
            height: 42px;
            background: #f1f5f9;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #334155;
        }

        .status-badge {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 50px;
            font-weight: 500;
        }

        .announcement-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .announcement-box {
            display: flex;
            gap: 16px;
            padding: 16px;
            border-radius: 10px;
            border: 1px solid transparent;
            background: #f8fafc;
        }

        .announcement-box.info-theme {
            background-color: #f0fdf4;
            border-color: #dcfce7;
        }

        .announcement-box.info-theme .announcement-icon-wrapper {
            background-color: #bbf7d0;
            color: #166534;
        }

        .announcement-icon-wrapper {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .announcement-heading {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .announcement-desc {
            font-size: 13px;
            color: #475569;
        }

        .modern-table th {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
        }

        .modern-table td {
            font-size: 14px;
            vertical-align: middle;
        }

        @media(max-width:768px) {
            .stat-value {
                font-size: 22px;
            }
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- Welcome Card --}}
        <div class="row g-3 mb-4">

            <div class="col-lg-8">
                <div class="dashboard-card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <div class="dashboard-title mb-2">
                                Selamat Datang, HRD
                            </div>

                            <div class="dashboard-subtitle">
                                Kelola data karyawan, persetujuan cuti, pengumuman perusahaan,
                                dan laporan kepegawaian melalui dashboard ini.
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary px-4">
                            Kelola Karyawan
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashboard-card h-100 p-4">
                    <div class="dashboard-title mb-2">
                        Ringkasan Sistem
                    </div>

                    <small class="text-muted">
                        Monitoring aktivitas HRD perusahaan.
                    </small>
                </div>
            </div>

        </div>

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Karyawan</div>
                    <div class="stat-value">120</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Departemen</div>
                    <div class="stat-value">8</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value">15</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Disetujui</div>
                    <div class="stat-value">58</div>
                </div>
            </div>

        </div>

        {{-- Quick Access --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="dashboard-title mb-3">
                Akses Cepat
            </div>

            <div class="row g-3">

                <div class="col-md-4">
                    <a href="#" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Data Karyawan</div>
                            <small class="text-muted">Kelola data karyawan</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Departemen</div>
                            <small class="text-muted">Kelola departemen</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Persetujuan Cuti</div>
                            <small class="text-muted">Review pengajuan cuti</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Pengumuman</div>
                            <small class="text-muted">Kelola informasi</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-chart-column"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Laporan Cuti</div>
                            <small class="text-muted">Lihat laporan</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Buat Akun</div>
                            <small class="text-muted">Tambah pengguna</small>
                        </div>
                    </a>
                </div>

            </div>

        </div>

        {{-- Tabel dan Pengumuman --}}
        <div class="row g-4">

            <div class="col-lg-8">

                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom">
                        <div class="dashboard-title">
                            Daftar Pengajuan Cuti Terbaru
                        </div>

                        <small class="text-muted">
                            Menampilkan pengajuan cuti terbaru dari karyawan.
                        </small>
                    </div>

                    <div class="table-responsive p-4">

                        <table class="table modern-table mb-0">

                            <thead>
                                <tr>
                                    <th>Karyawan</th>
                                    <th>Departemen</th>
                                    <th>Jenis Cuti</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>Ahmad Fauzi</td>
                                    <td>IT</td>
                                    <td>Cuti Tahunan</td>
                                    <td>12 Jul 2026</td>
                                    <td>
                                        <span class="badge bg-warning text-dark status-badge">
                                            Pending
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Dewi Lestari</td>
                                    <td>Finance</td>
                                    <td>Cuti Sakit</td>
                                    <td>10 Jul 2026</td>
                                    <td>
                                        <span class="badge bg-success status-badge">
                                            Disetujui
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Rudi Hartono</td>
                                    <td>Marketing</td>
                                    <td>Cuti Tahunan</td>
                                    <td>09 Jul 2026</td>
                                    <td>
                                        <span class="badge bg-danger status-badge">
                                            Ditolak
                                        </span>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom">

                        <div class="dashboard-title">
                            Pengumuman
                        </div>

                        <small class="text-muted">
                            Informasi terbaru perusahaan
                        </small>

                    </div>

                    <div class="p-4 announcement-container">

                        <div class="announcement-box info-theme">
                            <div class="announcement-icon-wrapper">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>

                            <div>
                                <div class="announcement-heading">
                                    Batas Pengajuan Cuti
                                </div>

                                <div class="announcement-desc">
                                    Pengajuan cuti wajib dilakukan minimal 3 hari sebelum tanggal cuti.
                                </div>
                            </div>
                        </div>

                        <div class="announcement-box info-theme">
                            <div class="announcement-icon-wrapper">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>

                            <div>
                                <div class="announcement-heading">
                                    Libur Nasional
                                </div>

                                <div class="announcement-desc">
                                    Perusahaan libur pada tanggal yang ditetapkan pemerintah.
                                </div>
                            </div>
                        </div>

                        <div class="announcement-box info-theme">
                            <div class="announcement-icon-wrapper">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>

                            <div>
                                <div class="announcement-heading">
                                    Update Kebijakan HR
                                </div>

                                <div class="announcement-desc">
                                    Kebijakan cuti terbaru telah diperbarui oleh HRD.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
```
