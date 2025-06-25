<div class="leftside-menu">
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ env('APP_URL') }}public/assets/images/Ict_logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ env('APP_URL') }}public/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ env('APP_URL') }}public/assets/images/Ict_logo.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ env('APP_URL') }}public/assets/images/logo-dark-sm.png" alt="small logo">
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
                <a href="{{ route('home') }}" class="side-nav-link">
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
                <a data-bs-toggle="collapse" href="#pdfsidebar" aria-expanded="false" aria-controls="pdfsidebar" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Upload PDFs </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="pdfsidebar">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.uploads') }}">New Uploads</a>
                        </li>
                        <li>
                            <a href="{{ route('uploads') }}">Uploads</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#Cropsidebar" aria-expanded="false" aria-controls="Cropsidebar" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Crops Category </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="Cropsidebar">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.category.uploads') }}">New Category</a>
                        </li>
                        <li>
                            <a href="{{ route('categories-list') }}">Categories</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#Crops" aria-expanded="false" aria-controls="Crops" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Crops </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="Crops">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.Crops.uploads') }}">New Crops</a>
                        </li>
                        <li>
                            <a href="{{ route('Crops') }}">Crops</a>
                        </li>
                        <li>
                            <a href="{{ route('crops-management') }}">Crops Managements</a>
                        </li>
                        <li>
                            <a href="{{ route('crops-Diseases') }}">Diseases Managements</a>
                        </li>
                        <li>
                            <a href="{{ route('crops-Diseases-subtypes') }}">Diseases Types</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Logout </span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>