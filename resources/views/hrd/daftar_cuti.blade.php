<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bolder text-dark mb-0" style="font-size: 20px; letter-spacing: -0.5px;">
                    Pengajuan Cuti
                </h2>
                <p class="text-muted mb-0" style="font-size: 13px;">
                    Validasi permohonan karyawan.
                </p>
            </div>
            <div class="bg-white p-2 rounded-circle shadow-sm border"
                style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="fa-regular fa-bell text-dark"></i>
            </div>
        </div>
    </x-slot>

    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .stats-scroll {
            display: flex;
            overflow-x: auto;
            gap: 12px;
            padding-bottom: 10px;
            scroll-snap-type: x mandatory;
        }

        .stat-pill {
            flex: 0 0 auto;
            background: #ffffff;
            border-radius: 16px;
            padding: 16px 20px;
            min-width: 140px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            border: 1px solid #f3f4f6;
            scroll-snap-align: start;
        }

        .search-app-bar {
            background: #ffffff;
            border-radius: 50px;
            padding: 6px 6px 6px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid #f3f4f6;
        }

        .search-app-bar input {
            border: none;
            background: transparent;
            outline: none;
            box-shadow: none;
            font-size: 14px;
            font-weight: 500;
        }

        .search-app-bar input:focus {
            border: none;
            box-shadow: none;
        }

        .app-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 20px;
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 16px;
            transition: transform 0.2s;
        }

        @media (min-width: 768px) {
            .leave-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
                gap: 20px;
            }

            .app-card {
                margin-bottom: 0;
            }
        }

        .avatar-lg {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: #f8fafc;
            color: #0f172a;
            font-weight: 700;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
        }

        .date-box {
            background: #f8fafc;
            border-radius: 14px;
            padding: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .badge-app {
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .bg-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .bg-approved {
            background: #dcfce7;
            color: #15803d;
        }

        .bg-rejected {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-app {
            border-radius: 50px;
            padding: 10px 0;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
        }
    </style>

    <div class="container-fluid py-3 px-3 px-md-4" style="max-width: 1200px; margin: 0 auto;">
        <div class="stats-scroll hide-scrollbar mb-4">
            <div class="stat-pill">
                <div class="text-muted" style="font-size: 12px; font-weight: 600;">BUTUH REVIEW</div>
                <div class="fw-bolder mt-1 text-dark" style="font-size: 24px;">
                    {{ $cuti->where('status', 'pending')->count() }}</div>
            </div>
            <div class="stat-pill">
                <div class="text-muted" style="font-size: 12px; font-weight: 600;">DISETUJUI (Bln Ini)</div>
                <div class="fw-bolder mt-1 text-success" style="font-size: 24px;">
                    {{ $cuti->where('status', 'approved')->count() }}</div>
            </div>
            <div class="stat-pill">
                <div class="text-muted" style="font-size: 12px; font-weight: 600;">DITOLAK</div>
                <div class="fw-bolder mt-1 text-danger" style="font-size: 24px;">
                    {{ $cuti->where('status', 'rejected')->count() }}</div>
            </div>
            <div class="stat-pill">
                <div class="text-muted" style="font-size: 12px; font-weight: 600;">TOTAL BERKAS</div>
                <div class="fw-bolder mt-1 text-dark" style="font-size: 24px;">{{ $cuti->count() }}</div>
            </div>
        </div>
        <form method="GET" action="" class="mb-4">
            <div class="search-app-bar">
                <i class="fa-solid fa-magnifying-glass text-muted ms-2"></i>
                <input type="text" name="search" class="form-control flex-grow-1"
                    placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-dark rounded-circle"
                    style="width: 40px; height: 40px; padding: 0;">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </form>

        <div class="leave-grid pb-5">

            @forelse($cuti as $item)
                <div class="app-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="avatar-lg">
                                {{ strtoupper(substr($item->user->name, 0, 2)) }}
                            </div>
                            <div>
                                <h6 class="fw-bolder mb-1 text-dark" style="font-size: 15px;">{{ $item->user->name }}
                                </h6>
                                <p class="mb-0 text-muted" style="font-size: 12px; font-weight: 500;">
                                    <i class="fa-solid fa-briefcase me-1"></i>
                                    {{ $item->user?->department?->nama_departemen ?? 'No Dept' }}
                                </p>
                            </div>
                        </div>

                        @if ($item->status == 'pending')
                            <span class="badge-app bg-pending">Pending</span>
                        @elseif($item->status == 'approved')
                            <span class="badge-app bg-approved">Disetujui</span>
                        @else
                            <span class="badge-app bg-rejected">Ditolak</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1 rounded"
                                style="font-size: 11px; font-weight: 600;">
                                {{ ucwords(str_replace('_', ' ', $item->jenis_cuti)) }}
                            </span>
                        </div>
                        <div class="date-box">
                            <div class="text-center">
                                <div class="text-muted mb-1"
                                    style="font-size: 10px; font-weight: 700; text-transform: uppercase;">Mulai</div>
                                <div class="fw-bold text-dark" style="font-size: 13px;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M') }}</div>
                            </div>

                            <div class="text-center d-flex flex-column align-items-center px-2" style="width: 100px;">
                                <div style="height: 1px; width: 100%; background: #cbd5e1; position: relative;">
                                    <i class="fa-solid fa-chevron-right text-muted"
                                        style="position: absolute; right: -5px; top: -5px; font-size: 10px; background: #f8fafc;"></i>
                                </div>
                                <span class="fw-bolder text-primary mt-1"
                                    style="font-size: 11px;">{{ $item->jumlah_hari }} Hari</span>
                            </div>

                            <div class="text-center">
                                <div class="text-muted mb-1"
                                    style="font-size: 10px; font-weight: 700; text-transform: uppercase;">Selesai</div>
                                <div class="fw-bold text-dark" style="font-size: 13px;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        @if ($item->status != 'pending')
                            <div class="alert alert-light border mb-3">

                                <div class="small text-muted mb-1">
                                    Diproses Oleh
                                </div>

                                <div class="fw-semibold">
                                    {{ $item->approver?->name ?? '-' }}
                                </div>

                                <div class="small text-muted mt-2">
                                    {{ optional($item->approved_at)->format('d M Y H:i') }}
                                </div>

                                @if ($item->catatan_hrd)
                                    <hr>

                                    <div class="small text-muted mb-1">
                                        Catatan HRD
                                    </div>

                                    <div>
                                        {{ $item->catatan_hrd }}
                                    </div>
                                @endif

                            </div>
                        @endif

                        <div class="d-flex gap-2">

                            @if ($item->bukti)
                                <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank"
                                    class="btn btn-light border" style="width:48px">
                                    <i class="fa-solid fa-paperclip"></i>
                                </a>
                            @endif

                            @if ($item->status == 'pending')
                                <button class="btn btn-outline-danger flex-fill btnReject"
                                    data-id="{{ $item->id }}">
                                    Tolak
                                </button>

                                <button class="btn btn-success flex-fill btnApprove" data-id="{{ $item->id }}">
                                    Setujui
                                </button>
                            @elseif($item->status == 'approved')
                                <button class="btn btn-success w-100" disabled>
                                    <i class="fa fa-check me-2"></i>
                                    Disetujui
                                </button>
                            @else
                                <button class="btn btn-danger w-100" disabled>
                                    <i class="fa fa-times me-2"></i>
                                    Ditolak
                                </button>
                            @endif

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 w-100">
                    <div class="text-center py-5">
                        <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fa-regular fa-folder-open text-muted fa-2x"></i>
                        </div>
                        <h5 class="fw-bold text-dark">Kosong!</h5>
                        <p class="text-muted small mb-0">Tidak ada pengajuan cuti yang perlu diproses saat ini.</p>
                    </div>
                </div>
            @endforelse

            <form id="approveForm" method="POST" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="catatan_hrd" id="approveCatatan">
            </form>

            <form id="rejectForm" method="POST" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="catatan_hrd" id="rejectCatatan">
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btnApprove').forEach(btn => {

            btn.addEventListener('click', function() {

                let id = this.dataset.id;

                Swal.fire({
                    title: 'Setujui cuti?',
                    input: 'textarea',
                    inputPlaceholder: 'Catatan HRD (opsional)',
                    showCancelButton: true,
                    confirmButtonText: 'Setujui',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {

                        document.getElementById('approveCatatan').value = result.value;

                        let form = document.getElementById('approveForm');

                        form.action = "/hrd/cuti/" + id + "/diterima";

                        form.submit();

                    }

                });

            });

        });


        document.querySelectorAll('.btnReject').forEach(btn => {

            btn.addEventListener('click', function() {

                let id = this.dataset.id;

                Swal.fire({
                    title: 'Tolak cuti?',
                    input: 'textarea',
                    inputPlaceholder: 'Alasan penolakan',
                    inputValidator: (value) => {

                        if (!value) {
                            return "Catatan wajib diisi";
                        }

                    },
                    showCancelButton: true,
                    confirmButtonText: 'Tolak',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {

                        document.getElementById('rejectCatatan').value = result.value;

                        let form = document.getElementById('rejectForm');

                        form.action = "/hrd/cuti/" + id + "/ditolak";

                        form.submit();

                    }

                });

            });

        });
    </script>
</x-app-layout>
