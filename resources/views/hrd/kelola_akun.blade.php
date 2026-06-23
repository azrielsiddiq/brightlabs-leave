```blade
<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Kelola Akun
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Manajemen akun pengguna sistem pengajuan cuti.
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

        .modern-table th {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
        }

        .modern-table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .role-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 12px;
            color: #94a3b8;
        }

        .search-box input {
            padding-left: 40px;
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- Header Card --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <div class="dashboard-title mb-2">
                        Manajemen Pengguna
                    </div>

                    <small class="text-muted">
                        Kelola akun HRD, Manager, dan Karyawan.
                    </small>
                </div>

                <button class="btn btn-primary">
                    <i class="fa-solid fa-user-plus me-2"></i>
                    Tambah Akun
                </button>

            </div>

        </div>

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total User</div>
                    <div class="stat-value">130</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Karyawan</div>
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
                    <div class="stat-label">HRD</div>
                    <div class="stat-value">2</div>
                </div>
            </div>

        </div>

        {{-- Filter --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="row g-3">

                <div class="col-md-6">

                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input type="text"
                               class="form-control"
                               placeholder="Cari nama atau email...">
                    </div>

                </div>

                <div class="col-md-3">

                    <select class="form-select">
                        <option>Semua Role</option>
                        <option>HRD</option>
                        <option>Manager</option>
                        <option>Karyawan</option>
                    </select>

                </div>

                <div class="col-md-3">

                    <button class="btn btn-outline-secondary w-100">
                        Filter Data
                    </button>

                </div>

            </div>

        </div>

        {{-- Table --}}
        <div class="dashboard-card">

            <div class="p-4 border-bottom">

                <div class="dashboard-title">
                    Daftar Akun Pengguna
                </div>

                <small class="text-muted">
                    Menampilkan seluruh akun yang terdaftar pada sistem.
                </small>

            </div>

            <div class="table-responsive p-4">

                <table class="table modern-table align-middle">

                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Admin HRD</td>
                            <td>hrd@company.com</td>
                            <td>
                                <span class="badge bg-primary role-badge">
                                    HRD
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    Aktif
                                </span>
                            </td>
                            <td>01 Jan 2026</td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-key"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Dewi Lestari</td>
                            <td>manager@company.com</td>
                            <td>
                                <span class="badge bg-success role-badge">
                                    Manager
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    Aktif
                                </span>
                            </td>
                            <td>10 Jan 2026</td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-key"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Ahmad Fauzi</td>
                            <td>ahmad@company.com</td>
                            <td>
                                <span class="badge bg-secondary role-badge">
                                    Karyawan
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    Aktif
                                </span>
                            </td>
                            <td>15 Jan 2026</td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-key"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-ban"></i>
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
