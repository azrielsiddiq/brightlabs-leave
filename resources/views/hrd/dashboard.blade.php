<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Dashboard Manager
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Pantau pengajuan cuti tim, status persetujuan, dan informasi perusahaan.
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
            background: #f0fdf4;
            border: 1px solid #dcfce7;
        }

        .manager-theme {
            background: #fef2f2 !important;
            border: 1px solid #fecaca !important;
            border-left: 5px solid #dc2626 !important;
        }

        .manager-theme .announcement-icon-wrapper {
            background: #fee2e2 !important;
            color: #b91c1c !important;
        }

        .info-theme {
            background: #f0fdf4 !important;
            border: 1px solid #dcfce7 !important;
            border-left: 5px solid #16a34a !important;
        }

        .info-theme .announcement-icon-wrapper {
            background: #bbf7d0 !important;
            color: #166534 !important;
        }

        .manager-theme {
            background: #fef2f2 !important;
            border: 1px solid #fecaca !important;
            border-left: 5px solid #dc2626 !important;
        }

        .manager-theme .announcement-icon-wrapper {
            background: #fee2e2 !important;
            color: #b91c1c !important;
        }

        .info-theme {
            background: #f0fdf4 !important;
            border: 1px solid #dcfce7 !important;
            border-left: 5px solid #16a34a !important;
        }

        .info-theme .announcement-icon-wrapper {
            background: #bbf7d0 !important;
            color: #166534 !important;
        }

        .announcement-icon-wrapper {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #bbf7d0;
            color: #166534;
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
        .btn-modern {
            background: #64748b; /* abu kebiruan elegan */
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            padding: 10px 24px;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-modern:hover {
            background: #475569; /* abu lebih gelap saat hover */
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(71, 85, 105, 0.25);
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">
        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="dashboard-card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <div class="dashboard-title mb-2">
                                Selamat Datang, {{ Auth::user()->name }}
                            </div>
                            <div class="dashboard-subtitle">
                                Pantau pengajuan cuti anggota tim dan perkembangan aktivitas departemen Anda.
                            </div>
                        </div>
                        <a href="#" class="btn btn-modern px-3">Daftar Cuti</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashboard-card h-100 p-4">
                    <div class="dashboard-title">Ringkasan Tim</div>
                    <small class="text-muted">Monitoring aktivitas anggota tim.</small>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Anggota Tim</div>
                    <div class="stat-value">{{ $totalAnggotaTim }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value text-warning">{{ $pending }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Disetujui</div>
                    <div class="stat-value text-success">{{ $approved }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Ditolak</div>
                    <div class="stat-value text-danger">{{ $rejected }}</div>
                </div>
            </div>
        </div>

        <div class="dashboard-card p-4 mb-4">
            <div class="dashboard-title mb-3">Akses Cepat</div>
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="#" class="quick-link">
                        <div class="quick-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        <div>
                            <div class="fw-semibold">Daftar Cuti</div>
                            <small class="text-muted">Lihat seluruh cuti</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="quick-link">
                        <div class="quick-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                        <div>
                            <div class="fw-semibold">Status Cuti</div>
                            <small class="text-muted">Pantau status</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="quick-link">
                        <div class="quick-icon"><i class="fa-solid fa-bullhorn"></i></div>
                        <div>
                            <div class="fw-semibold">Pengumuman</div>
                            <small class="text-muted">Info perusahaan</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="quick-link">
                        <div class="quick-icon"><i class="fa-solid fa-user-plus"></i></div>
                        <div>
                            <div class="fw-semibold">Buat Akun</div>
                            <small class="text-muted">Tambah pengguna</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="dashboard-card h-100">
                    <div class="p-4 border-bottom">
                        <div class="dashboard-title">Daftar Pengajuan Tim</div>
                        <small class="text-muted">Pengajuan cuti terbaru dari anggota tim.</small>
                    </div>
                    <div class="table-responsive p-4">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Karyawan</th>
                                    <th>Jenis Cuti</th>
                                    <th>Tanggal</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cuti as $item)
                                    <tr>
                                        <td>{{ $item->user->name ?? 'N/A' }}</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $item->jenis_cuti)) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                                        <td>{{ $item->jumlah_hari }} Hari</td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="badge bg-warning text-dark status-badge">Pending</span>
                                            @elseif($item->status == 'approved')
                                                <span class="badge bg-success status-badge">Disetujui</span>
                                            @else
                                                <span class="badge bg-danger status-badge">Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada pengajuan cuti.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashboard-card h-100">
                    <div class="p-4 border-bottom">
                        <div class="dashboard-title">Pengumuman</div>
                        <small class="text-muted">Informasi terbaru perusahaan.</small>
                    </div>
                    <div class="p-4 announcement-container">

                        @forelse($pengumuman as $item)
                            @php
                                $role = strtolower(optional($item->creator)->role ?? '');
                                $isManager = $role === 'manager';
                            @endphp

                            <div class="announcement-box mb-3 {{ $isManager ? 'manager-theme' : 'info-theme' }}">

                                <div class="announcement-icon-wrapper">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div class="flex-grow-1">

                                    <div class="announcement-heading">
                                        {{ $item->judul }}
                                    </div>

                                    <div class="announcement-desc">
                                        {{ \Illuminate\Support\Str::limit($item->isi, 90) }}
                                    </div>

                                    <small class="text-muted d-block mt-2">
                                        <i class="fa-regular fa-user me-1"></i>
                                        {{ optional($item->creator)->name ?? 'Tidak diketahui' }}
                                        ({{ ucfirst($role) }})
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
    </div>
</x-app-layout>
