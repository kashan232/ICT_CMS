<style>
    /* styles.css */
.side-nav-link.active-link {
    background-color: green;
    color: white !important; /* To ensure text is visible on green background */
    border-radius: 5px; /* Optional: adds a slight curve to the corners */
}

/* For parent items with collapsable sub-menus */
.side-nav-item .side-nav-link.active-link {
    background-color: green;
    color: white !important;
    border-radius: 5px;
}

/* If you want the parent 'side-nav-item' to also have a background when a child is active */
.side-nav-item.active-parent > .side-nav-link {
    background-color: green;
    color: white !important;
    border-radius: 5px;
}   
.side-nav .menuitem-active .menuitem-active .active {
    color:green !important
}

</style>  
<style>
.leftside-menu {
    height: 100vh;
    overflow-y: auto;
}

/* Optional smooth scrollbar look */
.leftside-menu::-webkit-scrollbar {
    width: 6px;
}
.leftside-menu::-webkit-scrollbar-thumb {
    background-color: green;
    border-radius: 5px;
}
.logo {
    position: relative;
    z-index: 99;
}

.side-nav li, .side-nav {
    position: relative;
    z-index: 1;
}

</style>

<div class="leftside-menu bg-white text-dark">
    <a href="#" class="logo logo-light bg-white ">
        <span class="logo-lg mt-2 mb-4">
            <img src="{{ env('APP_URL') }}public/assets/images/Ict_logo.png" alt="logo" style="height:100px !important;width:100px">
        </span>
        <span class="logo-sm bg-white">
            <img src="{{ env('APP_URL') }}public/assets/images/Ict_logo.png" alt="small logo">
        </span>
    </a>
    <a href="#" class="logo logo-dark">
        <span class="logo-lg ">
            <img src="{{ env('APP_URL') }}public/assets/images/Ict_logo.png" alt="dark logo">
        </span>
        <span class="logo-sm bg-white">
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
        <ul class="side-nav text-dark">
            <li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link text-dark {{ Request::routeIs('home') ? 'active-link' : '' }}">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-item {{ Request::routeIs('new.uploads', 'uploads') ? 'active-parent' : '' }}">
                <a data-bs-toggle="collapse" href="#pdfsidebar" aria-expanded="{{ Request::routeIs('new.uploads', 'uploads') ? 'true' : 'false' }}" aria-controls="pdfsidebar" class="side-nav-link text-dark   ">
                    <i class="uil-store"></i>
                    <span>PDFs Upload  </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Request::routeIs('new.uploads', 'uploads') ? 'show' : '' }}" id="pdfsidebar">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.uploads') }}" class="  {{ Request::routeIs('new.uploads') ? 'active-link' : '' }}  text-dark">New Uploads</a>
                        </li>
                        <li>
                            <a href="{{ route('uploads') }}" class="{{ Request::routeIs('uploads') ? 'active-link' : '' }} text-dark    ">Uploads</a>
                        </li>
                    </ul>
                </div>
            </li>
               <li class="side-nav-item {{ Request::routeIs('news.create', 'news.index') ? 'active-parent' : '' }}">
                <a data-bs-toggle="collapse" href="#newssidebar" aria-expanded="{{ Request::routeIs('news.create', 'news.index') ? 'true' : 'false' }}" aria-controls="pdfsidebar" class="side-nav-link text-dark   ">
                    <i class="uil-store"></i>
                    <span>News Upload </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Request::routeIs('news.create', 'news.index') ? 'show' : '' }}" id="newssidebar">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('news.create') }}" class="  {{ Request::routeIs('news.create') ? 'active-link' : '' }}  text-dark">News Uploads</a>
                        </li>
                        <li>
                            <a href="{{ route('news.index') }}" class="{{ Request::routeIs('news.index') ? 'active-link' : '' }} text-dark    ">Uploads</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item {{ Request::routeIs('new.category.uploads', 'categories-list') ? 'active-parent' : '' }}">
                <a data-bs-toggle="collapse" href="#Cropsidebar" aria-expanded="{{ Request::routeIs('new.category.uploads', 'categories-list') ? 'true' : 'false' }}" aria-controls="Cropsidebar" class="side-nav-link text-dark">
                    <i class="uil-store"></i>
                    <span> Crops Category </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Request::routeIs('new.category.uploads', 'categories-list') ? 'show' : '' }}" id="Cropsidebar">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.category.uploads') }}" class="{{ Request::routeIs('new.category.uploads') ? 'active-link' : '' }} text-dark">New Category</a>
                        </li>
                        <li>
                            <a href="{{ route('categories-list') }}" class="{{ Request::routeIs('categories-list') ? 'active-link' : '' }} text-dark">Categories</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ Request::routeIs('new.Crops.uploads', 'Crops', "Diseases-type-management",'crops-management', 'crops-Diseases', 'crops-Diseases-subtypes') ? 'active-parent' : '' }}">
                <a data-bs-toggle="collapse" href="#Crops" aria-expanded="{{ Request::routeIs('new.Crops.uploads', "Diseases-type-management",'Crops', 'crops-management', 'crops-Diseases', 'crops-Diseases-subtypes') ? 'true' : 'false' }}" aria-controls="Crops" class="side-nav-link text-dark">
                    <i class="uil-store"></i>
                    <span> Crops </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Request::routeIs('new.Crops.uploads', 'Crops',"Diseases-type-management", 'crops-management', 'crops-Diseases', 'crops-Diseases-subtypes') ? 'show' : '' }}" id="Crops">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('new.Crops.uploads') }}" class="{{ Request::routeIs('new.Crops.uploads') ? 'active-link' : '' }} text-dark">New Crops</a>
                        </li>
                        <li>
                            <a href="{{ route('Crops') }}" class="{{ Request::routeIs('Crops') ? 'active-link' : '' }} text-dark">Crops</a>
                        </li>
                        <li>
                            <a href="{{ route('crops-management') }}" class="{{ Request::routeIs('crops-management') ? 'active-link' : '' }} text-dark">Crops Managements</a>
                        </li>
                        <li>
                            <a href="{{ route('crops-Diseases') }}" class="{{ Request::routeIs('crops-Diseases') ? 'active-link' : '' }} text-dark">Diseases Managements</a>
                        </li>
                        <li>
                            <a href="{{ route('crops-Diseases-subtypes') }}" class="{{ Request::routeIs('crops-Diseases-subtypes') ? 'active-link' : '' }} text-dark"> sub Diseases Types</a>
                        </li>

                        {{-- checking --}}
                        {{-- <li>
                            <a href="{{ route('Diseases-type-management') }}" class="{{ Request::routeIs('Diseases-type-management') ? 'active-link' : '' }} text-dark">Diseases Types</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
                 <li class="side-nav-item {{ Request::routeIs("departments.index",'allbanner.index','upcomingtenders.index','documents.index','director-general.index','district.index','headline.index','extension.index','banners.index','videos.index','subcenter.index') ? 'active-parent' : '' }}">
                <a data-bs-toggle="collapse" href="#dynamic" aria-expanded="{{ Request::routeIs('news.create','allbanner.index','upcomingtenders.index','documents.index','district.index','director-general.index','headline.index','extension.index','subcenter.index','videos.index', 'news.index') ? 'true' : 'false' }}" aria-controls="pdfsidebar" class="side-nav-link text-dark   ">
                    <i class="uil-store"></i>
                    <span>Web dynamic</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Request::routeIs('departments.index','allbanner.index','documents.index','upcomingtenders.index','director-general.index','headline.index','district.index','extension.index','videos.index','banners.index','subcenter.index') ? 'show' : '' }}" id="dynamic">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('departments.index') }}" class="  {{ Request::routeIs('departments.index') ? 'active-link' : '' }}  text-dark">Header</a>
                        </li>
                        <li>
                            <a href="{{ route('banners.index') }}" class="{{ Request::routeIs('banners.index') ? 'active-link' : '' }} text-dark    ">home Banner</a>
                        </li>
                        <li>
                            <a href="{{ route('allbanner.index') }}" class="{{ Request::routeIs('allbanner.index') ? 'active-link' : '' }} text-dark    ">All Banners</a>
                        </li>
                           <li>
                            <a href="{{ route('videos.index') }}" class="{{ Request::routeIs('videos.index') ? 'active-link' : '' }} text-dark    ">Videos</a>
                        </li>
                         <li>
                            <a href="{{ route('subcenter.index') }}" class="{{ Request::routeIs('subcenter.index') ? 'active-link' : '' }} text-dark    ">Subcenter</a>
                        </li>
                        <li>
                            <a href="{{ route('headline.index') }}" class="{{ Request::routeIs('headline.index') ? 'active-link' : '' }} text-dark    ">Headlines</a>
                        </li>
                          <li>
                            <a href="{{ route('extension.index') }}" class="{{ Request::routeIs('extension.index') ? 'active-link' : '' }} text-dark    ">Extension About</a>
                        </li>
                          <li>
                            <a href="{{ route('director-general.index') }}" class="{{ Request::routeIs('director-general.index') ? 'active-link' : '' }} text-dark    ">Director about</a>
                        </li>
                           <li>
                            <a href="{{ route('district.index') }}" class="{{ Request::routeIs('district.index') ? 'active-link' : '' }} text-dark    ">District Offices</a>
                        </li>
                              <li>
                            <a href="{{ route('documents.index') }}" class="{{ Request::routeIs('documents.index') ? 'active-link' : '' }} text-dark    ">Projects</a>
                        </li>
                          <li>
                            <a href="{{ route('upcomingtenders.index') }}" class="{{ Request::routeIs('upcomingtenders.index') ? 'active-link' : '' }} text-dark    ">upcoming Tenders</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="side-nav-link text-dark">
                      <i class="fa-solid fa-right-from-bracket"></i>
                        <span> Logout </span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>

