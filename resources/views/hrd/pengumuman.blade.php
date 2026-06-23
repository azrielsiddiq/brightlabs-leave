```blade
<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Pengumuman Perusahaan
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Kelola informasi dan pengumuman untuk seluruh karyawan.
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
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            transition: .2s;
            height: 100%;
        }

        .announcement-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
        }

        .announcement-icon {
            width: 50px;
            height: 50px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .announcement-title {
            font-weight: 600;
            color: #0f172a;
            font-size: 15px;
        }

        .announcement-content {
            font-size: 13px;
            color: #64748b;
        }

        .announcement-date {
            font-size: 12px;
            color: #94a3b8;
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- Header Action --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <div class="dashboard-title mb-2">
                        Manajemen Pengumuman
                    </div>

                    <small class="text-muted">
                        Buat dan kelola pengumuman perusahaan.
                    </small>
                </div>

                <button class="btn btn-primary">
                    <i class="fa-solid fa-plus me-2"></i>
                    Buat Pengumuman
                </button>

            </div>

        </div>

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="dashboard-card p-4">
                    <div class="text-muted small">Total Pengumuman</div>
                    <div class="fs-2 fw-bold">24</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card p-4">
                    <div class="text-muted small">Dipublikasikan</div>
                    <div class="fs-2 fw-bold">18</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card p-4">
                    <div class="text-muted small">Draft</div>
                    <div class="fs-2 fw-bold">6</div>
                </div>
            </div>

        </div>

        {{-- Pengumuman --}}
        <div class="row g-4">

            <div class="col-md-6">

                <div class="announcement-card p-4">

                    <div class="d-flex gap-3">

                        <div class="announcement-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>

                        <div class="flex-grow-1">

                            <div class="announcement-title">
                                Batas Pengajuan Cuti
                            </div>

                            <div class="announcement-date mb-2">
                                Diposting 10 Juli 2026
                            </div>

                            <div class="announcement-content">
                                Pengajuan cuti wajib dilakukan minimal 3 hari
                                sebelum tanggal pelaksanaan cuti.
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-light border">
                            <i class="fa-solid fa-eye"></i> Detail
                        </button>

                        <button class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pen"></i> Edit
                        </button>

                        <button class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="announcement-card p-4">

                    <div class="d-flex gap-3">

                        <div class="announcement-icon">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>

                        <div class="flex-grow-1">

                            <div class="announcement-title">
                                Jadwal Libur Nasional
                            </div>

                            <div class="announcement-date mb-2">
                                Diposting 15 Juli 2026
                            </div>

                            <div class="announcement-content">
                                Informasi hari libur nasional terbaru untuk seluruh karyawan.
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-light border">
                            <i class="fa-solid fa-eye"></i> Detail
                        </button>

                        <button class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-pen"></i> Edit
                        </button>

                        <button class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
```
