<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajukan Cuti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Form Pengajuan Cuti</div>
                            <hr>
                            <form method="POST" action="">
                                {{-- {{ route('leave_requests.store') }} --}}
                                @csrf

                                <!-- Jenis Cuti -->
                                <div class="form-group mb-3">
                                    <label for="jenis_cuti">Jenis Cuti</label>
                                    <select class="form-control" id="jenis_cuti" name="jenis_cuti" required>
                                        <option value="">-- Pilih Jenis Cuti --</option>
                                        <option value="cuti_tahunan">Cuti Tahunan</option>
                                        <option value="cuti_sakit">Cuti Sakit</option>
                                        <option value="cuti_penting">Cuti Penting</option>
                                    </select>
                                </div>

                                <!-- Tanggal Mulai -->
                                <div class="form-group mb-3">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                                </div>

                                <!-- Tanggal Selesai -->
                                <div class="form-group mb-3">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                                </div>

                                <!-- Jumlah Hari -->
                                <div class="form-group mb-3">
                                    <label for="jumlah_hari">Jumlah Hari</label>
                                    <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" min="1" required>
                                </div>

                                <!-- Alasan -->
                                <div class="form-group mb-3">
                                    <label for="alasan">Alasan</label>
                                    <textarea class="form-control" id="alasan" name="alasan" rows="3" placeholder="Tuliskan alasan cuti" required></textarea>
                                </div>

                                <!-- Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary shadow-primary px-5">
                                        <i class="icon-paper-plane"></i> Ajukan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
