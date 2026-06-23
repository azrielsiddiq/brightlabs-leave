<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Status Cuti Tim
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Pantau status seluruh pengajuan cuti anggota tim.
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

        .stat-card {
            padding: 24px;
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
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

        .status-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
        }

        .progress {
            height: 10px;
            border-radius: 20px;
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-number text-warning">5</div>
                    <div class="stat-label">Pending</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-number text-success">15</div>
                    <div class="stat-label">Disetujui</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-number text-danger">4</div>
                    <div class="stat-label">Ditolak</div>
                </div>
            </div>

        </div>

        {{-- Progress Status --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="dashboard-title mb-3">
                Ringkasan Status Pengajuan
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <small>Disetujui</small>
                    <small>62%</small>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-success"
                        style="width: 62%">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <small>Pending</small>
                    <small>21%</small>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-warning"
                        style="width: 21%">
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flex justify-content-between mb-1">
                    <small>Ditolak</small>
                    <small>17%</small>
                </div>

                <div class="progress">
                    <div class="progress-bar bg-danger"
                        style="width: 17%">
                    </div>
                </div>
            </div>

        </div>

        {{-- Table --}}
        <div class="dashboard-card">

            <div class="p-4 border-bottom">

                <div class="dashboard-title">
                    Monitoring Status Cuti
                </div>

                <small class="text-muted">
                    Status terbaru pengajuan cuti anggota tim.
                </small>

            </div>

            <div class="table-responsive p-4">

                <table class="table modern-table align-middle">

                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Cuti</th>
                            <th>Tanggal</th>
                            <th>Durasi</th>
                            <th>Status</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Ahmad Fauzi</td>
                            <td>Cuti Tahunan</td>
                            <td>15 Jul 2026</td>
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
                            <td>Cuti Melahirkan</td>
                            <td>01 Jul 2026</td>
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
                            <td>Cuti Tahunan</td>
                            <td>10 Jul 2026</td>
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

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
