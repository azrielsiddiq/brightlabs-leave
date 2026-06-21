<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top px-3 px-md-4" style="background: #ffffff; height: 60px; border-bottom: 1px solid #e2e8f0; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);">
        
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu nav-icon-btn" href="javascript:void(0);">
                    <i class="icon-menu menu-icon" style="font-weight: 600; font-size: 16px; color: #0f172a;"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret profile-trigger" 
                   data-toggle="dropdown" 
                   href="#" 
                   role="button" 
                   aria-haspopup="true" 
                   aria-expanded="false">

                    <div class="avatar-flat">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="user-meta d-none d-md-block">
                        <span class="user-meta-name">{{ Auth::user()->name }}</span>
                    </div>
                    
                    <span class="arrow-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right premium-flat-dropdown">
                    
                    <div class="dropdown-user-header">
                        <div class="fw-bold text-dark text-truncate" style="font-size: 14px; color: #171717;">{{ Auth::user()->name }}</div>
                        <div class="text-muted text-truncate" style="font-size: 12px; color: #737373; margin-top: 2px;">{{ Auth::user()->email }}</div>
                    </div>
                    
                    <div class="dropdown-divider-line"></div>
                    
                    <a class="dropdown-item-flat" href="#">
                        <i class="icon-wallet"></i>
                        <span>Detail Akun</span>
                    </a>
                    
                    <a class="dropdown-item-flat" href="#">
                        <i class="icon-settings"></i>
                        <span>Pengaturan</span>
                    </a>
                    
                    <div class="dropdown-divider-line"></div>
                    
                    <a class="dropdown-item-flat text-danger" 
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-power"></i>
                        <span>Keluar Aplikasi</span>
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

    </nav>
</header>

<style>
    .nav-icon-btn {
        display: flex !important;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        transition: background-color 0.15s ease;
    }
    .nav-icon-btn:hover {
        background-color: #f5f5f5;
    }

    .profile-trigger {
        display: flex !important;
        align-items: center !important;
        gap: 8px;
        text-decoration: none !important;
        padding: 4px 8px !important;
        border-radius: 8px;
        transition: background-color 0.15s ease;
    }
    .profile-trigger:hover {
        background-color: #f5f5f5;
    }

    .profile-trigger::after {
        display: none !important;
    }

    .arrow-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #737373;
        transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        margin-left: 2px;
    }
    
    .dropdown.show .arrow-wrapper {
        transform: rotate(180deg);
        color: #171717;
    }

    .avatar-flat {
        width: 32px;
        height: 32px;
        background: #171717;
        color: #ffffff;
        font-weight: 600;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }

    .user-meta {
        display: flex;
        flex-direction: column;
        line-height: 1.3;
        text-align: left;
    }
    .user-meta-name {
        font-size: 13px;
        font-weight: 600;
        color: #171717;
    }
    .user-meta-role {
        font-size: 11px;
        color: #737373;
    }

    .premium-flat-dropdown {
        border: 1px solid #e5e5e5 !important;
        border-radius: 10px !important;
        margin-top: 8px !important;
        min-width: 220px;
        padding: 6px !important;
        background: #ffffff !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
    }

    .dropdown-user-header {
        padding: 10px 12px 8px 12px;
    }

    .dropdown-divider-line {
        height: 1px;
        background-color: #e5e5e5;
        margin: 6px 4px;
    }

    .dropdown-item-flat {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        font-size: 13px;
        font-weight: 500;
        color: #404040;
        text-decoration: none !important;
        border-radius: 6px;
        transition: all 0.1s ease;
    }
    .dropdown-item-flat i {
        font-size: 14px;
        color: #737373;
        width: 16px;
        text-align: center;
    }
    .dropdown-item-flat:hover {
        background-color: #f5f5f5;
        color: #171717;
    }
    .dropdown-item-flat:hover i {
        color: #171717;
    }

    .dropdown-item-flat.text-danger i {
        color: #ef4444;
    }
    .dropdown-item-flat.text-danger:hover {
        background-color: #fef2f2;
        color: #b91c1c !important;
    }
    .dropdown-item-flat.text-danger:hover i {
        color: #b91c1c !important;
    }
</style>