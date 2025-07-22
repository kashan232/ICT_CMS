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
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="mb-0">Video Upload</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-header text-white d-flex justify-content-end">
                                        <a href="{{ route('videos.create') }}" class="btn" style="background-color:green !important;color:white !important">
                                            Add Video
                                        </a>
                                    </div>
                                </div>
                            </div>  

                            <div class="card shadow-sm border-0 rounded-3 mt-2">
                                <div class="card-body">

                                    @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ session('success') }}
                                    </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table id="userTable" class="table">
                                            <thead style="background-color:green !important; color:white !important">
                                                <tr>
                                                    <th class="text-white">#</th>
                                                    <th class="text-white">Title</th>
                                                    <th class="text-white">YouTube Video</th>
                                                    <th class="text-white">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($videos as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>
                                                        <iframe width="200" height="100" src="{{ $item->youtube_link }}" frameborder="0" allowfullscreen></iframe>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('videos.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <a href="{{ route('videos.delete',$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
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
@include('admin_panel.includes.footer_links')
