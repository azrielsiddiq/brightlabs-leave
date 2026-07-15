<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('alert'))
        <script>
            window.onload = function() {
                Swal.fire({
                    icon: "{{ session('alert.type') }}",
                    title: "{{ session('alert.title') }}",
                    text: "{{ session('alert.message') }}",
                    confirmButtonText: 'OK'
                });
            }
        </script>
    @endif

    @php
        $usedLeave = $totalCutiTahunan - $sisaCuti;
        $progress = $totalCutiTahunan > 0 ? ($usedLeave / $totalCutiTahunan) * 100 : 0;
    @endphp

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1 header-title">
                Dashboard Karyawan
            </h2>
            <p class="text-muted mb-0 header-subtitle">
                Informasi pengajuan, sisa cuti, dan riwayat aktivitas Anda.
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
            flex-shrink: 0;
        }

        .progress {
            height: 8px;
            border-radius: 20px;
            background: #e2e8f0;
        }

        .progress-bar {
            border-radius: 20px;
        }

        .status-badge {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 50px;
            font-weight: 500;
            white-space: nowrap;
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
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .announcement-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .manager-theme {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #0f172a;
        }

        .manager-theme .announcement-icon-wrapper {
            background: #0f172a;
            color: #ffffff;
        }

        .manager-theme .announcement-tag {
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
        }

        .announcement-box.manager-theme .announcement-tag {
            color: #b91c1c;
        }

        .announcement-box.warning-theme {
            background-color: #fffbeb;
            border-color: #fef3c7;
        }

        .announcement-box.warning-theme .announcement-icon-wrapper {
            background-color: #fef08a;
            color: #854d0e;
        }

        .announcement-icon-wrapper {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .announcement-content {
            flex-grow: 1;
        }

        .announcement-tag {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 2px;
        }

        .announcement-box.info-theme .announcement-tag {
            color: #166534;
        }

        .announcement-box.warning-theme .announcement-tag {
            color: #854d0e;
        }

        .announcement-heading {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .announcement-desc {
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
            word-break: break-word;
        }
.modern-table th {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #64748b;
    font-weight: 600;
    background-color: #f8fafc !important;
    border-bottom: 1px solid #e2e8f0 !important;
    padding: 12px 16px !important;
}

.modern-table td {
    font-size: 0.875rem;
    color: #334155;
    padding: 14px 16px !important;
    border-bottom: 1px solid #f1f5f9 !important;
}

/* Mobile view */
@media (max-width: 768px) {
    .modern-table thead {
        display: none;
    }
    .modern-table tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem;
        background: #fff;
    }
    .modern-table td {
        display: flex;
        justify-content: space-between;
        padding: 8px 12px !important;
        font-size: 0.8rem;
    }
    .modern-table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #64748b;
    }
}


        .btn-modern {
            background: #64748b;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            padding: 10px 24px;
            transition: all 0.2s;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-modern:hover {
            background: #475569;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(71, 85, 105, 0.25);
        }

        .header-title {
            font-size: 22px;
        }

        .header-subtitle {
            font-size: 14px;
        }

        /* ===== Tablet & below ===== */
        @media (max-width: 991.98px) {
            .stat-value {
                font-size: 24px;
            }
        }

        /* ===== Mobile (phones) ===== */
        @media (max-width: 767.98px) {
            .header-title {
                font-size: 19px;
            }

            .header-subtitle {
                font-size: 13px;
            }

            .dashboard-title {
                font-size: 14px;
            }

            .dashboard-subtitle {
                font-size: 13px;
                max-width: 100% !important;
            }

            .stat-value {
                font-size: 22px;
            }

            .stat-box {
                padding: 16px;
            }

            /* beri jarak lebih lega antar card & antar section di mobile */
            .row.g-3 {
                --bs-gutter-x: 0.9rem;
                --bs-gutter-y: 1rem;
            }

            .row.g-4 {
                --bs-gutter-x: 0.9rem;
                --bs-gutter-y: 1.25rem;
            }

            .mb-4 {
                margin-bottom: 1.5rem !important;
            }

            .quick-link {
                padding: 14px;
                gap: 12px;
            }

            .quick-icon {
                width: 36px;
                height: 36px;
                font-size: 13px;
            }

            .announcement-box {
                padding: 12px;
                gap: 12px;
            }

            .announcement-heading {
                font-size: 13px;
            }

            .announcement-desc {
                font-size: 12px;
            }

            .btn-modern {
                width: 100%;
                text-align: center;
            }

            /* welcome card: stack text and button */
            .welcome-header {
                flex-direction: column;
                align-items: stretch !important;
            }

            .welcome-header .btn-modern {
                margin-top: 4px;
            }

            .p-4 {
                padding: 1.1rem !important;
            }

            /* jarak antar kartu pengumuman & isi tabel jangan terlalu rapat */
            .announcement-container {
                gap: 14px;
            }

            .table-responsive.p-4,
            .announcement-container.p-4 {
                padding-top: 1rem !important;
            }
        }

        /* ===== Very small phones ===== */
        @media (max-width: 380px) {
            .stat-value {
                font-size: 19px;
            }

            .header-title {
                font-size: 17px;
            }

            .quick-link .fw-semibold {
                font-size: 14px;
            }
        }
    </style>

    <div class="container-fluid py-3 py-md-4 px-3 px-md-4">
        <div class="row g-3 mb-4">
            <div class="col-12 col-lg-8">
                <div class="dashboard-card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 welcome-header">
                        <div>
                            <div class="dashboard-title mb-2">
                                Selamat datang, {{ auth()->user()->name }}
                            </div>

                            <div class="dashboard-subtitle" style="max-width: 550px;">
                                Pantau status pengajuan cuti, kuota tahunan, dan informasi internal perusahaan melalui
                                dashboard ini.
                            </div>
                        </div>

                        {{-- <a href="{{ route('cuti.create') }}" class="btn btn-modern px-3">
                            Ajukan Cuti
                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                <div class="dashboard-card h-100 p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <div class="dashboard-title">Penggunaan Cuti</div>
                            <small class="text-muted">
                                {{ $usedLeave }} / {{ $totalCutiTahunan }} Hari
                            </small>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: {{ $progress }}%">
                        </div>
                    </div>

                    <small class="text-muted d-block mt-2">
                        {{ round($progress) }}% digunakan
                    </small>
                </div>
            </div>

        </div>

        <div class="row g-3 mb-4">
            <div class="col-6 col-md-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label"><center>Total Cuti Tahunan</center></div>
                    <div class="stat-value"><center>{{ $totalCutiTahunan }}</center></div>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label"><center>Sisa Cuti</center></div>
                    <div class="stat-value"><center>{{ $sisaCuti }}</center></div>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mt-2 mt-lg-0">
                <div class="dashboard-card stat-box">
                    <div class="stat-label"><center>Pending</center></div>
                    <div class="stat-value"><center>{{ $pending }}</center></div>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mt-2 mt-lg-0">
                <div class="dashboard-card stat-box">
                    <div class="stat-label"><center>Disetujui</center></div>
                    <div class="stat-value"><center>{{ $approved }}</center></div>
                </div>
            </div>
        </div>


        <div class="dashboard-card p-4 mb-4">
            <div class="dashboard-title mb-3">Akses Cepat</div>

            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <a href="{{ route('cuti.create') }}" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Ajukan Cuti</div>
                            <small class="text-muted">Buat pengajuan baru</small>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 mt-2 mt-md-0">
                    <a href="{{ route('riwayat.cuti') }}" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Riwayat Cuti</div>
                            <small class="text-muted">Lihat semua pengajuan</small>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('employee.pengumuman') }}" class="quick-link">
                        <div class="quick-icon">
                            <i class="fa-solid fa-bell"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Pengumuman</div>
                            <small class="text-muted">Informasi perusahaan</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <div class="dashboard-title">Riwayat Pengajuan Terbaru</div>
                            <small class="text-muted">
                                Menampilkan pengajuan cuti terbaru Anda
                            </small>
                        </div>

                        <a href="{{ route('riwayat.cuti') }}" class="btn btn-light btn-sm border">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="table-responsive p-4">
                        <table class="table modern-table mb-0">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                          <tbody>
                            @forelse($cutiSaya as $cuti)
                                <tr>
                                    <td data-label="Jenis">{{ ucfirst(str_replace('_', ' ', $cuti->jenis_cuti)) }}</td>
                                    <td data-label="Mulai">{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}</td>
                                    <td data-label="Selesai">{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}</td>
                                    <td data-label="Durasi">{{ $cuti->jumlah_hari }} Hari</td>
                                    <td data-label="Status">
                                        @if ($cuti->status == 'pending')
                                            <span class="badge bg-warning text-dark status-badge">Pending</span>
                                        @elseif($cuti->status == 'approved')
                                            <span class="badge bg-success status-badge">Disetujui</span>
                                        @elseif($cuti->status == 'rejected')
                                            <span class="badge bg-danger status-badge">Ditolak</span>
                                        @else
                                            <span class="badge bg-secondary status-badge">Dibatalkan</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada data pengajuan cuti.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                        </table>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4 mt-5 mt-lg-0">

                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom">

                        <div class="dashboard-title">
                            Pengumuman
                        </div>

                        <small class="text-muted">
                            Informasi terbaru perusahaan
                        </small>

                    </div>

                    <div class="announcement-container p-4">

                        @forelse($pengumuman as $item)
                            <div class="announcement-box manager-theme">

                                <div class="announcement-icon-wrapper">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div class="announcement-content">

                                    <div class="announcement-tag" style="color: #000000;">
                                        Pengumuman
                                    </div>

                                    <div class="announcement-heading">
                                        {{ $item->judul }}
                                    </div>

                                    <div class="announcement-desc">
                                        {{ \Illuminate\Support\Str::limit($item->isi, 90) }}
                                    </div>

                                    <div class="announcement-footer">
                                        <small class="text-muted d-block">
                                            <i class="fa-regular fa-user me-1"></i>
                                            {{ $item->creator->name }}
                                        </small>

                                        <small class="text-muted d-block">
                                            <i class="fa-regular fa-calendar me-1"></i>
                                            {{ $item->created_at->format('d M Y') }}
                                        </small>
                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="text-center text-muted py-4">
                                <i class="fa-solid fa-bullhorn fa-2x mb-3"></i>
                                <p class="mb-0">Belum ada pengumuman.</p>
                            </div>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>
