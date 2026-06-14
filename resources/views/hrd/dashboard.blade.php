<x-app-layout>


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard HRD
    </h2>
</x-slot>

<div class="py-4">

    <div class="container-fluid">

        <!-- Welcome -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="font-weight-bold">
                    Selamat Datang, {{ auth()->user()->name }}
                </h3>

                <p class="mb-0">
                    Anda login sebagai
                    <strong>{{ auth()->user()->role }}</strong>
                </p>
            </div>
        </div>

        <!-- Statistik -->
        <div class="row">

            <div class="col-12 col-md-6 col-xl-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                {{-- <h3>{{ $totalKaryawan }}</h3> --}}
                                <p class="mb-0">Total Karyawan</p>
                            </div>

                            <i class="icon-people" style="font-size:40px"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                {{-- <h3>{{ $totalDepartemen }}</h3> --}}
                                <p class="mb-0">Departemen</p>
                            </div>

                            <i class="icon-layers" style="font-size:40px"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                {{-- <h3>{{ $totalAkun }}</h3> --}}
                                <p class="mb-0">Total Akun</p>
                            </div>

                            <i class="icon-user" style="font-size:40px"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                {{-- <h3>{{ $totalPengumuman }}</h3> --}}
                                <p class="mb-0">Pengumuman</p>
                            </div>

                            <i class="icon-bell" style="font-size:40px"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Quick Menu -->
        <div class="card mt-4">
            <div class="card-header">
                Menu Cepat
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <a href=""
                        {{-- {{ route('karyawan.index') }} --}}
                           class="btn btn-primary btn-block">
                            Kelola Karyawan
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href=""
                        {{-- {{ route('departemen.index') }} --}}
                           class="btn btn-success btn-block">
                            Kelola Departemen
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href=""
                        {{-- {{ route('pengumuman.index') }} --}}
                           class="btn btn-warning btn-block">
                            Kelola Pengumuman
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href=""
                        {{-- {{ route('users.index') }} --}}
                           class="btn btn-danger btn-block">
                            Kelola Akun
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- Pengumuman Terbaru -->
        <div class="card mt-4">

            <div class="card-header">
                Pengumuman Terbaru
            </div>

            <div class="table-responsive">

                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- @forelse ($pengumuman as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->judul }}</td>

                                <td>
                                    {{ $item->created_at->format('d M Y') }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="text-center">
                                    Belum ada pengumuman
                                </td>
                            </tr>

                        @endforelse --}}

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


</x-app-layout>
