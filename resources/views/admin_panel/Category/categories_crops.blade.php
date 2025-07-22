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
 <h5 class="mb-0">Add Category</h5>
                                    </div>
                                    <div class="col-lg-6       ">
    <div class="card-header text-white d-flex justify-content-end">
    <a href="{{ route('new.category.uploads') }}" class="btn " style="background-color:green !important;color:white   !important">
        Add Category
    </a>
</div>
                                    </div>
                            </div>
                        <div class="card shadow-sm border-0 rounded-3 mt-2">
                          
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                 <table id="userTable" class="table ">
                                    <thead>
                                    <tr style="background-color:green;color:white   !important">
                                        <th class="text-white">#</th>
                                        <th class="text-white">Name</th>
                                        <th class="text-white">Image</th>
                                        <th class="text-white">Action</th> <!-- New column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cropcategories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <img src="{{ env('APP_URL') . 'public/categories/' . $category->category_image }}" width="60" alt="Cover">
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm "  style="background-color:green;color:white   !important">Edit</a>
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