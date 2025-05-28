<div class="leftside-menu">
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            <img src="assets/images/Ict_logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">
            <img src="assets/images/Ict_logo.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo-dark-sm.png" alt="small logo">
        </span>
    </a>
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <!-- <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Chat </span>
                </a>
            </li> -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Upload PDFs </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.uploads') }}">New Uploads</a>
                        </li>
                        <li>
                            <a href="#">Uploads</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>