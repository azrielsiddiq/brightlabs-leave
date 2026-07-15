<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1 header-title">
                Daftar Cuti Tim
            </h2>
            <p class="text-muted mb-0 header-subtitle">
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

     @media (max-width: 768px) {
        .table-custom thead {
            display: none;
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
            word-break: break-word;
        }
    }


        .status-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
            white-space: nowrap;
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

        .header-title {
            font-size: 22px;
        }

        .header-subtitle {
            font-size: 14px;
        }

        .fs-7 {
            font-size: 11px;
        }

        /* ===== Jarak dasar antar card & section, berlaku di semua ukuran layar ===== */
        .row.g-3 {
            --bs-gutter-x: 1.25rem;
            --bs-gutter-y: 1.25rem;
        }

        .row.g-4 {
            --bs-gutter-x: 1.25rem;
            --bs-gutter-y: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1.75rem !important;
        }

        .dashboard-card.p-4 {
            padding: 1.5rem !important;
        }

        .table-responsive.p-4 {
            padding: 1.25rem 1.5rem 1.5rem !important;
        }

        /* ===== Filter form: field width dibatasi mulai tablet, full-width di HP ===== */
        .filter-field-search,
        .filter-field-select {
            max-width: 100%;
        }

        @media (min-width: 768px) {
            .filter-field-search {
                max-width: 300px;
            }

            .filter-field-select {
                max-width: 200px;
            }
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

            .stat-value {
                font-size: 22px;
            }

            .stat-box {
                padding: 16px;
            }

            /* jarak antar card & section dibuat lebih lega, jangan berdempetan */
            .row.g-3 {
                --bs-gutter-x: 1rem;
                --bs-gutter-y: 1.1rem;
            }

            .mb-4 {
                margin-bottom: 1.6rem !important;
            }

            .dashboard-card.p-4 {
                padding: 1.15rem !important;
            }

            .table-responsive.p-4 {
                padding: 1.1rem !important;
            }

            /* jarak antar baris filter lebih lega saat semua field stack ke bawah */
            .filter-row {
                gap: 1.1rem !important;
            }

            .filter-row .d-flex {
                gap: 1.1rem !important;
            }

            .announcement-box {
                padding: 14px;
                gap: 12px;
            }

            .announcement-container {
                gap: 16px;
            }

            .announcement-heading {
                font-size: 13px;
            }

            .announcement-desc {
                font-size: 12px;
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

    <div class="container-fluid py-3 py-md-4 px-3 px-md-4 mx-auto" style="max-width: 1300px;">

        <div class="row g-3 mb-4">
            <div class="col-6 col-md-6 col-lg-3">
                <div class="dashboard-card stat-box">
                    <div class="stat-label"><center>Total Pengajuan</center></div>
                    <div class="stat-value"><center>{{ $totalPengajuan }}</center></div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
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
            <div class="col-6 col-md-6 col-lg-3 mt-2 mt-lg-0">
                <div class="dashboard-card stat-box">
                    <div class="stat-label"><center>Ditolak</center></div>
                    <div class="stat-value"><center>{{ $rejected }}</center></div>
                </div>
            </div>
        </div>

        <div class="dashboard-card p-4 mb-4">
            <form id="filterForm" action="{{ route('manager.daftar_cuti') }}" method="GET">
                <div
                    class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 filter-row">
                    <div class="w-100 filter-field-search">
                        <label class="form-label fw-semibold text-uppercase fs-7" style="letter-spacing: 0.5px;">
                            Cari Karyawan
                        </label>
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="search" id="searchInput" class="form-control"
                                placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-3 justify-content-md-end w-100">

                        <div class="w-100 filter-field-select ml-2 mr-2">
                            <label class="form-label fw-semibold text-uppercase fs-7" style="letter-spacing: 0.5px;">
                                Status
                            </label>
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>
                                    Disetujui</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>
                                    Ditolak
                                </option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                                    Dibatalkan</option>
                            </select>
                        </div>

                        <div class="w-100 filter-field-select">
                            <label class="form-label fw-semibold text-uppercase fs-7" style="letter-spacing: 0.5px;">
                                Tanggal Mulai
                            </label>
                            <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}"
                                onchange="this.form.submit()">
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
                <table class="table modern-table align-middle table-custom">
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
                                <td data-label="Nama Karyawan">{{ $cuti->user->name }}</td>
                                <td data-label="Departemen">{{ $cuti->user->department->nama_departemen ?? '-' }}</td>
                                <td data-label="Jenis Cuti">{{ ucwords(str_replace('_', ' ', $cuti->jenis_cuti)) }}</td>
                                <td data-label="Tanggal Mulai">{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}</td>
                                <td data-label="Tanggal Selesai">{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}</td>
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
                                <td data-label="Aksi">
                                    <button type="button" class="btn btn-sm btn-light border" data-bs-toggle="modal"
                                        data-bs-target="#detailCutiModal"
                                        data-nama="{{ $cuti->user->name }}"
                                        data-departemen="{{ $cuti->user->department->nama_departemen ?? '-' }}"
                                        data-jenis="{{ ucwords(str_replace('_', ' ', $cuti->jenis_cuti)) }}"
                                        data-mulai="{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}"
                                        data-selesai="{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}"
                                        data-durasi="{{ $cuti->jumlah_hari }} Hari"
                                        data-status="{{ $cuti->status }}"
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