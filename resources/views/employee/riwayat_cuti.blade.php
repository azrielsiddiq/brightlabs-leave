@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: "{{ session('alert.type') }}",
                    title: "{{ session('alert.title') }}",
                    text: "{{ session('alert.message') }}",
                    confirmButtonText: 'Lanjutkan',
                    customClass: {
                        confirmButton: 'btn btn-dark px-4 py-2 text-sm'
                    },
                    buttonsStyling: false
                });
            });
        </script>
    @endif

    <style>
        :root {
            --bg-main: #fafafa;
            --border-color: #e5e5e5;
            --text-main: #171717;
            --text-muted: #737373;
            --card-radius: 12px;
        }

        body {
            background-color: var(--bg-main);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
        }

        .stats-card {
            border: 1px solid var(--border-color) !important;
            border-radius: var(--card-radius) !important;
            background: #ffffff;
        }

        .modern-table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            padding: 16px 14px;
            border-bottom: 1px solid var(--border-color);
        }

        .modern-table td {
            padding: 16px 14px;
            color: var(--text-main);
            font-size: 14px;
            vertical-align: middle;
            white-space: nowrap;
            border-bottom: 1px solid #f5f5f5;
        }

        .modern-table tbody tr:hover td {
            background-color: #fafafa;
        }

        .modern-table td.alasan,
        .modern-table td.catatan {
            max-width: 260px;
            white-space: normal;
            word-wrap: break-word;
            line-height: 1.5;
        }

        .status-pill {
            font-size: 13px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }
        
        .status-pill::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin-right: 8px;
            display: inline-block;
        }

        .status-pending { color: var(--text-main); }
        .status-pending::before { background-color: #a3a3a3; }

        .status-approved { color: var(--text-main); font-weight: 600; }
        .status-approved::before { background-color: var(--text-main); }

        .status-rejected { color: var(--text-muted); text-decoration: line-through; }
        .status-rejected::before { background-color: var(--border-color); }

        .btn-action {
            background: #ffffff;
            border: 1px solid var(--border-color);
            color: var(--text-main);
            padding: 8px 14px;
            font-size: 13px;
            border-radius: 8px;
            transition: all 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-action:hover {
            background: #f5f5f5;
            border-color: #a3a3a3;
        }

        .btn-action-sm {
            padding: 6px 10px;
            font-size: 12px;
            border-radius: 6px;
        }

        .btn-action.text-danger:hover {
            background: #fef2f2;
            border-color: #fca5a5;
        }

        .mobile-card-list {
            display: none;
        }

        .desktop-table-container {
            display: block;
        }

        @media(max-width: 991.98px) {
            .desktop-table-container {
                display: none;
            }
            .mobile-card-list {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }
            .mobile-item-card {
                background: #ffffff;
                border: 1px solid var(--border-color);
                border-radius: var(--card-radius);
                padding: 16px;
            }
            .header-mobile {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 16px !important;
            }
            .header-mobile a {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }
    </style>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 header-mobile py-1">
            <div>
                <h2 class="fw-bold mb-1" style="font-size: 22px; color: var(--text-main); letter-spacing: -0.02em;">Riwayat Pengajuan Cuti</h2>
                <p class="text-muted mb-0" style="font-size: 13px;">
                    Daftar rekam log dan status operasional seluruh permohonan cuti Anda.
                </p>
            </div>

            <a href="{{ route('employee.dashboard') }}" class="btn-action">
                <i class="fa-solid fa-arrow-left me-2" style="font-size: 11px;"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-4 px-2 px-md-4">
        <div class="row g-2 g-md-3 mb-4">
            <div class="col-4">
                <div class="card stats-card shadow-sm text-center text-sm-start">
                    <div class="card-body p-3 p-md-4">
                        <small class="text-uppercase tracking-wider fw-semibold d-block text-truncate" style="font-size: 10px; color: var(--text-muted);">Total</small>
                        <h3 class="fw-bold mb-0 mt-1" style="color: var(--text-main); font-size: calc(16px + 1vw);">{{ $cutiSaya->total() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card stats-card shadow-sm text-center text-sm-start">
                    <div class="card-body p-3 p-md-4">
                        <small class="text-uppercase tracking-wider fw-semibold d-block text-truncate" style="font-size: 10px; color: var(--text-muted);">Pending</small>
                        <h3 class="fw-bold mb-0 mt-1" style="color: var(--text-main); font-size: calc(16px + 1vw);">{{ $cutiSaya->where('status', 'pending')->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card stats-card shadow-sm text-center text-sm-start">
                    <div class="card-body p-3 p-md-4">
                        <small class="text-uppercase tracking-wider fw-semibold d-block text-truncate" style="font-size: 10px; color: var(--text-muted);">Disetujui</small>
                        <h3 class="fw-bold mb-0 mt-1" style="color: var(--text-main); font-size: calc(16px + 1vw);">{{ $cutiSaya->where('status', 'approved')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="desktop-table-container card shadow-sm border-0 stats-card overflow-hidden">
                <div class="card-header bg-white py-3 px-4" style="border-bottom: 1px solid var(--border-color);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold" style="font-size: 14px;">Data Berkas Dokumen</h6>
                        <span class="text-muted small">Total: {{ $cutiSaya->total() }}</span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table modern-table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Kategori Cuti</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Durasi</th>
                                <th>Alasan</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th>Catatan HRD</th>
                                <th style="min-width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cutiSaya as $cuti)
                                <tr>
                                    <td class="fw-semibold">{{ ucfirst(str_replace('_', ' ', $cuti->jenis_cuti)) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}</td>
                                    <td>{{ $cuti->jumlah_hari }} Hari</td>
                                    <td class="alasan text-muted">{{ $cuti->alasan }}</td>
                                    <td>
                                        @if($cuti->bukti)
                                            <a href="{{ Storage::url($cuti->bukti) }}" target="_blank" class="btn-action btn-action-sm text-decoration-none">Lihat File</a>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($cuti->status == 'pending')
                                            <span class="status-pill status-pending">Pending</span>
                                        @elseif($cuti->status == 'approved')
                                            <span class="status-pill status-approved">Disetujui</span>
                                        @else
                                            <span class="status-pill status-rejected">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="catatan text-muted">{{ $cuti->catatan_hrd ?? '-' }}</td>
                                    <td>
                                        @if($cuti->status == 'pending')
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn-action btn-action-sm text-decoration-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="delete-form d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn-action btn-action-sm text-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5 text-muted">Belum terdapat catatan pengajuan cuti.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mobile-card-list">
                @forelse($cutiSaya as $cuti)
                    <div class="mobile-item-card shadow-sm">
                        <div class="d-flex justify-content-between align-items-start border-bottom pb-2 mb-2">
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 15px;">
                                    {{ ucfirst(str_replace('_', ' ', $cuti->jenis_cuti)) }}
                                </div>
                                <small class="text-muted">{{ $cuti->jumlah_hari }} Hari</small>
                            </div>
                            <div>
                                @if($cuti->status == 'pending')
                                    <span class="status-pill status-pending">Pending</span>
                                @elseif($cuti->status == 'approved')
                                    <span class="status-pill status-approved">Disetujui</span>
                                @else
                                    <span class="status-pill status-rejected">Ditolak</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-2" style="font-size: 13px;">
                            <div class="text-muted mb-1">
                                <i class="fa-regular fa-calendar-range me-1"></i> 
                                {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}
                            </div>
                            <div class="text-dark py-1">
                                <strong>Alasan:</strong> {{ $cuti->alasan }}
                            </div>
                            @if($cuti->catatan_hrd)
                                <div class="p-2 mt-2 bg-light text-muted border-start border-secondary" style="font-size: 12px; border-radius: 4px;">
                                    <strong>HRD:</strong> {{ $cuti->catatan_hrd }}
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <div>
                                @if($cuti->bukti)
                                    <a href="{{ Storage::url($cuti->bukti) }}" target="_blank" class="btn-action btn-action-sm text-decoration-none">
                                        <i class="fa-solid fa-paperclip me-1"></i> Lampiran
                                    </a>
                                @endif
                            </div>
                            
                            @if($cuti->status == 'pending')
                                <div class="d-flex gap-2">
                                    <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn-action btn-action-sm text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-action btn-action-sm text-danger btn-delete">
                                            <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 text-muted bg-white border rounded-3">
                        <i class="fa-regular fa-folder-open d-block fs-4 mb-2 text-muted"></i>
                        <span class="small">Belum terdapat catatan pengajuan cuti aktif.</span>
                    </div>
                @endforelse
            </div>

            @if($cutiSaya->hasPages())
                <div class="pt-3 px-1 d-flex justify-content-center">
                    {{ $cutiSaya->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Hapus pengajuan?',
                    text: 'Tindakan ini tidak dapat dibatalkan.',
                    showCancelButton: true,
                    confirmButtonColor: '#171717',
                    cancelButtonColor: '#737373',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-dark px-3 py-2 text-sm me-2',
                        cancelButton: 'btn btn-light border px-3 py-2 text-sm'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>