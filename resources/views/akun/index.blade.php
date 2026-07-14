<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @php
        $routePrefix = auth()->user()->role;
    @endphp

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
        <div class="py-3 bg-white border-bottom">
            <div class="container-fluid px-4 mx-auto" style="max-width: 1200px;">
                <span class="fw-semibold small text-uppercase tracking-wider"
                    style="font-size: 11px; color: #2563eb; letter-spacing: 0.5px;">Karyawan & Akses</span>
                <h2 class="fw-bold mb-0 text-dark" style="font-size: 20px; letter-spacing: -0.5px; color: #0f172a;">
                    Manajemen Akun Pengguna
                </h2>
                <p class="text-muted small mb-0 mt-0.5">
                    Buat, ubah, dan kelola otoritas akses sistem kerja karyawan.
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        body {
            background: #f8fafc !important;
            color: #334155;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .card-custom {
            background: #ffffff;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 24px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
        }

        .form-control-custom {
            background-color: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 8px !important;
            padding: 10px 14px !important;
            font-size: 0.875rem;
            color: #1e293b !important;
            width: 100%;
            transition: all 0.15s ease-in-out;
        }

        .form-control-custom:focus {
            border-color: #94a3b8 !important;
            box-shadow: 0 0 0 3px rgba(148, 163, 184, 0.12) !important;
            outline: none;
        }

        .label-custom {
            font-size: 0.78rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
            display: block;
        }

        .btn-custom {
            background-color: #0f172a !important;
            color: #ffffff !important;
            border-radius: 8px !important;
            padding: 10px 24px !important;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
            transition: background-color 0.15s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn-custom:hover {
            background-color: #1e293b !important;
            color: #ffffff !important;
        }



        .hover-primary:hover {
            background-color: #f1f5f9 !important;
            color: #2563eb !important;
            border-color: #bfdbfe !important;
        }

        .hover-danger:hover {
            background-color: #fef2f2 !important;
            color: #dc2626 !important;
            border-color: #fca5a5 !important;
        }

.modern-table th {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #64748b;
    font-weight: 600;
    background-color: #f8fafc !important;
    border-bottom: 1px solid #e2e8f0 !important;
    padding: 12px 16px !important;
}

.modern-table td {
    font-size: 0.875rem;
    color: #334155;
    padding: 14px 16px !important;
    border-bottom: 1px solid #f1f5f9 !important;
}

/* Mobile view */
@media (max-width: 768px) {
    .modern-table thead {
        display: none;
    }
    .modern-table tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem;
        background: #fff;
    }
    .modern-table td {
        display: flex;
        justify-content: space-between;
        padding: 8px 12px !important;
        font-size: 0.8rem;
    }
    .modern-table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #64748b;
    }
}





    </style>

    <div class="container-fluid py-4 px-4 mx-auto" style="max-width: 1300px;">
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4 d-flex align-items-center gap-2"
                style="border-radius: 8px; background-color: #f0fdf4; color: #166534; font-size: 0.875rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger border-0 shadow-sm mb-4 d-flex align-items-center gap-2"
                style="border-radius: 8px; background-color: #fef2f2; color: #991b1b; font-size: 0.875rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-12">
                <div class="card-custom">
                    <div class="border-bottom pb-3 mb-4 d-flex align-items-center gap-2">
                        <div class="p-1.5 rounded bg-light border text-secondary d-flex align-items-center"
                            style="width: 28px; height: 28px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <line x1="19" y1="8" x2="19" y2="14" />
                                <line x1="16" y1="11" x2="22" y2="11" />
                            </svg>
                        </div>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 14px; color: #0f172a;">Registrasi Akun Baru
                        </h4>
                    </div>

                    <form
                        action="{{ auth()->user()->role == 'manager' ? route('manager.user.store') : route('hrd.user.store') }}"
                        method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="label-custom">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control form-control-custom"
                                    value="{{ old('name') }}" required placeholder="Nama lengkap karyawan">
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="label-custom">Alamat Email Resmi</label>
                                <input type="email" name="email" class="form-control form-control-custom"
                                    value="{{ old('email') }}" required placeholder="contoh@perusahaan.com">
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <label class="label-custom">Hak Akses / Role</label>

                                <select name="role" class="form-select form-control-custom" required>
                                    <option value="" disabled selected>Pilih Otoritas</option>

                                    <option value="karyawan">Karyawan</option>

                                    @if (auth()->user()->role == 'manager')
                                        <option value="manager">Manager</option>
                                        <option value="hrd">HRD</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 mt-3">
                                <label class="label-custom">Penempatan Departemen</label>
                                <select name="department_id" class="form-select form-control-custom" required>
                                    <option value="" disabled selected>Pilih Departemen Unit kerja</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->kode_departemen }} - {{ $department->nama_departemen }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-12 col-lg-6 mt-3">
                                <label class="label-custom">Kata Sandi / Password</label>
                                <input type="password" name="password" class="form-control form-control-custom"
                                    required placeholder="Minimal 8 karakter">
                            </div>

                            <div class="col-12 text-end mt-4 pt-2 border-top">
                                <button type="submit" class="btn btn-custom w-100 w-md-auto">
                                    Daftarkan Pengguna
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    <div class="col-12">
    <div class="card-custom">
        <!-- Header -->
        <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <div class="p-1.5 rounded bg-light border text-secondary d-flex align-items-center"
                    style="width: 28px; height: 28px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <h4 class="fw-bold text-dark mb-0" style="font-size: 14px;">Daftar Pengguna Aktif</h4>
            </div>
            <span class="badge fw-semibold px-2.5 py-1 text-secondary bg-light border"
                style="font-size: 11px; border-radius: 6px;">
                Total: {{ count($users) }} Akun
            </span>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle modern-table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Departemen</th>
                        <th class="text-end" style="width: 140px;">Aksi Berkas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td data-label="Nama Pengguna" class="fw-bold text-dark">{{ $user->name }}</td>
                            <td data-label="Email" class="text-muted">{{ $user->email }}</td>
                            <td data-label="Role">
                                @if ($user->role == 'manager')
                                    <span class="badge rounded-pill fw-bold"
                                        style="font-size: 11px; background-color: #dbeafe; color: #1e40af;">
                                        Manager
                                    </span>
                                @elseif($user->role == 'hrd')
                                    <span class="badge rounded-pill fw-bold"
                                        style="font-size: 11px; background-color: #dcfce7; color: #166534;">
                                        HRD
                                    </span>
                                @else
                                    <span class="badge rounded-pill fw-bold"
                                        style="font-size: 11px; background-color: #f1f5f9; color: #475569;">
                                        Karyawan
                                    </span>
                                @endif
                            </td>
                            <td data-label="Departemen" class="text-secondary">{{ $user->department?->nama_departemen ?? '-' }}</td>
                            <td data-label="Aksi Berkas" class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route($routePrefix.'.user.edit', $user->id) }}"
                                        class="btn btn-light btn-sm border" title="Ubah Akses Akun">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route($routePrefix.'.user.destroy', $user->id) }}" method="POST"
                                        class="form-delete d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <i class="fa-regular fa-circle-xmark fa-2x mb-2" style="color:#94a3b8;"></i>
                                <p class="mb-0 fw-medium small">Belum ada data pengguna internal perusahaan yang terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



</div>




        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.btn-delete').forEach(function(button) {

                button.addEventListener('click', function() {

                    const form = this.closest('.form-delete');

                    Swal.fire({
                        title: 'Hapus akun?',
                        text: 'Data akun yang dihapus tidak dapat dikembalikan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Hapus',
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
