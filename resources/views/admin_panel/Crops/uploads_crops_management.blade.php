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
                                <a href="{{ route('Crops.Managements') }}" class="btn btn-secondary"> Add Management</a>
                            </div>
                            <div class="card-body">
                                @if(count($managements) > 0)
                                <div class="card mt-5">
                                    <div class="card-body table-responsive">
                                        <table id="userTable" class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category</th>
                                                    <th>Crop</th>
                                                    <th>Management Type</th>
                                                    <th>Management Details</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($managements as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>{{ $item->crop_name }}</td>
                                                    <td>{{ ucfirst($item->management_type) }}</td>
                                                    <td>{!! Str::limit($item->management_details, 100) !!}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                                    <td><a href="{{ route('edit.Crops.Managements', $item->id) }}" class="btn btn-primary btn-sm"> Edit </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
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