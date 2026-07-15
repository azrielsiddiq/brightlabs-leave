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
                customClass: {
                    confirmButton: 'btn btn-dark px-4 text-sm'
                },
                buttonsStyling: false
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

        .info-panel {
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: 12px;
            padding: 16px 20px;
        }

        .info-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--slate-400);
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--slate-700);
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

        .bukti-wrapper {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bukti-wrapper.show {
            max-height: 160px;
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
                <h2 class="fw-bold tracking-tight mb-1" style="font-size: 24px; color: var(--slate-900);">Pengajuan Cuti</h2>
                <p class="text-muted mb-0" style="font-size: 14px; color: var(--slate-400);">
                    Silakan lengkapi formulir di bawah ini secara akurat.
                </p>
            </div>

            <div class="row g-2 g-md-3 mb-4">
                @php
                    $rules = [
                        ['title' => 'Tahunan', 'value' => 'Maks. 12 Hari Kerja'],
                        ['title' => 'Medis / Sakit', 'value' => 'Wajib Lampiran SKD'],
                        ['title' => 'Kebutuhan Penting', 'value' => 'Maks. 3 Hari Kerja'],
                    ];
                @endphp

                @foreach($rules as $rule)
                    <div class="col-12 col-md-4">
                        <div class="info-panel">
                            <div class="info-label">{{ $rule['title'] }}</div>
                            <div class="info-value">{{ $rule['value'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="form-container">
                <!-- Tambahkan id="formCuti" untuk divalidasi oleh JavaScript -->
                <form action="{{ route('cuti.store') }}" method="POST" enctype="multipart/form-data" id="formCuti">
                    @csrf

                    <div class="mb-4">
                        <label class="field-label">Kategori Cuti <span class="text-danger">*</span></label>
                        <select name="jenis_cuti" id="jenis_cuti" class="input-premium form-select" required>
                            <option value="">Pilih salah satu kategori</option>
                            <option value="cuti_tahunan" {{ old('jenis_cuti') == 'cuti_tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                            <option value="cuti_sakit" {{ old('jenis_cuti') == 'cuti_sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                            <option value="cuti_penting" {{ old('jenis_cuti') == 'cuti_penting' ? 'selected' : '' }}>Cuti Penting</option>
                        </select>
                    </div>

                    <!-- STRUKTUR ROW TANGGAL SUDAH DIPERBAIKI & DIBERSIHKAN -->
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label class="field-label">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="input-premium" value="{{ old('tanggal_mulai') }}" required>
                        </div>

                        <div class="col-6 mb-4">
                            <label class="field-label">Tanggal Selesai <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="input-premium" value="{{ old('tanggal_selesai') }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="field-label">Durasi Terhitung <span class="text-muted text-lowercase font-italic">(Terisi otomatis)</span></label>
                        <input type="text" id="jumlah_hari" class="input-premium" placeholder="Otomatis terhitung oleh sistem" readonly>
                    </div>

                    <div class="mb-2">
                        <label class="field-label">Alasan Pengajuan <span class="text-danger">*</span></label>
                        <textarea name="alasan" rows="4" class="input-premium" placeholder="Tuliskan komitmen atau alasan kebutuhan cuti Anda secara profesional" required>{{ old('alasan') }}</textarea>
                    </div>

                    <div class="bukti-wrapper" id="bukti-section">
                        <label class="field-label">Dokumen Medis Pendukung</label>
                        <input type="file" name="bukti" class="input-premium">
                        <div class="mt-2" style="font-size: 12px; color: var(--slate-400);">
                            Format yang diterima: PDF, JPG, PNG. Maksimal ukuran file 2MB.
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 button-stack-mobile mt-4 pt-3" style="border-top: 1px solid var(--slate-200);">
                        <a href="{{ route('employee.dashboard') }}" class="btn-minimal btn-minimal-secondary">
                            Batalkan
                        </a>
                        <button type="submit" class="btn-minimal btn-minimal-primary">
                            Kirim Permohonan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    const formCuti = document.getElementById('formCuti');
    const jenisCuti = document.getElementById('jenis_cuti');
    const buktiSection = document.getElementById('bukti-section');
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    const jumlahHari = document.getElementById('jumlah_hari');

    const sisaCutiKaryawan = {{ $sisaCuti ?? 12 }};

    const hariIni = new Date().toISOString().split("T")[0];
    tanggalMulai.min = hariIni;

    function toggleBukti() {
        if (jenisCuti.value === 'cuti_sakit') {
            buktiSection.classList.add('show');
        } else {
            buktiSection.classList.remove('show');
        }
    }

    function hitungJumlahHari() {
        if (tanggalMulai.value) {
            tanggalSelesai.min = tanggalMulai.value;
        }

        if (!tanggalMulai.value || !tanggalSelesai.value) {
            jumlahHari.value = '';
            return;
        }

        const mulai = new Date(tanggalMulai.value);
        const selesai = new Date(tanggalSelesai.value);

        const selisih = Math.ceil((selesai - mulai) / (1000 * 60 * 60 * 24)) + 1;

        if (selisih > 0) {
            jumlahHari.value = `${selisih} Hari Kerja`;
        } else {
            jumlahHari.value = '';
        }
    }

    formCuti.addEventListener('submit', function(e) {
        if (jenisCuti.value === 'cuti_tahunan') {
            const mulai = new Date(tanggalMulai.value);
            const selesai = new Date(tanggalSelesai.value);
            const totalHari = Math.ceil((selesai - mulai) / (1000 * 60 * 60 * 24)) + 1;

            if (totalHari > sisaCutiKaryawan) {
                e.preventDefault();
                swal.fire({
                    icon: 'error',
                    title: 'Pengajuan Gagal',
                    html: `Anda mencoba mengambil <strong>${totalHari}</strong> hari cuti.<br>Sisa kuota Cuti Tahunan Anda saat ini tinggal <strong>${sisaCutiKaryawan}</strong> hari.`,
                    confirmButtonText: 'Mengerti',
                    customClass: { confirmButton: 'btn btn-dark px-4 text-sm' },
                    buttonsStyling: false
                });
            }
        }
    });

    jenisCuti.addEventListener('change', toggleBukti);
    tanggalMulai.addEventListener('change', hitungJumlahHari);
    tanggalSelesai.addEventListener('change', hitungJumlahHari);

    toggleBukti();
    hitungJumlahHari();
</script>

</x-app-layout>
