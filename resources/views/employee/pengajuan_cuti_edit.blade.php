@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('alert'))
        <script>
            Swal.fire({
                icon: "{{ session('alert.type') }}",
                title: "{{ session('alert.title') }}",
                text: "{{ session('alert.message') }}",
                confirmButtonText: 'Lanjutkan',
                customClass: { confirmButton: 'btn btn-dark px-4 text-sm' },
                buttonsStyling: false
            }).then(() => {
                @if(session('alert.type') === 'success')
                    window.location.href = "{{ route('riwayat.cuti') }}";
                @endif
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'Perbaiki',
                customClass: { confirmButton: 'btn btn-dark px-4 text-sm' },
                buttonsStyling: false
            });
        </script>
    @endif

    <style>
        :root {
            --slate-900: #0f172a;
            --slate-700: #334155;
            --slate-400: #94a3b8;
            --slate-200: #e2e8f0;
            --slate-50: #f8fafc;
        }

        body {
            background-color: var(--slate-50);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--slate-900);
            -webkit-font-smoothing: antialiased;
        }

        .page-header {
            border-bottom: 1px solid var(--slate-200);
            padding-bottom: 24px;
            margin-bottom: 32px;
        }

        .form-container {
            background: #ffffff !important;
            border: 1px solid var(--slate-200) !important;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        .field-label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: var(--slate-700);
            margin-bottom: 8px;
            display: block;
        }

        .input-premium {
            border: 1px solid var(--slate-200) !important;
            border-radius: 8px !important;
            padding: 12px 16px;
            font-size: 14px;
            color: var(--slate-900) !important;
            background-color: #ffffff !important;
            transition: all 0.2s ease;
            width: 100%;
            display: block;
        }

        .input-premium:focus {
            border-color: var(--slate-900) !important;
            outline: none;
            box-shadow: 0 0 0 1px var(--slate-900) !important;
        }

        .input-premium[readonly] {
            background-color: var(--slate-50) !important;
            color: var(--slate-400) !important;
            cursor: not-allowed;
        }

        .btn-minimal {
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-minimal-secondary {
            background: #ffffff;
            border: 1px solid var(--slate-200);
            color: var(--slate-700);
        }

        .btn-minimal-secondary:hover {
            background: var(--slate-50);
            border-color: var(--slate-400);
            color: var(--slate-900);
        }

        .btn-minimal-primary {
            background: var(--slate-900);
            border: 1px solid var(--slate-900);
            color: #ffffff;
        }

        .btn-minimal-primary:hover {
            background: #1e293b;
            border-color: #1e293b;
        }

        .preview-panel {
            padding: 16px;
            border: 1px dashed var(--slate-200);
            border-radius: 8px;
            background: var(--slate-50);
            margin-bottom: 16px;
        }

        .bukti-wrapper {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bukti-wrapper.show {
            max-height: 300px;
            opacity: 1;
            margin-top: 20px;
        }

        @media (max-width: 767.98px) {
            .page-header {
                margin-bottom: 20px;
                padding-bottom: 12px;
            }
            .form-container {
                padding: 20px 16px !important;
                border-radius: 12px !important;
                background: #ffffff !important;
                border: 1px solid var(--slate-200) !important;
            }
            .input-premium {
                padding: 14px 12px;
                font-size: 15px;
            }
            .button-stack-mobile {
                flex-direction: column-reverse;
                gap: 10px !important;
                margin-top: 24px;
            }
            .button-stack-mobile .btn-minimal {
                width: 100%;
                padding: 14px;
            }
        }
    </style>

    <div class="container py-4 px-2 px-md-5">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-11">

                <div class="page-header">
                    <h2 class="fw-bold tracking-tight mb-1" style="font-size: 24px; color: var(--slate-900);">Edit Pengajuan Cuti</h2>
                    <p class="text-muted mb-0" style="font-size: 14px; color: var(--slate-400);">
                        Perbarui data permohonan operasional cuti Anda yang masih berstatus pending.
                    </p>
                </div>

                <div class="form-container">
                    <form method="POST" action="{{ route('cuti.update', $cuti->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="field-label">Kategori Cuti</label>
                            <select name="jenis_cuti" id="jenis_cuti" class="input-premium form-select" required>
                                <option value="cuti_tahunan" {{ old('jenis_cuti', $cuti->jenis_cuti) == 'cuti_tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                                <option value="cuti_sakit" {{ old('jenis_cuti', $cuti->jenis_cuti) == 'cuti_sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                                <option value="cuti_penting" {{ old('jenis_cuti', $cuti->jenis_cuti) == 'cuti_penting' ? 'selected' : '' }}>Cuti Penting</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-4">
                                <label class="field-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="input-premium" value="{{ old('tanggal_mulai', $cuti->tanggal_mulai) }}" required>
                            </div>

                            <div class="col-6 mb-4">
                                <label class="field-label">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="input-premium" value="{{ old('tanggal_selesai', $cuti->tanggal_selesai) }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="field-label">Durasi Terhitung</label>
                            <input type="text" id="jumlah_hari" class="input-premium" placeholder="Otomatis terhitung oleh sistem" readonly value="{{ $cuti->jumlah_hari }} Hari Kerja">
                        </div>

                        <div class="mb-2">
                            <label class="field-label">Alasan Pengajuan</label>
                            <textarea name="alasan" rows="4" class="input-premium" placeholder="Tuliskan alasan perbaikan permohonan Anda secara jelas" required>{{ old('alasan', $cuti->alasan) }}</textarea>
                        </div>

                        <div class="bukti-wrapper" id="bukti-section">
                            @if($cuti->bukti)
                                <div class="preview-panel">
                                    <span class="field-label mb-2" style="color: var(--slate-900);">Dokumen Lampiran Aktif</span>
                                    <div>
                                        <a href="{{ Storage::url($cuti->bukti) }}" target="_blank" class="btn-minimal btn-minimal-secondary py-1.5 px-3 text-xs" style="font-size: 13px; padding: 6px 12px;">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1.5" style="font-size: 11px;"></i> Periksa Berkas Lama
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <label class="field-label">Unggah Dokumen Baru</label>
                            <input type="file" name="bukti" id="bukti" class="input-premium">
                            <div class="mt-2" style="font-size: 12px; color: var(--slate-400);">
                                Abaikan atau kosongkan bagian ini jika tidak ingin memperbarui berkas lampiran lama.
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 button-stack-mobile mt-4 pt-3" style="border-top: 1px solid var(--slate-200);">
                            <a href="{{ route('riwayat.cuti') }}" class="btn-minimal btn-minimal-secondary mr-4">
                                Batalkan
                            </a>
                            <button type="submit" class="btn-minimal btn-minimal-primary">
                                Perbarui Permohonan
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        const jenisCuti = document.getElementById('jenis_cuti');
        const buktiSection = document.getElementById('bukti-section');
        const tanggalMulai = document.getElementById('tanggal_mulai');
        const tanggalSelesai = document.getElementById('tanggal_selesai');
        const jumlahHari = document.getElementById('jumlah_hari');

        function toggleBukti() {
            if (jenisCuti.value === 'cuti_sakit') {
                buktiSection.classList.add('show');
            } else {
                buktiSection.classList.remove('show');
            }
        }

        function hitungJumlahHari() {
            if (!tanggalMulai.value || !tanggalSelesai.value) {
                jumlahHari.value = '';
                return;
            }

            const mulai = new Date(tanggalMulai.value);
            const selesai = new Date(tanggalSelesai.value);
            const selisih = Math.floor((selesai - mulai) / (1000 * 60 * 60 * 24)) + 1;

            jumlahHari.value = selisih > 0 ? `${selisih} Hari Kerja` : '';
        }

        jenisCuti.addEventListener('change', toggleBukti);
        tanggalMulai.addEventListener('change', hitungJumlahHari);
        tanggalSelesai.addEventListener('change', hitungJumlahHari);

        toggleBukti();
        hitungJumlahHari();
    </script>
</x-app-layout>