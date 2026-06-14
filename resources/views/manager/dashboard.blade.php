<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Manager
        </h2>
    </x-slot>
        <div class="card mb-4">
            <div class="card-body">

                <h3>
                    Selamat Datang,
                    {{ auth()->user()->name }}
                </h3>

                <p>
                    Role :
                    <strong>Manager</strong>
                </p>

                <p class="mb-0">
                    Anda dapat memantau pengajuan cuti dan melihat pengumuman perusahaan.
                </p>

            </div>
        </div>

        <div class="card mt-4">

    <div class="card-header">
        Menu Cepat
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 mb-3">
                <a href=""
                {{-- {{ route('cuti.index') }} --}}
                   class="btn btn-primary btn-block">
                    Daftar Cuti
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href=""
                {{-- {{ route('status-cuti.index') }} --}}
                   class="btn btn-success btn-block">
                    Status Cuti
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href=""
                {{-- {{ route('users.index') }} --}}
                   class="btn btn-warning btn-block">
                    Buat Akun
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href=""
                {{-- {{ route('pengumuman.index') }} --}}
                   class="btn btn-danger btn-block">
                    Pengumuman
                </a>
            </div>

        </div>

    </div>

</div>
        <div class="card mt-4">

    <div class="card-header">
        Pengajuan Cuti Terbaru
    </div>

    <div class="table-responsive">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
{{--
                @forelse($cutiTerbaru as $cuti)

                    <tr>

                        <td>
                            {{ $cuti->karyawan->nama }}
                        </td>

                        <td>
                            {{ $cuti->tanggal_mulai }}
                        </td>

                        <td>
                            {{ $cuti->tanggal_selesai }}
                        </td>

                        <td>

                            @if($cuti->status == 'pending')
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                            @elseif($cuti->status == 'approved')
                                <span class="badge badge-success">
                                    Disetujui
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Ditolak
                                </span>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada data cuti
                        </td>
                    </tr>

                @endforelse --}}

            </tbody>

        </table>

    </div>

</div>

        <div class="card mt-4">

    <div class="card-header">
        Pengumuman Terbaru
    </div>

    <div class="table-responsive">

        <table class="table">

            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>

                {{-- @forelse($pengumuman as $item)

                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="2" class="text-center">
                            Belum ada pengumuman
                        </td>
                    </tr>

                @endforelse --}}

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>
