@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
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

        .status-pending {
            color: var(--text-main);
        }

        .status-pending::before {
            background-color: #a3a3a3;
        }

        .status-approved {
            color: var(--text-main);
            font-weight: 600;
        }

        .status-approved::before {
            background-color: var(--text-main);
        }

        .status-rejected {
            color: var(--text-muted);
            text-decoration: line-through;
        }

        .status-rejected::before {
            background-color: var(--border-color);
        }

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
                <h2 class="fw-bold mb-1" style="font-size: 22px; color: var(--text-main); letter-spacing: -0.02em;">
                    Riwayat Pengajuan Cuti</h2>
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
                        <small class="text-uppercase tracking-wider fw-semibold d-block text-truncate"
                            style="font-size: 10px; color: var(--text-muted);">Total</small>
                        <h3 class="fw-bold mb-0 mt-1" style="color: var(--text-main); font-size: calc(16px + 1vw);">
                            {{ $cutiSaya->total() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card stats-card shadow-sm text-center text-sm-start">
                    <div class="card-body p-3 p-md-4">
                        <small class="text-uppercase tracking-wider fw-semibold d-block text-truncate"
                            style="font-size: 10px; color: var(--text-muted);">Pending</small>
                        <h3 class="fw-bold mb-0 mt-1" style="color: var(--text-main); font-size: calc(16px + 1vw);">
                            {{ $cutiSaya->where('status', 'pending')->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card stats-card shadow-sm text-center text-sm-start">
                    <div class="card-body p-3 p-md-4">
                        <small class="text-uppercase tracking-wider fw-semibold d-block text-truncate"
                            style="font-size: 10px; color: var(--text-muted);">Disetujui</small>
                        <h3 class="fw-bold mb-0 mt-1" style="color: var(--text-main); font-size: calc(16px + 1vw);">
                            {{ $cutiSaya->where('status', 'approved')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card shadow-sm border border-secondary-subtle d-none d-md-block mb-3"
                style="border-radius: 12px;">
                <div class="card-header bg-light py-3 px-4 border-bottom border-secondary-subtle">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 15px; letter-spacing: -0.3px;">Riwayat
                                Pengajuan Cuti</h6>
                            <small class="text-muted" style="font-size: 12px;">Daftar seluruh berkas permohonan
                                Anda</small>
                        </div>
                        <span class="badge bg-dark px-2.5 py-1.5 rounded-pill font-monospace"
                            style="font-size: 11px;">Total: {{ $cutiSaya->total() }}</span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0"
                        style="font-size: 13px; table-layout: fixed; width: 100%;">
                        <thead class="table-light border-bottom border-secondary-subtle text-dark fw-bold"
                            style="font-size: 11px; letter-spacing: 0.8px; text-transform: uppercase;">
                            <tr>
                                <th class="ps-4 py-3" style="background: #f8fafc; width: 140px;">Kategori</th>
                                <th class="py-3" style="background: #f8fafc; width: 115px;">Mulai</th>
                                <th class="py-3" style="background: #f8fafc; width: 115px;">Selesai</th>
                                <th class="py-3 text-center" style="background: #f8fafc; width: 85px;">Durasi</th>
                                <th class="py-3" style="background: #f8fafc; width: 180px;">Alasan</th>
                                <th class="py-3" style="background: #f8fafc; width: 110px;">Bukti</th>
                                <th class="py-3" style="background: #f8fafc; width: 120px;">Status</th>
                                <th class="py-3" style="background: #f8fafc; width: 140px;">Diproses Oleh</th>
                                <th class="py-3" style="background: #f8fafc; width: 180px;">Catatan HRD</th>
                                <th class="pe-4 text-end" style="background: #f8fafc; width: 90px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($cutiSaya as $cuti)
                                <tr style="transition: background-color 0.15s ease;">
                                    <td class="ps-4 fw-bold text-dark text-truncate">
                                        {{ ucfirst(str_replace('_', ' ', $cuti->jenis_cuti)) }}
                                    </td>
                                    <td class="text-nowrap text-secondary fw-medium">
                                        <i
                                            class="fa-regular fa-calendar me-1.5 opacity-50"></i>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d/m/Y') }}
                                    </td>
                                    <td class="text-nowrap text-secondary fw-medium">
                                        <i
                                            class="fa-regular fa-calendar me-1.5 opacity-50"></i>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 font-monospace fw-bold"
                                            style="font-size: 11px;">
                                            {{ $cuti->jumlah_hari }} H
                                        </span>
                                    </td>
                                    <td class="text-secondary text-truncate" title="{{ $cuti->alasan }}">
                                        {{ $cuti->alasan }}
                                    </td>
                                    <td>
                                        @if ($cuti->bukti)
                                            <a href="{{ Storage::url($cuti->bukti) }}" target="_blank"
                                                class="btn btn-sm btn-white border border-secondary-subtle text-dark py-0.5 px-2 text-decoration-none shadow-xs"
                                                style="font-size: 11px; font-weight: 500; border-radius: 4px;">
                                                <i class="fa-solid fa-paperclip text-muted me-1"></i>Lihat
                                            </a>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cuti->status == 'pending')
                                            <span
                                                class="badge bg-warning-subtle text-warning border border-warning px-2 py-1 rounded"
                                                style="font-size: 11px; font-weight: 600;"><i
                                                    class="fa-solid fa-circle-notch fa-spin me-1"></i>Pending</span>
                                        @elseif($cuti->status == 'approved')
                                            <span
                                                class="badge bg-success-subtle text-success border border-success px-2 py-1 rounded"
                                                style="font-size: 11px; font-weight: 600;"><i
                                                    class="fa-solid fa-check me-1"></i>Disetujui</span>
                                        @else
                                            <span
                                                class="badge bg-danger-subtle text-danger border border-danger px-2 py-1 rounded"
                                                style="font-size: 11px; font-weight: 600;"><i
                                                    class="fa-solid fa-xmark me-1"></i>Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold text-dark text-truncate"
                                        title="{{ $cuti->approver->name ?? '-' }}">
                                        {{ $cuti->approver->name ?? '-' }}
                                    </td>
                                    <td class="text-secondary text-truncate small"
                                        title="{{ $cuti->catatan_hrd ?? '-' }}">
                                        {{ $cuti->catatan_hrd ?? '-' }}
                                    </td>
                                    <td class="pe-4 text-end">
                                        @if ($cuti->status == 'pending')
                                            <div class="btn-group btn-group-sm border rounded bg-white shadow-xs">
                                                <a href="{{ route('cuti.edit', $cuti->id) }}"
                                                    class="btn btn-link text-secondary border-end p-1 text-decoration-none"
                                                    title="Edit"
                                                    style="width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center;">
                                                    <i class="fa-solid fa-pen-to-square small"></i>
                                                </a>
                                                <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST"
                                                    class="delete-form d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-link text-danger p-1 btn-delete" title="Hapus"
                                                        style="width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center;">
                                                        <i class="fa-solid fa-trash-can small"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5 text-muted bg-white">
                                        <i
                                            class="fa-regular fa-folder-open d-block fs-3 mb-2 text-muted opacity-50"></i>
                                        Belum terdapat catatan pengajuan cuti.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-block d-md-none mb-3">
                @forelse($cutiSaya as $cuti)
                    <div class="card shadow-sm border border-secondary-subtle mb-2.5 bg-white"
                        style="border-radius: 10px;">
                        <div class="card-body p-3">
                            <div
                                class="d-flex justify-content-between align-items-start border-bottom border-light pb-2.5 mb-2.5">
                                <div>
                                    <div class="fw-bold text-dark" style="font-size: 15px; letter-spacing: -0.2px;">
                                        {{ ucfirst(str_replace('_', ' ', $cuti->jenis_cuti)) }}
                                    </div>
                                    <span
                                        class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 mt-1 font-monospace"
                                        style="font-size: 11px;">
                                        {{ $cuti->jumlah_hari }} Hari Kerja
                                    </span>
                                </div>
                                <div>
                                    @if ($cuti->status == 'pending')
                                        <span
                                            class="badge bg-warning-subtle text-warning border border-warning px-2 py-1"
                                            style="font-size: 11px;">Pending</span>
                                    @elseif($cuti->status == 'approved')
                                        <span
                                            class="badge bg-success-subtle text-success border border-success px-2 py-1"
                                            style="font-size: 11px;">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger border border-danger px-2 py-1"
                                            style="font-size: 11px;">Ditolak</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 text-secondary" style="font-size: 13px;">
                                <div class="bg-light p-2 rounded mb-2 border border-secondary-subtle d-flex align-items-center gap-2"
                                    style="font-size: 12px;">
                                    <i class="fa-regular fa-calendar-days text-muted"></i>
                                    <span class="fw-medium text-dark">
                                        {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}
                                    </span>
                                    <span class="text-muted opacity-50">→</span>
                                    <span class="fw-medium text-dark">
                                        {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}
                                    </span>
                                </div>

                                <div class="pt-1 mb-2">
                                    <strong class="text-dark d-block mb-0.5"
                                        style="font-size: 11px; text-transform: uppercase; color: #64748b !important;">Alasan:</strong>
                                    <span style="color: #334155;">{{ $cuti->alasan }}</span>
                                </div>

                                @if ($cuti->status != 'pending')
                                    <div class="p-2.5 mt-2 bg-light text-secondary border-start border-3 border-dark rounded-end"
                                        style="font-size: 12px; background-color: #f8fafc !important;">
                                        <div class="mb-1">
                                            <strong class="text-dark">Validator HRD:</strong>
                                            {{ $cuti->approver->name ?? '-' }}
                                        </div>
                                        @if ($cuti->catatan_hrd)
                                            <div>
                                                <strong class="text-dark">Catatan:</strong> {{ $cuti->catatan_hrd }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div
                                class="d-flex justify-content-between align-items-center pt-2.5 border-top border-light">
                                <div>
                                    @if ($cuti->bukti)
                                        <a href="{{ Storage::url($cuti->bukti) }}" target="_blank"
                                            class="btn btn-sm btn-link text-decoration-none text-secondary p-0 fw-medium d-inline-flex align-items-center gap-1"
                                            style="font-size: 13px;">
                                            <i class="fa-solid fa-paperclip text-muted"></i> Lihat Lampiran
                                        </a>
                                    @endif
                                </div>

                                @if ($cuti->status == 'pending')
                                    <div class="d-flex gap-1.5">
                                        <a href="{{ route('cuti.edit', $cuti->id) }}"
                                            class="btn btn-sm btn-outline-secondary px-3 py-1"
                                            style="font-size: 12px; border-radius: 6px; font-weight: 500;">
                                            Edit
                                        </a>
                                        <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST"
                                            class="delete-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger px-3 py-1 btn-delete"
                                                style="font-size: 12px; border-radius: 6px; font-weight: 500;">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 text-muted bg-white border border-secondary-subtle rounded"
                        style="border-radius: 12px;">
                        <i class="fa-regular fa-folder-open d-block fs-3 mb-2 text-muted opacity-50"></i>
                        <span class="small">Belum terdapat catatan pengajuan cuti.</span>
                    </div>
                @endforelse
            </div>

            @if ($cutiSaya->hasPages())
                <div class="pt-3 d-flex justify-content-center">
                    {{ $cutiSaya->links() }}
                </div>
            @endif
        </div>

    </div>

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
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

        document.querySelectorAll('.btn-delete').forEach(function(button) {
            button.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin membatalkan/menghapus pengajuan cuti ini?')) {
                    this.closest('form').submit();
                }
            });
        });
    </script>
</x-app-layout>
