<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --sidebar-width: 260px;
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --bg-light: #f8fafc;
        --text-dark: #0f172a;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--bg-light);
    }

    /* Sidebar Wrapper */
    .sidebar-wrapper {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: #ffffff;
        border-right: 1px solid var(--border-color);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    /* Brand Logo Area */
    .sidebar-brand {
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 700;
        font-size: 20px;
        color: var(--text-dark);
        text-decoration: none;
        border-bottom: 1px solid var(--bg-light);
    }

    .sidebar-brand i {
        color: var(--primary-color);
        font-size: 22px;
    }

    /* Navigation Menu */
    .sidebar-menu {
        padding: 20px 14px;
        list-style: none;
        margin: 0;
        flex-grow: 1;
        overflow-y: auto;
    }

    .menu-header {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 0.8px;
        padding: 10px 12px;
        margin-top: 10px;
    }

    .menu-item {
        margin-bottom: 4px;
    }

    .menu-link {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 14px;
        color: var(--text-muted);
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    /* Menu Hover Effect */
    .menu-link:hover {
        background: var(--bg-light);
        color: var(--text-dark);
    }

    /* Active Menu State */
    .menu-item.active .menu-link {
        background: #eeeffc;
        color: var(--primary-color);
        font-weight: 600;
    }

    .menu-link i {
        font-size: 18px;
        width: 20px;
        text-align: center;
        transition: color 0.2s;
    }

    .menu-item.active .menu-link i {
        color: var(--primary-color);
    }

    /* User Profile Footer Section */
    .sidebar-footer {
        padding: 16px;
        border-top: 1px solid var(--border-color);
        background: #ffffff;
    }

    .user-profile-box {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        border-radius: 12px;
        background: var(--bg-light);
        border: 1px solid #f1f5f9;
    }

    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #e0e7ff;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    .user-info {
        flex-grow: 1;
        overflow: hidden;
    }

    .user-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-dark);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1px;
    }

    .user-role {
        font-size: 11px;
        color: var(--text-muted);
        display: block;
    }

    .btn-logout {
        color: #94a3b8;
        background: none;
        border: none;
        padding: 6px;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .btn-logout:hover {
        color: #ef4444;
        background: #ffeeee;
    }

    /* Main Content Adjuster */
    .main-content {
        margin-left: var(--sidebar-width);
        padding: 30px;
        transition: all 0.3s ease;
    }

    @media (max-width: 768px) {
        .sidebar-wrapper {
            left: -var(--sidebar-width);
        }
        .sidebar-wrapper.show {
            left: 0;
        }
        .main-content {
            margin-left: 0;
        }
    }
</style>

<aside class="sidebar-wrapper">

    <a href="{{ url('/dashboard') }}" class="sidebar-brand">
        <i class="fa-solid fa-calendar-check"></i>
        <span>Brightlabs</span>
    </a>

    <ul class="sidebar-menu">

        <li class="menu-header">Core</li>

        <li class="menu-item active">
            <a href="{{ url('/dashboard') }}" class="menu-link">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header">Manajemen Cuti</li>

        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="fa-solid fa-receipt"></i>
                <span>Daftar Cuti</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="fa-solid fa-circle-check"></i>
                <span>Persetujuan Cuti</span>
            </a>
        </li>

        <li class="menu-header">Administrasi</li>

        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="fa-solid fa-users"></i>
                <span>Kelola Karyawan</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="fa-solid fa-bullhorn"></i>
                <span>Pengumuman</span>
            </a>
        </li>

    </ul>

    <div class="sidebar-footer">
        <div class="user-profile-box">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
            </div>

            <div class="user-info">
                <div class="user-name">{{ auth()->user()->name ?? 'User Nama' }}</div>
                <span class="user-role">Manager</span>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn-logout" title="Keluar">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>

</aside>

<main class="main-content">
    </main>
