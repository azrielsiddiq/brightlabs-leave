<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Edit Pengumuman
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm">

            <div class="card-header fw-bold">
                Edit Data Pengumuman
            </div>

            <div class="card-body">

                <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Judul
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $pengumuman->judul) }}"
                            required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Isi Pengumuman
                        </label>

                        <textarea
                            name="isi"
                            rows="6"
                            class="form-control @error('isi') is-invalid @enderror"
                            required>{{ old('isi', $pengumuman->isi) }}</textarea>

                        @error('isi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="d-flex gap-2 justify-content-end">

                        <button type="submit" class="btn btn-primary mr-2">

                            <i class="fa-solid fa-floppy-disk me-1"></i>

                            Simpan Perubahan

                        </button>

                        <a href="{{ route('pengumuman.index') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>