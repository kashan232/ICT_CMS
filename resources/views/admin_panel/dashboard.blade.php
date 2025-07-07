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

                <div class="row g-3"> {{-- Use g-3 for consistent guttering --}}

                    <div class="col-xl-4 col-md-6  col-sm-12"> {{-- Responsive columns --}}
                     <a href="{{ route('Crops') }}" class="link">
                           <div class="card shadow-md border-0 h-100"> {{-- Add shadow, remove border, make cards same height --}}
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-md rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center fs-3">
                                            <i class="fas fa-seedling"></i> {{-- Icon for crops --}}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total Crops">Total Crops</h5>
                                        <h3 class="mt-3 mb-3 fw-bold">{{ $totalCrops ?? 0 }}</h3> {{-- Display count, use ?? 0 for safety --}}
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Number of crops in the database.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </a>
                    </div>

                    <div class="col-xl-4 col-md-6  col-sm-12">
                     <a href="{{route('categories-list') }}" class="link">

                        <div class="card shadow-md border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-md rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center fs-3">
                                            <i class="fas fa-folder-open"></i> {{-- Icon for categories --}}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total Crop Categories">Total Crop Categories</h5>
                                        <h3 class="mt-3 mb-3 fw-bold">{{ $totalCropCategories ?? 0 }}</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Different categories of crops.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
</a>
                    </div>

                    <div class="col-xl-4 col-md-6  col-sm-12">
                     <a href="{{ route('crops-Diseases') }}" class="link">

                        <div class="card shadow-md border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-md rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center fs-3">
                                            <i class="fas fa-bug"></i> {{-- Icon for disease types --}}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total Crop Disease Types">Total Disease Types</h5>
                                        <h3 class="mt-3 mb-3 fw-bold">{{ $totalCropDiseaseTypes ?? 0 }}</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Main types of crop diseases.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
</a>
                    </div>

                    <div class="col-xl-4 col-md-6  col-sm-12">
                     <a href="{{ route('crops-Diseases-subtypes') }}" class="link">

                        <div class="card shadow-md border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-md rounded-circle bg-danger-subtle text-danger d-flex align-items-center justify-content-center fs-3">
                                            <i class="fas fa-viruses"></i> {{-- Icon for disease sub-types --}}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total Crop Disease Sub Types">Total Disease Sub Types</h5>
                                        <h3 class="mt-3 mb-3 fw-bold">{{ $totalCropDiseaseSubTypes ?? 0 }}</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Specific sub-types of crop diseases.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
</a>
                    </div>

                    <div class="col-xl-4 col-md-6  col-sm-12">
                     <a href="{{ route('crops-management') }}" class="link">

                        <div class="card shadow-md border-0 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-md rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center fs-3">
                                            <i class="fas fa-hand-holding-heart"></i> {{-- Icon for management --}}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total Crop Managements">Total Crop Managements</h5>
                                        <h3 class="mt-3 mb-3 fw-bold">{{ $totalCropManagements ?? 0 }}</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-nowrap">Records of crop management practices.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
</a>
                    </div>
   <div class="col-xl-4 col-md-6  col-sm-12"> {{-- Responsive columns --}}
                     <a href="{{  route('uploads') }}" class="link">

    <div class="card shadow-md border-0 h-100"> {{-- Card with shadow, no border --}}
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
  <div class="avatar-md rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center fs-3">
                        <i class="fas fa-file-pdf"></i> {{-- Icon for PDFs --}}
                    </div>
                </div>
                <div class="flex-grow-1">
                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total PDFs">Total PDFs</h5>
                    <h3 class="mt-3 mb-3 fw-bold">{{ $totalPDFs ?? 0 }}</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-nowrap">Uploaded crop-related PDF files.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</a>
</div>


    
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