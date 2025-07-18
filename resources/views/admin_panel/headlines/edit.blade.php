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
                                <h5 class="mb-0">Edit Headline</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('headline.update', $Headline->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $Headline->title }}" required>
                                    </div>

                                

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update</button>
                                        <a href="{{ route('headline.index') }}" class="btn btn-secondary">Cancel</a>
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
@include('admin_panel.includes.footer_links')
