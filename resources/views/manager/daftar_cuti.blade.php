<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Daftar Cuti Tim
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Pantau seluruh pengajuan cuti anggota tim.
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

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Pengajuan</div>
                    <div class="stat-value">24</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value">5</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Disetujui</div>
                    <div class="stat-value">15</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Ditolak</div>
                    <div class="stat-value">4</div>
                </div>
            </div>

        </div>

        {{-- Filter --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="row g-3">

                <div class="col-md-5">

                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input type="text"
                            class="form-control"
                            placeholder="Cari nama karyawan...">
                    </div>

                </div>

                <div class="col-md-3">

                    <select class="form-select">
                        <option>Semua Status</option>
                        <option>Pending</option>
                        <option>Disetujui</option>
                        <option>Ditolak</option>
                    </select>

                </div>

                <div class="col-md-2">
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100">
                        Filter
                    </button>
                </div>

            </div>

        </div>

        {{-- Table --}}
        <div class="dashboard-card">

            <div class="p-4 border-bottom">

                <div class="dashboard-title">
                    Daftar Pengajuan Cuti
                </div>

                <small class="text-muted">
                    Menampilkan seluruh pengajuan cuti anggota tim.
                </small>

            </div>

            <div class="table-responsive p-4">

                <table class="table modern-table align-middle">

                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Departemen</th>
                            <th>Jenis Cuti</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Durasi</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Ahmad Fauzi</td>
                            <td>IT</td>
                            <td>Cuti Tahunan</td>
                            <td>15 Jul 2026</td>
                            <td>18 Jul 2026</td>
                            <td>4 Hari</td>
                            <td>
                                <span class="badge bg-warning text-dark status-badge">
                                    Pending
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Dewi Lestari</td>
                            <td>Finance</td>
                            <td>Cuti Melahirkan</td>
                            <td>01 Jul 2026</td>
                            <td>30 Jul 2026</td>
                            <td>30 Hari</td>
                            <td>
                                <span class="badge bg-success status-badge">
                                    Disetujui
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Rudi Hartono</td>
                            <td>Marketing</td>
                            <td>Cuti Tahunan</td>
                            <td>10 Jul 2026</td>
                            <td>12 Jul 2026</td>
                            <td>3 Hari</td>
                            <td>
                                <span class="badge bg-danger status-badge">
                                    Ditolak
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Siti Nurhaliza</td>
                            <td>IT</td>
                            <td>Cuti Sakit</td>
                            <td>20 Jul 2026</td>
                            <td>22 Jul 2026</td>
                            <td>3 Hari</td>
                            <td>
                                <span class="badge bg-success status-badge">
                                    Disetujui
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-light border">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
