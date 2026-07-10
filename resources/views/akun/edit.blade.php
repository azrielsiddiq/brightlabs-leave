<x-app-layout>

    @php
        $routePrefix = auth()->user()->role;
    @endphp
    <div class="container-fluid px-4 py-4" style="color: #334155; font-family: system-ui, -apple-system, sans-serif;">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h2 class="fw-bold mb-1 text-dark" style="font-size: 1.4rem; letter-spacing: -0.5px; color: #0f172a;">
                    Edit Pengguna
                </h2>
                <p class="text-muted mb-0" style="font-size: 0.85rem;">Perbarui data profil, hak akses, dan departemen
                    karyawan.</p>
            </div>
            <a href="{{ route(auth()->user()->role . '.user') }}" class="btn btn-sm d-flex align-items-center gap-2"
                style="border: 1px solid #cbd5e1; background: #fff; color: #475569; border-radius: 6px; padding: 7px 14px; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
                Kembali
            </a>
        </div>

        <form action="{{ route(auth()->user()->role . '.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-xl-3 col-md-4">
                    <div class="p-3 bg-white border rounded-3 mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded border bg-light text-secondary"
                                style="width: 48px; height: 48px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark" style="font-size: 1rem;">{{ $user->name }}</h5>
                                <span class="text-muted d-block mt-0.5" style="font-size: 12px;">ID Anggota:
                                    #{{ $user->id }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-md-8">
                    <div class="bg-white border p-4 rounded-3" style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">

                        <h4 class="fw-semibold text-dark mb-4"
                            style="font-size: 1rem; border-left: 3px solid #0f172a; padding-left: 10px;">Informasi
                            Profil</h4>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark mb-1.5" style="font-size: 0.85rem;">Nama
                                    Lengkap</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required
                                    style="border-radius: 6px; border-color: #cbd5e1; padding: 10px 14px; font-size: 0.9rem; color: #0f172a;">
                                @error('name')
                                    <div class="invalid-feedback small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark mb-1.5" style="font-size: 0.85rem;">Alamat
                                    Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required
                                    style="border-radius: 6px; border-color: #cbd5e1; padding: 10px 14px; font-size: 0.9rem; color: #0f172a;">
                                @error('email')
                                    <div class="invalid-feedback small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark mb-1.5" style="font-size: 0.85rem;">Role /
                                    Hak Akses</label>
                                <select name="role" class="form-select" required>

                                    @if (auth()->user()->role == 'manager')

                                        <option value="karyawan"
                                            {{ old('role', $user->role) == 'karyawan' ? 'selected' : '' }}>
                                            Karyawan
                                        </option>

                                        <option value="manager"
                                            {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>
                                            Manager
                                        </option>

                                        <option value="hrd"
                                            {{ old('role', $user->role) == 'hrd' ? 'selected' : '' }}>
                                            HRD
                                        </option>
                                    @else
                                        <option value="karyawan"
                                            {{ old('role', $user->role) == 'karyawan' ? 'selected' : '' }}>
                                            Karyawan
                                        </option>

                                        @if ($user->id == auth()->id())
                                            <option value="hrd" selected>
                                                HRD
                                            </option>
                                        @endif

                                    @endif

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark mb-1.5"
                                    style="font-size: 0.85rem;">Departemen</label>
                                <select name="department_id"
                                    class="form-select @error('department_id') is-invalid @enderror" required
                                    style="border-radius: 6px; border-color: #cbd5e1; padding: 10px 14px; font-size: 0.9rem; color: #0f172a;">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                                            {{ $department->kode_departemen }} — {{ $department->nama_departemen }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <div class="p-3 rounded border"
                                    style="border-color: #e2e8f0 !important; background-color: #f8fafc;">
                                    <label class="form-label fw-semibold text-dark mb-1"
                                        style="font-size: 0.85rem;">Ubah Password (Opsional)</label>
                                    <p class="text-muted mb-2.5" style="font-size: 12px; line-height: 1.4;">Kosongkan
                                        kolom ini jika tidak ingin memperbarui password.</p>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Masukkan password baru"
                                        style="border-radius: 6px; border-color: #cbd5e1; padding: 10px 14px; font-size: 0.9rem; background-color: #fff !important;">
                                    @error('password')
                                        <div class="invalid-feedback small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route(auth()->user()->role . '.user') }}" class="btn"
                                style="border: 1px solid #e2e8f0; background: #fff; color: #64748b; border-radius: 6px; padding: 9px 20px; font-size: 0.875rem; font-weight: 500;">
                                Batal
                            </a>
                            <button type="submit" class="btn text-white"
                                style="background-color: #0f172a; border: none; border-radius: 6px; padding: 9px 24px; font-size: 0.875rem; font-weight: 500; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                                Simpan Perubahan
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>
