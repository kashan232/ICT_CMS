@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12    mt-4">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header text-white" style="background-color:green !important;">
                            <h5 class="mb-0">Add Video</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('videos.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Video Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">YouTube Embed Link</label>
                                    <input type="text" name="youtube_link" class="form-control" required placeholder="https://www.youtube.com/embed/xxxxxxx">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn" style="background-color:green; color:white;">Add Video</button>
                                    <a href="{{ route('videos.index') }}" class="btn btn-secondary">Cancel</a>
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
