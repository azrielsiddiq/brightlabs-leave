<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Pengumuman Perusahaan
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Informasi dan pengumuman terbaru perusahaan.
            </p>
        </div>
    </x-slot>

    <style>
        body {
            background: #f8fafc;
        }

        .dashboard-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        .dashboard-title {
            font-size: 15px;
            font-weight: 600;
            color: #0f172a;
        }

        .announcement-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            transition: .3s;
            height: 100%;
        }

        .announcement-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,.05);
        }

        .announcement-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .announcement-title {
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
        }

        .announcement-date {
            font-size: 12px;
            color: #94a3b8;
        }

        .announcement-content {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
        }

        .info-card {
            padding: 20px;
            text-align: center;
        }

        .info-number {
            font-size: 30px;
            font-weight: 700;
        }

        .info-label {
            color: #64748b;
            font-size: 13px;
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="dashboard-card info-card">
                    <div class="info-number">12</div>
                    <div class="info-label">Total Pengumuman</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card info-card">
                    <div class="info-number">3</div>
                    <div class="info-label">Bulan Ini</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card info-card">
                    <div class="info-number">1</div>
                    <div class="info-label">Terbaru Hari Ini</div>
                </div>
            </div>

        </div>

        {{-- Pengumuman --}}
        <div class="row g-4">

            <div class="col-lg-6">

                <div class="announcement-card p-4">

                    <div class="d-flex gap-3">

                        <div class="announcement-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>

                        <div>

                            <div class="announcement-title">
                                Batas Pengajuan Cuti Tahunan
                            </div>

                            <div class="announcement-date mb-3">
                                Dipublikasikan 15 Juli 2026
                            </div>

                            <div class="announcement-content">
                                Seluruh karyawan diwajibkan mengajukan cuti
                                minimal 3 hari sebelum tanggal pelaksanaan.
                            </div>

                        </div>

                    </div>

                    <hr>

                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-eye me-1"></i>
                        Lihat Detail
                    </button>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="announcement-card p-4">

                    <div class="d-flex gap-3">

                        <div class="announcement-icon">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>

                        <div>

                            <div class="announcement-title">
                                Jadwal Libur Nasional
                            </div>

                            <div class="announcement-date mb-3">
                                Dipublikasikan 10 Juli 2026
                            </div>

                            <div class="announcement-content">
                                Informasi terbaru mengenai hari libur nasional
                                dan cuti bersama tahun 2026.
                            </div>

                        </div>

                    </div>

                    <hr>

                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-eye me-1"></i>
                        Lihat Detail
                    </button>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="announcement-card p-4">

                    <div class="d-flex gap-3">

                        <div class="announcement-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <div>

                            <div class="announcement-title">
                                Kebijakan Kerja Hybrid
                            </div>

                            <div class="announcement-date mb-3">
                                Dipublikasikan 05 Juli 2026
                            </div>

                            <div class="announcement-content">
                                Perusahaan mulai menerapkan sistem kerja hybrid
                                untuk beberapa departemen tertentu.
                            </div>

                        </div>

                    </div>

                    <hr>

                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-eye me-1"></i>
                        Lihat Detail
                    </button>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
