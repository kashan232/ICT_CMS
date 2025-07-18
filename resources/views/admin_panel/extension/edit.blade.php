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
                                <h5 class="mb-0">Edit Agriculture Extension</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/extension/update/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $data->title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="4" required>{{ $data->description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Point One</label>
                                        <input type="text" name="point_one" class="form-control" value="{{ $data->point_one }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Point Two</label>
                                        <input type="text" name="point_two" class="form-control" value="{{ $data->point_two }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Point Three</label>
                                        <input type="text" name="point_three" class="form-control" value="{{ $data->point_three }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Main Image</label><br>
                                        @if($data->main_image)
                                           <img src="{{ env('APP_URL') . 'storage/'  . $data->main_image }}" width="100" alt="Main Image"><br>
                                        @endif
                                        <input type="hidden" name="old_main_image" value="{{ $data->main_image }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="main_image" class="form-label">New Main Image (Optional)</label>
                                        <input type="file" name="main_image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Small Image</label><br>
                                        @if($data->small_image)
                                           <img src="{{ env('APP_URL') . 'storage/'  . $data->small_image   }}" width="100" alt="Small Image"><br>
                                        @endif
                                        <input type="hidden" name="old_small_image" value="{{ $data->small_image }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="small_image" class="form-label">New Small Image (Optional)</label>
                                        <input type="file" name="small_image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update</button>
                                        <a href="{{ url('/extension') }}" class="btn btn-secondary">Cancel</a>
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
