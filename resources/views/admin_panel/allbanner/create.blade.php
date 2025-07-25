@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Add Banner</h5>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('allbanner.store') }}" enctype="multipart/form-data" onsubmit="disableButton(this)"    >
                            @csrf
                            <div class="mb-3">
                                <label>Heading</label>
                                <input type="text" name="heading" class="form-control" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label>Type</label>
                                <input type="text" name="type" class="form-control" required placeholder="Crop, News, Sidebar etc.">
                            </div> --}}
                            <div class="mb-3">
                                <label>Image (Optional)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn" style="background-color:green;color:white;">Add Banner</button>
                                <a href="{{ route('allbanner.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
