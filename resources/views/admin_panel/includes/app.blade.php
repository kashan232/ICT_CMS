@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

@yield('content')

       @include('admin_panel.includes.footer')
</div>

@include('admin_panel.includes.footer_links')