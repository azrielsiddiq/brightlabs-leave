<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1" style="font-size:22px;">
                Dashboard Manager
            </h2>
            <p class="text-muted mb-0" style="font-size:14px;">
                Kelola pengajuan cuti, pantau status persetujuan, dan informasi perusahaan.
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
            color: inherit;
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

        .modern-table th {
            font-size: 12px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 600;
        }

        .modern-table td {
            font-size: 14px;
            vertical-align: middle;
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
            gap: 14px;
            padding: 16px;
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .announcement-icon {
            width: 40px;
            height: 40px;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media(max-width:768px){
            .stat-value{
                font-size:22px;
            }
        }
    </style>

    <div class="container-fluid py-4 px-3 px-md-4">

        {{-- WELCOME SECTION --}}
        <div class="row g-3 mb-4">

            <div class="col-lg-8">
                <div class="dashboard-card h-100 p-4">

                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                        <div>
                            <div class="dashboard-title mb-2">
                                Selamat Datang, {{ auth()->user()->name }}
                            </div>

                            <div class="dashboard-subtitle" style="max-width:550px;">
                                Anda dapat memantau seluruh pengajuan cuti karyawan,
                                melakukan persetujuan cuti, dan mengelola informasi perusahaan.
                            </div>
                        </div>

                        <span class="badge bg-primary px-3 py-2">
                            Manager
                        </span>

                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashboard-card h-100 p-4">

                    <div class="dashboard-title mb-2">
                        Total Pengajuan
                    </div>

                    <div class="stat-value">
                        {{ $totalPengajuan ?? 0 }}
                    </div>

                    <small class="text-muted">
                        Seluruh data pengajuan cuti
                    </small>

                </div>
            </div>

        </div>

        {{-- STATISTIC --}}
        <div class="row g-3 mb-4">

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Pengajuan</div>
                    <div class="stat-value">
                        {{ $totalPengajuan ?? 0 }}
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value">
                        {{ $pending ?? 0 }}
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Disetujui</div>
                    <div class="stat-value">
                        {{ $approved ?? 0 }}
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Ditolak</div>
                    <div class="stat-value">
                        {{ $rejected ?? 0 }}
                    </div>
                </div>
            </div>

        </div>

        {{-- QUICK ACCESS --}}
        <div class="dashboard-card p-4 mb-4">

            <div class="dashboard-title mb-3">
                Menu Cepat
            </div>

            <div class="row g-3">

                <div class="col-md-3">
                    {{-- <a href="{{ route('cuti.index') }}" class="quick-link">

                        <div class="quick-icon">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>

                        <div>
                            <div class="fw-semibold">
                                Daftar Cuti
                            </div>
                            <small class="text-muted">
                                Semua pengajuan
                            </small>
                        </div>

                    </a> --}}
                </div>

                <div class="col-md-3">
                    {{-- <a href="{{ route('status-cuti.index') }}" class="quick-link">

                        <div class="quick-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>

                        <div>
                            <div class="fw-semibold">
                                Status Cuti
                            </div>
                            <small class="text-muted">
                                Approval cuti
                            </small>
                        </div>

                    </a> --}}
                </div>

                <div class="col-md-3">
                    {{-- <a href="{{ route('users.index') }}" class="quick-link">

                        <div class="quick-icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>

                        <div>
                            <div class="fw-semibold">
                                Buat Akun
                            </div>
                            <small class="text-muted">
                                Tambah user baru
                            </small>
                        </div>

                    </a> --}}
                </div>

                <div class="col-md-3">
                    {{-- <a href="{{ route('pengumuman.index') }}" class="quick-link">

                        <div class="quick-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>

                        <div>
                            <div class="fw-semibold">
                                Pengumuman
                            </div>
                            <small class="text-muted">
                                Kelola informasi
                            </small>
                        </div>

                    </a> --}}
                </div>

            </div>

        </div>

        {{-- TABLE + ANNOUNCEMENT --}}
        <div class="row g-4">

            <div class="col-lg-8">

                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom d-flex justify-content-between align-items-center">

                        <div>
                            <div class="dashboard-title">
                                Pengajuan Cuti Terbaru
                            </div>

                            <small class="text-muted">
                                Pengajuan cuti terbaru karyawan
                            </small>
                        </div>

                    </div>

                    <div class="table-responsive p-4">

                        <table class="table modern-table mb-0">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                {{-- @forelse($cutiTerbaru as $cuti)

                                    <tr>

                                        <td>{{ $cuti->user->name }}</td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}
                                        </td>

                                        <td>

                                            @if($cuti->status == 'pending')
                                                <span class="badge bg-warning text-dark status-badge">
                                                    Pending
                                                </span>

                                            @elseif($cuti->status == 'approved')
                                                <span class="badge bg-success status-badge">
                                                    Disetujui
                                                </span>

                                            @else
                                                <span class="badge bg-danger status-badge">
                                                    Ditolak
                                                </span>
                                            @endif

                                        </td>

                                    </tr>

                                @empty --}}

                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            Belum ada pengajuan cuti.
                                        </td>
                                    </tr>
{{--
                                @endforelse --}}

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="dashboard-card h-100">

                    <div class="p-4 border-bottom">

                        <div class="dashboard-title">
                            Pengumuman Terbaru
                        </div>

                        <small class="text-muted">
                            Informasi perusahaan
                        </small>

                    </div>

                    <div class="p-4 announcement-container">
{{--
                        @forelse($pengumuman as $item)

                            <div class="announcement-box">

                                <div class="announcement-icon">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div>
                                    <div class="fw-semibold">
                                        {{ $item->judul }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>

                            </div>

                        @empty --}}

                            <div class="text-center text-muted">
                                Belum ada pengumuman.
                            </div>
{{--
                        @endforelse --}}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
