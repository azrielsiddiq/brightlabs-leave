
<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Data Karyawan
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Kelola seluruh data karyawan perusahaan.
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

        .status-badge {
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
                        Manajemen Karyawan
                    </div>

                    <small class="text-muted">
                        Tambah, edit, dan kelola data seluruh karyawan perusahaan.
                    </small>
                </div>

                <button class="btn btn-primary">
                    <i class="fa-solid fa-plus me-2"></i>
                    Tambah Karyawan
                </button>

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
                    <div class="stat-label">Karyawan Aktif</div>
                    <div class="stat-value">112</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Manager</div>
                    <div class="stat-value">6</div>
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
                               placeholder="Cari nama karyawan...">
                    </div>
                </div>

                <div class="col-md-3">
                    <select class="form-select">
                        <option>Semua Departemen</option>
                        <option>IT</option>
                        <option>Finance</option>
                        <option>Marketing</option>
                        <option>HRD</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-outline-secondary w-100">
                        Filter Data
                    </button>
                </div>

            </div>

        </div>

        <div class="dashboard-card">

            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <div class="dashboard-title">
                        Daftar Karyawan
                    </div>

                    <small class="text-muted">
                        Menampilkan seluruh data karyawan.
                    </small>
                </div>
            </div>

            <div class="table-responsive p-4">

                <table class="table modern-table align-middle">

                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>KRY001</td>
                            <td>Ahmad Fauzi</td>
                            <td>ahmad@email.com</td>
                            <td>IT</td>
                            <td>Staff</td>
                            <td>
                                <span class="badge bg-success status-badge">
                                    Aktif
                                </span>
                            </td>
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
                            <td>KRY002</td>
                            <td>Dewi Lestari</td>
                            <td>dewi@email.com</td>
                            <td>Finance</td>
                            <td>Manager</td>
                            <td>
                                <span class="badge bg-success status-badge">
                                    Aktif
                                </span>
                            </td>
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
                            <td>KRY003</td>
                            <td>Rudi Hartono</td>
                            <td>rudi@email.com</td>
                            <td>Marketing</td>
                            <td>Staff</td>
                            <td>
                                <span class="badge bg-secondary status-badge">
                                    Nonaktif
                                </span>
                            </td>
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

