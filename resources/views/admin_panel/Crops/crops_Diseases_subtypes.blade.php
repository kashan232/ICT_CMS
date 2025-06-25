@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Crops</h5>
                                <a href="{{ route('Diseases-type-management') }}" class="btn btn-secondary"> Add Diseases Subtypes</a>
                            </div>
                            <div class="card-body">
                                <div class="card mt-5">
                                    <div class="card-body table-responsive">
                                        <h5 class="mt-4">Crop Disease Sub Types List</h5>
                                        <table id="userTable" class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category</th>
                                                    <th>Crop</th>
                                                    <th>Disease Type</th>
                                                    <th>Sub Disease Name</th>
                                                    <th>Control</th>
                                                    <th>Image</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subtypes as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>{{ $item->crop_name }}</td>
                                                    <td>{{ $item->disease_type_name }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{!! Str::limit($item->control, 100) !!}</td>
                                                    <td>
                                                        @if($item->image)
                                                        <img src="{{ env('APP_URL') . 'public/disease_subtypes/' . $item->image }}" width="60" alt="Cover">
                                                        @else
                                                        N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
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
    </div>
    @include('admin_panel.includes.footer')
</div>
</div>
@include('admin_panel.includes.footer_links')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>