<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">

    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/logo-icon.png') }}"
                 class="logo-icon"
                 alt="logo icon">

            <h5 class="logo-text">
                Sistem Cuti
            </h5>
        </a>
    </div>

    @php
        $role = auth()->user()->role;
    @endphp

    <ul class="sidebar-menu do-nicescrol">

        <li class="sidebar-header">
            MAIN NAVIGATION
        </li>

        {{-- DASHBOARD --}}
        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="icon-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- ========================= --}}
        {{-- HRD --}}
        {{-- ========================= --}}
        @if ($role === 'hrd')

            <li class="sidebar-header">
                MENU HRD
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('karyawan.index') }} --}}
                    <i class="icon-people"></i>
                    <span>Data Karyawan</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('departemen.index') }} --}}
                    <i class="icon-layers"></i>
                    <span>Data Departemen</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('pengumuman.index') }} --}}
                    <i class="icon-bell"></i>
                    <span>Pengumuman</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('users.index') }} --}}
                    <i class="icon-user"></i>
                    <span>Kelola Akun</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('cuti.index') }} --}}
                    <i class="icon-calendar"></i>
                    <span>Daftar Cuti</span>
                </a>
            </li>

        @endif

        {{-- ========================= --}}
        {{-- MANAGER --}}
        {{-- ========================= --}}
        @if ($role === 'manager')

            <li class="sidebar-header">
                MENU MANAGER
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('cuti.index') }} --}}
                    <i class="icon-calendar"></i>
                    <span>Daftar Cuti</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('status-cuti.index') }} --}}
                    <i class="icon-check"></i>
                    <span>Status Cuti</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('users.index') }} --}}
                    <i class="icon-user"></i>
                    <span>Buat Akun</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('pengumuman.index') }} --}}
                    <i class="icon-bell"></i>
                    <span>Pengumuman</span>
                </a>
            </li>

        @endif

        {{-- ========================= --}}
        {{-- KARYAWAN --}}
        {{-- ========================= --}}
        @if ($role === 'karyawan')

            <li class="sidebar-header">
                MENU KARYAWAN
            </li>

            <li>
                <a href="{{ route('cuti.create') }}" class="waves-effect">
                    <i class="icon-plus"></i>
                    <span>Ajukan Cuti</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('cuti.riwayat') }} --}}
                    <i class="icon-clock"></i>
                    <span>Riwayat Cuti</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('cuti.index') }} --}}
                    <i class="icon-close"></i>
                    <span>Batalkan Cuti</span>
                </a>
            </li>

            <li>
                <a href="" class="waves-effect">
                    {{-- {{ route('pengumuman.index') }} --}}
                    <i class="icon-bell"></i>
                    <span>Pengumuman</span>
                </a>
            </li>

        @endif

    </ul>

</div>
