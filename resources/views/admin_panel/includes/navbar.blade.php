<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">
            <div class="logo-topbar">
                <a href="#" class="logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/Ict_logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>
                <a href="#" class="logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/Ict_logo.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-dark-sm.png" alt="small logo">
                    </span>
                </a>
            </div>
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
           

            <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>



            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                    </span>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0">Admin</h5>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item ai-icon"> Logout </a>
                    </form>

                </div>
            </li>
        </ul>
    </div>
</div>