@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card-body mt-5">
                    <div class="row mb-3">
                        <div class="col-lg-6"><h5 class="mb-0">District Offices</h5></div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <a href="{{ route('district.create') }}" class="btn" style="background-color:green; color:white;">Add District Office</a>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table text-center" id="districtTable">
                                    <thead style="background-color:green; color:white;">
                                        <tr>
                                            <th class="text-white">#</th>
                                            <th class="text-white">District Name</th>
                                            <th class="text-white">Headquarters</th>
                                            <th class="text-white">Area</th>
                                            <th class="text-white">Population</th>
                                            <th class="text-white">Density</th>
                                            <th class="text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($districts as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->district_name }}</td>
                                                <td>{{ $item->headquarters }}</td>
                                                <td>{{ $item->area }}</td>
                                                <td>{{ $item->population }}</td>
                                                <td>{{ $item->density }}</td>
                                                <td>
                                                    <a href="{{ route('district.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('district.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
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
{{-- end --}}