@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3 mt-4">
                            <div class="card-header  text-white"   style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Edit Category</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                <form action="{{ route('categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                                   @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter title" value="{{ $categories->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Category Image</label><br>
                                        <img src="{{ env('APP_URL') . 'public/categories/' . $categories->category_image }}" width="100" alt="Old Cover">
                                        <input type="hidden" name="old_cover" value="{{ $categories->category_image }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_image" class="form-label">New Category Image (Optional)</label>
                                        <input type="file" name="category_image" id="category_image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn "  style="background-color:green !important;color:white   !important">Upload</button>
                                    </div>
                                </form>
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