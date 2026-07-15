<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonText: 'Lanjutkan',
                customClass: {
                    confirmButton: 'btn btn-dark px-4 text-sm'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    @if (session('alert'))
        <script>
            Swal.fire({
                icon: "{{ session('alert.type') }}",
                title: "{{ session('alert.title') }}",
                text: "{{ session('alert.message') }}",
                confirmButtonText: 'Lanjutkan',
                customClass: {
                    confirmButton: 'btn btn-dark px-4 text-sm'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    <x-slot name="header">
        <div class="py-2 page-header-wrapper">
            <h2 class="fw-bold mb-1 text-navy-dark" style="font-size: 24px; letter-spacing: -0.5px;">
                Pengumuman Perusahaan
            </h2>
            <p class="text-muted-cool mb-0" style="font-size: 14px;">
                Informasi dan pengumuman terbaru perusahaan.
            </p>
        </div>
    </x-slot>

    <style>
        body {
            background: #f4f7fc !important;
        }

        .text-navy-dark {
            color: #1e2640 !important;
        }

        .text-muted-cool {
            color: #7a889f !important;
        }

        .text-secondary-cool {
            color: #5c6880 !important;
        }

        /* Efek Timbul Lembut Modern */
        .dashboard-card-soft {
            background: #ffffff;
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 20px rgba(163, 177, 198, 0.12) !important;
            padding: 24px;
        }

        .form-input-soft {
            background-color: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 12px 16px !important;
            font-size: 0.95rem;
            color: #1e2640 !important;
            transition: all 0.2s ease-in-out;
        }

        .form-input-soft:focus {
            background-color: #ffffff !important;
            border-color: #2563eb !important;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1) !important;
        }

        .info-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px;
            height: 100%;
        }

        .info-number {
            font-size: 32px;
            font-weight: 700;
            color: #1e2640;
            line-height: 1.2;
        }

        .info-label {
            color: #7a889f;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .announcement-card-soft {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(163, 177, 198, 0.06);
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px;
            height: 100%;
        }

        .announcement-card-soft:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(163, 177, 198, 0.14);
            border-color: #cbd5e1;
        }

        .announcement-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .announcement-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e2640;
            line-height: 1.4;
        }

        .announcement-content {
            font-size: 14px;
            color: #475569;
            line-height: 1.6;
        }

        .btn-navy-action {
            background-color: #1e2640 !important;
            color: #ffffff !important;
            border-radius: 10px !important;
            padding: 12px 28px !important;
            border: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-navy-action:hover {
            background-color: #2c375b !important;
            transform: translateY(-1px);
        }

        .btn-circle-action {
            width: 32px;
            height: 32px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-circle-action:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
        }

        .user-meta-badge {
            background-color: #f1f5f9;
            color: #334155;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .title-indicator {
            width: 4px;
            height: 20px;
            background-color: #2563eb;
            border-radius: 2px;
            flex-shrink: 0;
        }
    </style>

    <div class="container-fluid py-4 px-4 mx-auto" style="max-width: 1300px;">
        <div class="row g-md-4 mb-5">
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <div class="dashboard-card-soft info-card">
                    <div>
                        <div class="info-label">Total Pengumuman</div>
                        <div class="info-number">{{ $statistik['total'] }}</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <div class="dashboard-card-soft info-card">
                    <div>
                        <div class="info-label">Bulan Ini</div>
                        <div class="info-number">{{ $statistik['bulanIni'] }}</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <div class="dashboard-card-soft info-card">
                    <div>
                        <div class="info-label">Hari Ini</div>
                        <div class="info-number">{{ $statistik['hariIni'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="dashboard-card-soft shadow-sm">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="title-indicator"></div>
                        <h4 class="fs-5 fw-bold text-navy-dark mb-0 ml-2">Buat Pengumuman Baru</h4>
                    </div>

                    <form action="{{ route('pengumuman.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label text-muted-cool small fw-bold mb-2">Judul Informasi</label>
                                <input type="text" name="judul" class="form-control form-input-soft"
                                    placeholder="Contoh: Batas Pengajuan Cuti Tahunan" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-muted-cool small fw-bold mb-2 mt-3">Isi Pengumuman</label>
                                <textarea name="isi" rows="4" class="form-control form-input-soft"
                                    placeholder="Tuliskan rincian informasi secara detail di sini..." required></textarea>
                            </div>

                            <div class="col-12 text-md-end text-center mt-4">
                                <button type="submit" class="btn btn-navy-action shadow-sm w-100 w-md-auto">
                                    Publish Pengumuman
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="title-indicator"></div>
                    <h4 class="fs-5 fw-bold text-navy-dark mb-0 ml-2">Riwayat Informasi Terbit</h4>
                </div>

                <div class="row g-4">
                    @forelse($pengumuman as $item)
                        <div class="col-12 col-md-6 col-xl-4 mb-5">
                            <div class="announcement-card-soft">
                                <div>
                                    <div
                                        class="d-flex flex-column justify-content-between align-items-start gap-3 mb-3">
                                        <div class="d-flex gap-3 align-items-start w-100 justify-content-between">
                                            <div class="d-flex gap-2 align-items-start">
                                                <div class="announcement-icon me-1">
                                                    <i class="fa-solid fa-bullhorn"></i>
                                                </div>
                                                <div>
                                                    <h5 class="announcement-title mb-1 ml-2">
                                                        {{ $item->judul }}
                                                    </h5>
                                                    <div class="d-flex flex-wrap align-items-center gap-1 text-muted-cool ml-2"
                                                        style="font-size: 0.75rem;">
                                                        <span class="user-meta-badge">{{ $item->creator->name }}</span>
                                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-1 flex-shrink-0">
                                                <a href="{{ route('pengumuman.edit', $item->id) }}"
                                                    class="btn-circle-action text-warning" title="Edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('pengumuman.destroy', $item->id) }}"
                                                    method="POST" class="form-delete">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button"
                                                        class="btn-circle-action text-danger btn-delete" title="Hapus">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="announcement-content pt-1 pb-2" style="white-space: pre-line;">
                                        {{ $item->isi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 w-100">
                            <div class="dashboard-card-soft text-center py-5">
                                <p class="text-muted-cool mb-0 small">Belum ada pengumuman resmi yang diterbitkan.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(button => {

                button.addEventListener('click', function() {

                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Data pengumuman yang dihapus tidak dapat dikembalikan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#1e2640',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });

                });

            });
        });
    </script>

</x-app-layout>
