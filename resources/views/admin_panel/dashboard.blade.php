@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <form class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                                        <span class="input-group-text   text-white" style="background-color:green;color:white">
                                            <i class="mdi mdi-calendar-range font-13"></i>
                                        </span>
                                    </div>
                                    <a href="javascript: void(0);" class="btn  ms-2" style="background-color:green;color:white">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="btn  ms-1" style="background-color:green;color:white">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a>
                                </form>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>

    <style>
    .dashboard-card {
        height: 120px; /* Fixed height */
        padding: 12px 15px !important;
    }
    .dashboard-card .card-body {
        padding: 0 !important;
    }
    .dashboard-card h3 {
        font-size: 20px;
        margin: 5px 0;
    }
    .dashboard-card h5 {
        font-size: 14px;
        margin-bottom: 2px;
    }
    .dashboard-card p {
        font-size: 12px;
        margin-bottom: 0;
    }
</style>

<div class="row g-2">

    {{-- List of data to display --}}
@php
    $items = [
        ['route' => 'Crops', 'icon' => 'fas fa-leaf', 'bg' => 'bg-success-subtle text-success', 'label' => 'Total Crops', 'count' => $totalCrops ?? 0],
        ['route' => 'categories-list', 'icon' => 'fas fa-layer-group', 'bg' => 'bg-primary-subtle text-primary', 'label' => 'Crop Categories', 'count' => $totalCropCategories ?? 0],
        ['route' => 'crops-Diseases', 'icon' => 'fas fa-bacteria', 'bg' => 'bg-warning-subtle text-warning', 'label' => 'Disease Types', 'count' => $totalCropDiseaseTypes ?? 0],
        ['route' => 'crops-Diseases-subtypes', 'icon' => 'fas fa-disease', 'bg' => 'bg-danger-subtle text-danger', 'label' => 'Disease Sub Types', 'count' => $totalCropDiseaseSubTypes ?? 0],
        ['route' => 'crops-management', 'icon' => 'fas fa-tools', 'bg' => 'bg-info-subtle text-info', 'label' => 'Crop Managements', 'count' => $totalCropManagements ?? 0],
        ['route' => 'uploads', 'icon' => 'fas fa-file-lines', 'bg' => 'bg-success-subtle  text-white ', 'label' => 'Total PDFs', 'count' => $totalPDFs ?? 0],
        ['route' => 'uploads', 'icon' => 'fas fa-map', 'bg' => 'bg-success-subtle text-success', 'label' => 'Field Guides', 'count' => $fieldGuides ?? 0],
        ['route' => 'uploads', 'icon' => 'fas fa-book', 'bg' => 'bg-primary-subtle text-primary', 'label' => 'Booklets', 'count' => $booklets ?? 0],
        ['route' => 'uploads', 'icon' => 'fas fa-newspaper', 'bg' => 'bg-warning-subtle text-warning', 'label' => 'Publications', 'count' => $publications ?? 0],
        ['route' => 'uploads', 'icon' => 'fas fa-book-open-reader', 'bg' => 'bg-danger-subtle text-danger', 'label' => 'Magazines', 'count' => $magazines ?? 0],
        ['route' => 'news.index', 'icon' => 'fas fa-newspaper', 'bg' => 'bg-info-subtle text-info', 'label' => 'Total News', 'count' => $totalNews ?? 0], // ✅ Added
        ['route' => 'contact.index', 'icon' => 'fas fa-newspaper', 'bg' => 'bg-info-subtle text-info', 'label' => 'Total Messages', 'count' => $Contact  ?? 0], // ✅ Added
    ];
@endphp



    @foreach ($items as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <a href="{{ route($item['route']) }}" class="link">
                <div class="card shadow-sm border-0 dashboard-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-md rounded-circle {{ $item['bg'] }} d-flex align-items-center justify-content-center fs-4 ">
                                <i class="{{ $item['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="text-muted fw-normal text-truncate" title="{{ $item['label'] }}">{{ $item['label'] }}</h5>
                            <h3 class="fw-bold">{{ $item['count'] }}</h3>
                            <p class="text-muted">View Details</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

</div>
        </div>
    </div>
    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')

{{-- You might need to add a small CSS block if 'avatar-md' and 'fs-3' aren't defined by your template --}}
{{-- If your template doesn't provide these utility classes, add them in your main CSS or directly here --}}
<style>
    .avatar-md {
        height: 3.5rem;
        width: 3.5rem;
        font-size: 1.5rem; /* Adjust icon size if needed */
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
    .bg-success-subtle { background-color:  green !important; } /* Example, adjust as per your Bootstrap version's color palette */
    .text-success { color: white !important; }
    .bg-primary-subtle { background-color:green !important; }
    .text-primary { color: white !important; }
    .bg-warning-subtle { background-color:green !important; }
    .text-warning { color: white !important; }
    .bg-danger-subtle { background-color:green !important; }
    .text-danger { color: white !important; }
    .bg-info-subtle { background-color:green !important; }
    .text-info { color: white !important; }
    .fw-bold { font-weight: 700 !important; }
    .fw-normal { font-weight: 400 !important; }
</style>