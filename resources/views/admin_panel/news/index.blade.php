@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
       <div class="row">
                
                    <div class="col-md-12 mt-5">
                         
                            
                            <div class="card-body">
  
                            <div class="row ">
     <div class="col-lg-6       ">
 <h5 class="mb-0">News Uplaod</h5>
                                    </div>
                                    <div class="col-lg-6       ">
    <div class="card-header text-white d-flex justify-content-end">
    <a href="{{ route('news.create') }}" class="btn " style="background-color:green !important;color:white   !important">
        Add News
    </a>
</div>
                                    </div>
                            </div>  
                        <div class="card shadow-sm border-0 rounded-3 mt-2  ">
                          
                            <div class="card-body">
    @if (session()->has('success'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ session('success') }}.
    </div>
    @endif

    <div class="table-responsive">
        <table id="userTable" class="table ">
            <thead style="background-color:green !important; color:white !important">
                <tr>
                    <th class="text-white">#</th>
                    <th class="text-white">Title</th>
                    <th class="text-white">Date</th>
                    <th class="text-white">Details</th>
                    <th class="text-white">Image</th>
                    <th class="text-white">PDF</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                    <td style="max-width: 200px; overflow: auto; white-space: nowrap;">
    {{ $item->details }}
</td>
<td>
    @if($item->image)
        <a href="{{ env('APP_URL') . 'storage/' . $item->image}}" target="_blank">
            <img src="{{ env('APP_URL') . 'storage/' . $item->image}}" width="50" height="50" alt="Cover">
        </a>
    @endif
</td>

                    <td>
                        @if($item->pdf)
                        <a href="{{ route('news.download', $item->id) }}" class="btn btn-sm btn-primary" target="_blank">Download PDF</a>
                        @else
                        <span class="badge bg-secondary">No PDF</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('news.destroy', $item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
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
    </div>
    @include('admin_panel.includes.footer')
</div>
</div>
@include('admin_panel.includes.footer_links')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.delete-btn', function (e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This PDF will be permanently deleted.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>