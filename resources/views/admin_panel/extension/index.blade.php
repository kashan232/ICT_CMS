@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card-body mt-5">
                    <div class="row mb-3">
                        <div class="col-lg-6"><h5 class="mb-0">Agriculture Extension Upload</h5></div>
                        {{-- <div class="col-lg-6 d-flex justify-content-end">
                            <a href="{{ route('extension.create') }}" class="btn" style="background-color:green; color:white;">Add Agriculture Extension</a>
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
        <tr class="text-white">
            <th class="text-white">#</th>
            <th class="text-white text-center">Title</th>
            <th class="text-white text-center">Description</th>
            <th class="text-white text-center">Point 1</th>
            <th class="text-white text-center">Point 2</th>
            <th class="text-white text-center">Point 3</th>
            <th class="text-white text-center">Main Image</th>
            <th class="text-white text-center">Small Image</th>
            <th class="text-white text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ Str::limit($item->description, 50) }}</td>
                <td>{{ $item->point_one }}</td>
                <td>{{ $item->point_two }}</td>
                <td>{{ $item->point_three }}</td>
                <td>
                    @if($item->main_image)
                        <img src="{{ env('APP_URL') . 'storage/'  . $item->main_image }}" width="100" height="70">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>
                    @if($item->small_image)
                        <img src="{{ env('APP_URL') . 'storage/' . $item->small_image }}" width="100" height="70">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/extension/edit/'.$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    {{-- <a href="{{ url('/extension/delete/'.$item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a> --}}
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
