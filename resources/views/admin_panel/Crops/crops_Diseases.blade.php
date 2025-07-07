@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page mt-5">
        <div class="content">
            <div class="container-fluid">
                  <div class="row">
                
                    <div class="col-md-12 ">
                         
                            
                            <div class="card-body">
  
                            <div class="row ">
     <div class="col-lg-6       ">
 <h5 class="mb-0">Add New  Diseases Management</h5>
                                    </div>
                                    <div class="col-lg-6       ">
    <div class="card-header text-white d-flex justify-content-end">
    <a href="{{ route('Diseases-type-management') }}" class="btn " style="background-color:green !important;color:white   !important">
        Add Diseases Management
    </a>
</div>
                                    </div>
                            </div>
                            <div class="card-body">
                                @if(count($managements) > 0)
                                <div class="card mt-2">
                                    <div class="card-body table-responsive">
                                        <table id="userTable" class="table">
                                            <thead class=""  style="background-color:green !important;color:white   !important">
                                                <tr>
                                                     <th class="text-white">#</th>
                                                     <th class="text-white">Category</th>
                                                     <th class="text-white">Crop</th>
                                                     <th class="text-white">Disease Types</th>
                                                     <th class="text-white">Image</th>
                                                     <th class="text-white">Created At</th>
                                                     <th class="text-white">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($managements as $index => $item)
<tr>    
    <td>{{ $item->id }}</td>
    <td>{{ $item->category_name }}</td>
    <td>{{ $item->crop_name }}</td>
    <td>{{ ucfirst($item->type_name) }}</td>
    <td>
             <img src="{{ env('APP_URL') . 'public/disease/' . $item->image }}" width="100" class="mb-2"><br>

    </td>
    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
    <td>
        <a href="{{ route('crops-Diseases-edit',$item->id) }}" class="btn  btn-sm"  style="background-color:green !important;color:white   !important">
            Edit
        </a>
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