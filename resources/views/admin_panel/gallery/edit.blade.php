@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header text-white" style="background-color:green !important;">
                                <h5 class="mb-0">Edit Gallery</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <input type="text" name="employee_name" class="form-control" value="{{ $gallery->employee_name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Designation</label>
                                        <input type="text" name="designation" class="form-control" value="{{ $gallery->designation }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Old Image</label><br>
                                        @if($gallery->image)
                                            <img src="{{ env('APP_URL') . 'storage/' . $gallery->image }}" width="100" alt="Old Image"><br>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label>New Image (Optional)</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update</button>
                                        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
