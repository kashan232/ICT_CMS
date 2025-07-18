@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card-body mt-5">
                    <div class="row mb-3">
                        <div class="col-lg-6"><h5 class="mb-0">All Banners</h5></div>
                        {{-- <div class="col-lg-6 d-flex justify-content-end">
                            <a href="{{ route('allbanner.create') }}" class="btn" style="background-color:green; color:white;">Add Banner</a>
                        </div> --}}
                    </div>

                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table text-center" id="userTable">
                                    <thead style="background-color:green; color:white;">
                                        <tr>
                                            <th class="text-center text-white">#</th>
                                            <th class="text-center text-white">Heading</th>
                                            <th class="text-center text-white">File Name</th>
                                            <th class="text-center text-white">Image</th>
                                            <th class="text-center text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->heading }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>
                                                    @if($item->image)
                                                        <img src="{{ env('APP_URL') . 'storage/' . $item->image}}" width="100" height="50">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('allbanner.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    {{-- <a href="{{ route('allbanner.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a> --}}
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
@include('admin_panel.includes.footer_links')
