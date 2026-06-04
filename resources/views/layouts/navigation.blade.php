<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top gradient-scooter">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <!-- Notifikasi -->
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                    <i class="icon-bell"></i>
                    <span class="badge badge-primary badge-up">10</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            You have 10 Notifications
                            <span class="badge badge-primary">10</span>
                        </li>
                        <li class="list-group-item">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <i class="icon-bell fa-2x mr-3 text-danger"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title">New Updates</h6>
                                        <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="javaScript:void();">See All Notifications</a></li>
                    </ul>
                </div>
            </li>

            <!-- User Dropdown pakai Breeze Auth -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile">
                        <img src="{{ asset('assets/images/avatars/avatar-17.png') }}" class="img-circle" alt="user avatar">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <div class="media">
                            <div class="avatar">
                                <img class="align-self-start mr-3" src="{{ asset('assets/images/avatars/avatar-17.png') }}" alt="user avatar">
                            </div>
                            <div class="media-body">
                                <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                                <p class="user-subtitle">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
                    <li class="dropdown-divider"></li>
                <li class="dropdown-item d-flex align-items-center">
                    <i class="icon-power mr-2"></i>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                </ul>
            </li>
        </ul>
    </nav>
</header>
