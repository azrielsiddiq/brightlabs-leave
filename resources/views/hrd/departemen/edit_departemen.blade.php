<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <h2 class="fw-bold">
            Edit Departemen
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white fw-bold">
                Edit Data Departemen
            </div>

            <div class="card-body">

                <form action="{{ route('hrd.departemen.update', $departemen->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Kode Departemen
                        </label>

                        <input
                            type="text"
                            name="kode_departemen"
                            class="form-control @error('kode_departemen') is-invalid @enderror"
                            value="{{ old('kode_departemen', $departemen->kode_departemen) }}"
                            placeholder="Contoh: IT, HRD, FIN"
                            required>

                        @error('kode_departemen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Departemen
                        </label>

                        <input
                            type="text"
                            name="nama_departemen"
                            class="form-control @error('nama_departemen') is-invalid @enderror"
                            value="{{ old('nama_departemen', $departemen->nama_departemen) }}"
                            placeholder="Contoh: Teknologi Informasi"
                            required>

                        @error('nama_departemen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi Tugas / Fungsi
                        </label>

                        <textarea
                            name="deskripsi_tugas"
                            rows="5"
                            class="form-control @error('deskripsi_tugas') is-invalid @enderror"
                            placeholder="Tuliskan tugas dan fungsi departemen..."
                            required>{{ old('deskripsi_tugas', $departemen->deskripsi_tugas) }}</textarea>

                        @error('deskripsi_tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-primary">

                            <i class="fa-solid fa-floppy-disk me-1"></i>

                            Simpan Perubahan

                        </button>

                        <a href="{{ route('hrd.departemen') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>