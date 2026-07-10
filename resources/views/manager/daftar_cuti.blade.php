<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

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

    <div class="container-fluid py-4 px-4 mx-auto" style="max-width: 1300px;">

        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label">Total Pengajuan</div>
                    <div class="stat-value">{{ $totalPengajuan }}</div>
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

        <div class="dashboard-card p-4 mb-4">
            <form id="filterForm" action="{{ route('manager.daftar_cuti') }}" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Cari Karyawan</label>
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="search" id="searchInput" class="form-control"
                                placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui
                            </option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak
                            </option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                                Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Tanggal Mulai</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}"
                            onchange="this.form.submit()">
                    </div>
                    <div class="col-md-2">
                        <div class="d-grid gap-2">
                            <a href="{{ route('manager.daftar_cuti') }}" class="btn btn-outline-danger">
                                <i class="fa-solid fa-rotate-right me-1"></i> Reset Filter
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="dashboard-card">
            <div class="p-4 border-bottom">
                <div class="dashboard-title">Daftar Pengajuan Cuti</div>
                <small class="text-muted">Menampilkan seluruh pengajuan cuti anggota tim.</small>
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
                        @forelse($pengajuanCuti as $cuti)
                            <tr>
                                <td>{{ $cuti->user->name }}</td>
                                <td>{{ $cuti->user->department->nama_departemen ?? '-' }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $cuti->jenis_cuti)) }}</td>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-light border" data-bs-toggle="modal"
                                        data-bs-target="#detailCutiModal" data-nama="{{ $cuti->user->name }}"
                                        data-departemen="{{ $cuti->user->department->nama_departemen ?? '-' }}"
                                        data-jenis="{{ ucwords(str_replace('_', ' ', $cuti->jenis_cuti)) }}"
                                        data-mulai="{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}"
                                        data-selesai="{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}"
                                        data-durasi="{{ $cuti->jumlah_hari }} Hari" data-status="{{ $cuti->status }}"
                                        data-alasan="{{ $cuti->alasan ?? 'Tidak ada alasan khusus yang dilampirkan.' }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data pengajuan cuti.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL PENGAJUAN CUTI --}}
    <div class="modal fade" id="detailCutiModal" tabindex="-1" aria-labelledby="detailCutiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px; border: none;">
                <div class="modal-header border-bottom-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold text-dark" id="detailCutiModalLabel">Detail Pengajuan Cuti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body px-4 pb-4">
                    <div class="p-3 bg-light rounded-3 mb-3 text-center">
                        <h6 class="fw-bold mb-1 text-dark" id="modal-nama">Nama Karyawan</h6>
                        <span class="text-muted small" id="modal-departemen">Nama Departemen</span>
                    </div>

                    <table class="table table-sm table-borderless my-2 align-middle">
                        <tr>
                            <td class="text-muted py-2" width="40%">Jenis Cuti</td>
                            <td class="fw-semibold text-dark py-2" id="modal-jenis">: -</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Tanggal Mulai</td>
                            <td class="fw-semibold text-dark py-2" id="modal-mulai">: -</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Tanggal Selesai</td>
                            <td class="fw-semibold text-dark py-2" id="modal-selesai">: -</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Durasi Cuti</td>
                            <td class="fw-semibold text-dark py-2" id="modal-durasi">: -</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Status</td>
                            <td class="py-2" id="modal-status">: -</td>
                        </tr>
                    </table>

                    <hr class="text-muted my-3 opacity-50">

                    <div class="mb-2">
                        <label class="form-label text-muted small fw-semibold mb-1">Alasan Pengajuan:</label>
                        <div class="p-3 bg-light rounded-3 text-secondary small" id="modal-alasan"
                            style="white-space: pre-line;">
                            -
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal"
                        style="border-radius: 8px;">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let searchInput = document.getElementById('searchInput');
        let filterForm = document.getElementById('filterForm');
        let timeout = null;

        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                filterForm.submit();
            }, 500);
        });

        const detailModal = document.getElementById('detailCutiModal');
        if (detailModal) {
            detailModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;

                const nama = button.getAttribute('data-nama');
                const departemen = button.getAttribute('data-departemen');
                const jenis = button.getAttribute('data-jenis');
                const mulai = button.getAttribute('data-mulai');
                const selesai = button.getAttribute('data-selesai');
                const durasi = button.getAttribute('data-durasi');
                const status = button.getAttribute('data-status');
                const alasan = button.getAttribute('data-alasan');

                document.getElementById('modal-nama').textContent = nama;
                document.getElementById('modal-departemen').textContent = departemen;
                document.getElementById('modal-jenis').textContent = ': ' + jenis;
                document.getElementById('modal-mulai').textContent = ': ' + mulai;
                document.getElementById('modal-selesai').textContent = ': ' + selesai;
                document.getElementById('modal-durasi').textContent = ': ' + durasi;
                document.getElementById('modal-alasan').textContent = alasan;

                const statusContainer = document.getElementById('modal-status');
                statusContainer.innerHTML = ': ';

                const badge = document.createElement('span');
                badge.className = 'badge status-badge';

                if (status === 'pending') {
                    badge.classList.add('bg-warning', 'text-dark');
                    badge.textContent = 'Pending';
                } else if (status === 'approved') {
                    badge.classList.add('bg-success');
                    badge.textContent = 'Disetujui';
                } else if (status === 'rejected') {
                    badge.classList.add('bg-danger');
                    badge.textContent = 'Ditolak';
                } else {
                    badge.classList.add('bg-secondary');
                    badge.textContent = 'Dibatalkan';
                }
                statusContainer.appendChild(badge);
            });
        }
    </script>

</x-app-layout>
