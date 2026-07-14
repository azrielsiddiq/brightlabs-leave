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
            <h2 class="fw-bold mb-1" style="font-size: 22px;">
                Dashboard Karyawan
            </h2>
            <p class="text-muted mb-0" style="font-size: 14px;">
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

        .announcement-box.manager-theme {
            background-color: #fef2f2;
            border-color: #fecaca;
            border-left: 5px solid #dc2626;
        }

        .announcement-box.manager-theme .announcement-icon-wrapper {
            background-color: #fee2e2;
            color: #b91c1c;
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
        }

        .btn-modern:hover {
            background: #475569;
            /* abu lebih gelap saat hover */
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(71, 85, 105, 0.25);
        }


        @media(max-width:768px) {
            .stat-value {
                font-size: 22px;
            }
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">
        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="dashboard-card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <div class="dashboard-title mb-2">
                                Selamat datang, {{ auth()->user()->name }}
                            </div>

                            <div class="dashboard-subtitle" style="max-width: 550px;">
                                Pantau status pengajuan cuti, kuota tahunan, dan informasi internal perusahaan melalui
                                dashboard ini.
                            </div>
                        </div>

                        <a href="{{ route('cuti.create') }}" class="btn btn-modern px-3">
                            Ajukan Cuti
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
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
            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Cuti Tahunan</div>
                    <div class="stat-value">{{ $totalCutiTahunan }}</div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Sisa Cuti</div>
                    <div class="stat-value">{{ $sisaCuti }}</div>
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
        </div>


        <div class="dashboard-card p-4 mb-4">
            <div class="dashboard-title mb-3">Akses Cepat</div>

            <div class="row g-3">
                <div class="col-md-4">
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

                <div class="col-md-4">
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
                    <a href="#pengumuman" class="quick-link">
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
            <div class="col-lg-8">
                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
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
                                        <td>{{ ucfirst(str_replace('_', ' ', $cuti->jenis_cuti)) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}</td>
                                        <td>{{ $cuti->jumlah_hari }} Hari</td>
                                        <td>
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

            <div class="col-lg-4">

                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom">

                        <div class="dashboard-title">
                            Pengumuman
                        </div>

                        <small class="text-muted">
                            Informasi terbaru perusahaan
                        </small>

                    </div>

                    <div class="p-4 announcement-container">

                        @forelse($pengumuman as $item)

                            <div class="announcement-box mb-3">

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
                                        {{ $item->creator->name }}
                                        ({{ ucfirst($item->creator->role) }})
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
