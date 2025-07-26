@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page mt-4">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                
                    <div class="col-md-12">
                         
                            
                            <div class="card-body">
  
                            <div class="row ">
     <div class="col-lg-6       ">
 <h5 class="mb-0">Add New  Diseases Subtype</h5>
                                    </div>
                                    <div class="col-lg-6       ">
    <div class="card-header text-white d-flex justify-content-end">
    <a href="{{ route('Diseases-type-management') }}" class="btn" style="background-color:green !important;color:white   !important">
        Add Diseases Subtypes
    </a>
</div>
                                    </div>
                            </div>
                               <div class="card mt-2">
                                    <div class="card-body table-responsive">
                                        <table id="userTable" class="table">
                                            <thead class=""  style="background-color:green !important;color:white   !important">
                                                   <tr>
                                                    <th class="text-white">#</th>
                                                    <th class="text-white">Category</th>
                                                    <th class="text-white">Crop</th>
                                                    <th class="text-white">Disease Type</th>
                                                    <th class="text-white">Sub Disease Name</th>
                                                    <th class="text-white">Control</th>
                                                    <th class="text-white">Image</th>
                                                    <th class="text-white">Created At</th>
                                                    <th class="text-white">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subtypes as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>{{ $item->crop_name }}</td>
                                                    <td>{{ $item->disease_type_name }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{!! Str::limit($item->control, 100) !!}</td>
                                                    <td>
                                                        @if($item->image)
                                                        <img src="{{ env('APP_URL') . 'public/disease_subtypes/' . $item->image }}" width="60" alt="Cover">
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                                    <td><a href="{{ route('Disease.ssub.type.edit', $item->id) }}" class="btn  btn-sm"  style="background-color:green !important;color:white   !important">Edit</a>
                                               
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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