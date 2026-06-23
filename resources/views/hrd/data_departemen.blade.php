```blade
<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Data Departemen
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Kelola struktur departemen dan penempatan karyawan.
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

        .stat-box {
            padding: 20px;
        }

        .stat-label {
            font-size: 12px;
            color: #64748b;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
        }

        .modern-table th {
            font-size: 12px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 600;
        }

        .modern-table td {
            vertical-align: middle;
            font-size: 14px;
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- Header Card --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <div class="dashboard-title mb-2">
                        Manajemen Departemen
                    </div>

                    <small class="text-muted">
                        Kelola seluruh departemen yang ada di perusahaan.
                    </small>
                </div>

                <button class="btn btn-primary">
                    <i class="fa-solid fa-plus me-2"></i>
                    Tambah Departemen
                </button>

            </div>

        </div>

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Departemen</div>
                    <div class="stat-value">8</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Karyawan</div>
                    <div class="stat-value">120</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Manager</div>
                    <div class="stat-value">8</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Departemen Aktif</div>
                    <div class="stat-value">8</div>
                </div>
            </div>

        </div>

        {{-- Search --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="row g-3">

                <div class="col-md-8">
                    <input type="text"
                           class="form-control"
                           placeholder="Cari nama departemen...">
                </div>

                <div class="col-md-4">
                    <button class="btn btn-outline-secondary w-100">
                        Cari Data
                    </button>
                </div>

            </div>

        </div>

        {{-- Table --}}
        <div class="dashboard-card">

            <div class="p-4 border-bottom">

                <div class="dashboard-title">
                    Daftar Departemen
                </div>

                <small class="text-muted">
                    Menampilkan seluruh departemen perusahaan.
                </small>

            </div>

            <div class="table-responsive p-4">

                <table class="table modern-table">

                    <thead>
                        <tr>
                            <th>Nama Departemen</th>
                            <th>Manager</th>
                            <th>Jumlah Karyawan</th>
                            <th>Dibuat</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Information Technology</td>
                            <td>Ahmad Fauzi</td>
                            <td>25</td>
                            <td>01 Jan 2026</td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Finance</td>
                            <td>Dewi Lestari</td>
                            <td>15</td>
                            <td>01 Jan 2026</td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Marketing</td>
                            <td>Rudi Hartono</td>
                            <td>18</td>
                            <td>01 Jan 2026</td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
```
