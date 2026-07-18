<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1 header-title">
                Dashboard HRD
            </h2>
            <p class="text-muted mb-0 header-subtitle">
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
            flex-shrink: 0;
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
            transition: .2s;
        }

        .announcement-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
        }

        /* HRD */
        .info-theme {
            background: #f0fdf4;
            border-color: #dcfce7;
        }

        .info-theme .announcement-icon-wrapper {
            background: #bbf7d0;
            color: #166534;
        }

        .info-theme .announcement-tag {
            color: #166534;
        }

        /* Manager */
        .manager-theme {
            background: #fef2f2;
            border-color: #fecaca;
        }

        .manager-theme .announcement-icon-wrapper {
            background: #fee2e2;
            color: #b91c1c;
        }

        .manager-theme .announcement-tag {
            color: #b91c1c;
        }

        .announcement-icon-wrapper {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }

        .announcement-content {
            flex: 1;
        }

        .announcement-tag {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 2px;
        }

        .announcement-heading {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .announcement-desc {
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
            margin-top: 4px;
            word-break: break-word;
        }

        .announcement-footer {
            margin-top: 8px;
            font-size: 12px;
            color: #94a3b8;
        }

       @media (max-width: 768px) {
  .table-custom thead {
    display: none; /* sembunyikan header */
  }
  .table-custom tr {
    display: block;
    margin-bottom: 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.75rem;
    background: #fff;
  }
  .table-custom td {
    display: flex;
    justify-content: space-between;
    padding: 8px 12px !important;
    font-size: 0.85rem;
  }
  .table-custom td::before {
    content: attr(data-label);
    font-weight: 600;
    color: #475569;
  }
}

        .btn-modern {
            background: #64748b;
            /* abu kebiruan elegan */
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

            .announcement-container {
                gap: 14px;
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

            .p-4 {
                padding: 1.1rem !important;
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
        }
    </style>

     <div class="container-fluid py-4 px-3 px-md-4">

        <div class="row g-3 mb-4">

            <div class="col-12 col-lg-8">
                <div class="dashboard-card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <div class="dashboard-title mb-2">
                                Selamat Datang, {{ Auth::user()->name }}!
                            </div>

                            <div class="dashboard-subtitle">
                                Kelola data karyawan, persetujuan cuti, pengumuman perusahaan,
                                dan laporan kepegawaian melalui dashboard ini.
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-3 mt-lg-0">
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

      <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="dashboard-card stat-box">
                <div class="stat-label">Total Karyawan</div>
                <div class="stat-value">{{ $totalAnggotaTim }}</div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="dashboard-card stat-box">
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pending }}</div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="dashboard-card stat-box">
                <div class="stat-label">Disetujui</div>
                <div class="stat-value">{{ $approved }}</div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="dashboard-card stat-box">
                <div class="stat-label">Ditolak</div>
                <div class="stat-value">{{ $rejected }}</div>
            </div>
        </div>
    </div>

 <div class="row g-4">
    {{-- Daftar Pengajuan Cuti --}}
    <div class="col-12 col-lg-8">
        <div class="dashboard-card">
            <div class="p-4 border-bottom">
                <div class="dashboard-title">Daftar Pengajuan Cuti Terbaru</div>
                <small class="text-muted">Menampilkan pengajuan cuti terbaru dari karyawan.</small>
            </div>

            <div class="table-responsive p-4">
                <table class="table modern-table mb-0 table-custom">
                    <thead>
                        <tr>
                            <th>Karyawan</th>
                            <th>Jenis Cuti</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengajuanCuti as $item)
                            <tr>
                                <td data-label="Karyawan">{{ $item->user->name }}</td>
                                <td data-label="Jenis Cuti">{{ ucwords(str_replace('_', ' ', $item->jenis_cuti)) }}</td>
                                <td data-label="Tanggal">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                                <td data-label="Status">
                                    @if ($item->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($item->status == 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($item->status == 'rejected')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">Dibatalkan</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada pengajuan cuti.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pengumuman --}}
    <div class="col-12 col-lg-4">
        <div class="dashboard-card h-100">
            <div class="p-4 border-bottom">
                <div class="dashboard-title">Pengumuman</div>
                <small class="text-muted">Informasi terbaru perusahaan</small>
            </div>
            <div class="p-4 announcement-container">
                @forelse($pengumuman as $item)
                    <div class="announcement-box mb-3 info-theme">
                        <div class="announcement-icon-wrapper">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="announcement-heading">{{ $item->judul }}</div>
                            <div class="announcement-desc">{{ \Illuminate\Support\Str::limit($item->isi, 90) }}</div>
                            <small class="text-muted d-block mt-2">
                                <i class="fa-regular fa-user me-1"></i>
                                {{ $item->creator->name ?? 'System' }}
                            </small>
                            <small class="text-muted d-block">
                                <i class="fa-regular fa-calendar me-1"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </small>
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

</x-app-layout>
