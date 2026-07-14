<style>
    .sidebar-menu a.active {
    background-color: #64748b;
    color: #fff !important;
    border-radius: 6px;
}

</style>
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">

    <div class="brand-logo text-center mb-4">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center justify-content-center text-decoration-none gap-2">
        <i class="fa-solid fa-calendar-check" style="color:#64748b; font-size:22px;"></i>
        <h5 class="logo-text fw-bold m-1"  style="color:#64748b;">
            Brightlabs
        </h5>
    </a>
</div>



    @php
        $role = auth()->user()->role;
    @endphp

  <ul class="sidebar-menu do-nicescrol">

    <li class="sidebar-header">
        MENU UTAMA
    </li>

    <li>
        <a href="{{ route('dashboard') }}"
           class="waves-effect {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <i class="icon-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if ($role === 'hrd')
        <li class="sidebar-header">MENU HRD</li>

        <li>
            <a href="{{ route('hrd.daftar_cuti') }}"
               class="waves-effect {{ Request::routeIs('hrd.daftar_cuti') ? 'active' : '' }}">
                <i class="icon-calendar"></i>
                <span>Daftar Cuti</span>
            </a>
        </li>

        <li>
            <a href="{{ route('hrd.departemen') }}"
               class="waves-effect {{ Request::routeIs('hrd.departemen') ? 'active' : '' }}">
                <i class="icon-layers"></i>
                <span>Departemen</span>
            </a>
        </li>

        <li>
            <a href="{{ route('hrd.user') }}"
               class="waves-effect {{ Request::routeIs('hrd.user') ? 'active' : '' }}">
                <i class="icon-user"></i>
                <span>Kelola Akun</span>
            </a>
        </li>

        <li>
            <a href="{{ route('pengumuman.index') }}"
               class="waves-effect {{ Request::routeIs('pengumuman.index') ? 'active' : '' }}">
                <i class="icon-bell"></i>
                <span>Pengumuman</span>
            </a>
        </li>
    @endif

    @if ($role === 'manager')
        <li class="sidebar-header">MENU MANAGER</li>

        <li>
            <a href="{{ route('manager.daftar_cuti') }}"
               class="waves-effect {{ Request::routeIs('manager.daftar_cuti') ? 'active' : '' }}">
                <i class="icon-calendar"></i>
                <span>Daftar Pengajuan Cuti</span>
            </a>
        </li>

        <li>
            <a href="{{ route('manager.user') }}"
               class="waves-effect {{ Request::routeIs('manager.user') ? 'active' : '' }}">
                <i class="icon-user"></i>
                <span>Buat Akun</span>
            </a>
        </li>

        <li>
            <a href="{{ route('pengumuman.index') }}"
               class="waves-effect {{ Request::routeIs('pengumuman.index') ? 'active' : '' }}">
                <i class="icon-bell"></i>
                <span>Pengumuman</span>
            </a>
        </li>
    @endif

    @if ($role === 'karyawan')
        <li class="sidebar-header">MENU KARYAWAN</li>

        <li>
            <a href="{{ route('cuti.create') }}"
               class="waves-effect {{ Request::routeIs('cuti.create') ? 'active' : '' }}">
                <i class="icon-plus"></i>
                <span>Ajukan Cuti</span>
            </a>
        </li>

        <li>
            <a href="{{ route('riwayat.cuti') }}"
               class="waves-effect {{ Request::routeIs('riwayat.cuti') ? 'active' : '' }}">
                <i class="icon-clock"></i>
                <span>Riwayat Cuti</span>
            </a>
        </li>

        <li>
            <a href="{{ route('employee.pengumuman') }}"
               class="waves-effect {{ Request::routeIs('employee.pengumuman') ? 'active' : '' }}">
                <i class="icon-bell"></i>
                <span>Pengumuman</span>
            </a>
        </li>
    @endif

</ul>


</div>
