<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#2563eb',
                showConfirmButton: true
            });
        </script>
    @endif

    <x-slot name="header">
        <div class="py-2 page-header-wrapper">
            <h2 class="fw-bold mb-1 text-navy-dark" style="font-size: 24px; letter-spacing: -0.5px;">
                Manajemen Departemen
            </h2>
            <p class="text-muted-cool mb-0" style="font-size: 14px;">
                Kelola struktur, kode, dan data departemen dalam perusahaan.
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

        /* Desain Tombol & Aksi */
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

        <div class="row mb-5">
            <div class="col-12">
                <div class="dashboard-card-soft shadow-sm">

                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="title-indicator"></div>
                        <h4 class="fs-5 fw-bold text-navy-dark mb-0 ml-2">
                            Tambah Departemen Baru
                        </h4>
                    </div>

                    <form action="{{ route('hrd.departemen.store') }}" method="POST">

                        @csrf

                        <div class="row g-4">

                            <div class="col-12 col-md-4">
                                <label class="form-label text-muted-cool small fw-bold mb-2">
                                    Kode Departemen
                                </label>

                                <input type="text" name="kode_departemen"
                                    class="form-control form-input-soft @error('kode_departemen') is-invalid @enderror"
                                    placeholder="Contoh: HRD, IT, FIN" value="{{ old('kode_departemen') }}" required>

                                @error('kode_departemen')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-8">
                                <label class="form-label text-muted-cool small fw-bold mb-2">
                                    Nama Departemen
                                </label>

                                <input type="text" name="nama_departemen"
                                    class="form-control form-input-soft @error('nama_departemen') is-invalid @enderror"
                                    placeholder="Contoh: Human Resource Department" value="{{ old('nama_departemen') }}"
                                    required>

                                @error('nama_departemen')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label text-muted-cool small fw-bold mb-2">
                                    Deskripsi Tugas / Fungsi
                                </label>

                                <textarea name="deskripsi_tugas" rows="3"
                                    class="form-control form-input-soft @error('deskripsi_tugas') is-invalid @enderror"
                                    placeholder="Tuliskan cakupan kerja atau tanggung jawab utama departemen di sini..." required>{{ old('deskripsi_tugas') }}</textarea>

                                @error('deskripsi_tugas')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 text-md-end text-center mt-4">
                                <button type="submit" class="btn btn-navy-action shadow-sm w-100 w-md-auto">
                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                    Simpan Departemen
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
                    <h4 class="fs-5 fw-bold text-navy-dark mb-0 ml-2">
                        Daftar Departemen Terdaftar
                    </h4>
                </div>

                <div class="row g-4">

                    @forelse($departemen as $item)
                        <div class="col-12 col-md-6 col-xl-4 mb-4">

                            <div class="announcement-card-soft">

                                <div>

                                    <div
                                        class="d-flex flex-column justify-content-between align-items-start gap-3 mb-3">

                                        <div class="d-flex gap-3 align-items-start w-100 justify-content-between">

                                            <div class="d-flex gap-2 align-items-start">

                                                <div class="announcement-icon me-1">
                                                    <i class="fa-solid fa-building"></i>
                                                </div>

                                                <div>

                                                    <h5 class="announcement-title mb-1 ml-2">
                                                        {{ $item->nama_departemen }}
                                                    </h5>

                                                    <div class="d-flex flex-wrap align-items-center gap-1 text-muted-cool ml-2"
                                                        style="font-size: .75rem;">

                                                        <span class="user-meta-badge">
                                                            Kode: {{ $item->kode_departemen }}
                                                        </span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="d-flex gap-1 flex-shrink-0">

                                                <a href="{{ route('hrd.departemen.edit', $item->id) }}"
                                                    class="btn-circle-action text-warning" title="Edit">

                                                    <i class="fa-solid fa-pen"></i>

                                                </a>

                                                <form action="{{ route('hrd.departemen.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button"
                                                        class="btn-circle-action text-danger border-0 bg-white"
                                                        title="Hapus"
                                                        onclick="Swal.fire({
                                                            title: 'Hapus Departemen?',
                                                            text: 'Yakin ingin menghapus departemen ini?',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#dc3545',
                                                            cancelButtonColor: '#6c757d',
                                                            confirmButtonText: 'Ya, Hapus',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                this.closest('form').submit();
                                                            }
                                                        })">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>
                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="announcement-content pt-1 pb-2">
                                        {{ $item->deskripsi_tugas }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="alert alert-light border text-center">

                                <i class="fa-solid fa-building fa-2x mb-3 text-secondary"></i>

                                <h5 class="mb-1">
                                    Belum ada departemen
                                </h5>

                                <p class="text-muted mb-0">
                                    Silakan tambahkan departemen terlebih dahulu.
                                </p>

                            </div>

                        </div>
                    @endforelse

                </div>

            </div>
        </div>

    </div>

</x-app-layout>
