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
                            <div class="card-header text-white" style="background-color:green !important; color:white !important">
                                <h5 class="mb-0">Update Banner</h5>
                            </div>

                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Banner Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="details" class="form-label">Banner Description</label>
                                        <textarea name="description" id="details" rows="4" class="form-control" required>{{ $banner->description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Banner Image</label><br>
                                        @if($banner->image)
                                             <a href="{{ env('APP_URL') . 'storage/' . $banner->image}}" target="_blank">
            <img src="{{ env('APP_URL') . 'storage/' . $banner->image}}" width="50" height="50" alt="Cover">
        </a>
<br>
                                        @else
                                            <span class="text-muted">No Image Uploaded</span><br>
                                        @endif
                                        <input type="hidden" name="old_image" value="{{ $banner->image }}">
                                    </div>
                                        
                                    <div class="mb-3">
                                        <label for="image" class="form-label">New Banner Image (Optional)</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update Banner</button>
                                        <a href="{{ route('banners.index') }}" class="btn btn-secondary">Cancel</a>
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
</div>
@include('admin_panel.includes.footer_links')
