@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
     <div class="row">
                
                    <div class="col-md-12 mt-4">
                         
                            
                            <div class="card-body mt-2">
  
                            <div class="row ">
     <div class="col-lg-6       ">
 <h5 class="mb-0">Add Management</h5>
                                    </div>
                                    <div class="col-lg-6       ">
    <div class="card-header text-white d-flex justify-content-end">
                                <a href="{{ route('Crops.Managements') }}" class="btn " style="background-color:green !important;color:white   !important"> Add Management</a>

</div>
                                    </div>
                            </div>
                            <div class="card-body mt-2">
                                @if(count($managements) > 0)
                                <div class="card ">
                                    <div class="card-body table-responsive">
                                        <table id="userTable" class="table">
                                            <thead class=""  style="background-color:green !important;color:white   !important">
                                                <tr>
                                                     <th class="text-white">#</th>
                                                     <th class="text-white">Category</th>
                                                     <th class="text-white">Crop</th>
                                                     <th class="text-white">Management Type</th>
                                                     <th class="text-white">Management Details</th>
                                                     <th class="text-white">Created At</th>
                                                     <th class="text-white">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($managements as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>{{ $item->crop_name }}</td>
                                                    <td>{{ ucfirst($item->management_type) }}</td>
                                                    <td>{!! Str::limit($item->management_details, 100) !!}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                                    <td><a href="{{ route('edit.Crops.Managements',$item->id) }}" class="btn  btn-sm" style="background-color:green !important;color:white   !important"> Edit </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin_panel.includes.footer')
</div>
</div>
@include('admin_panel.includes.footer_links')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>