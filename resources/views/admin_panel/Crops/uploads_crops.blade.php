@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    @foreach ($crops as $crop)
    <!-- Modal -->
    <div class="modal fade" id="detailsModal{{ $crop->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $crop->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="detailsModalLabel{{ $crop->id }}">{{ $crop->crop_name }} - Full Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ $crop->crop_details }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Crops</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                <table id="userTable" class="table">
                                    <thead class="table-success">
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Crop Name</th>
                                            <th>Image</th>
                                            <th>Details</th>
                                            <th>Type Info</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($crops as $index => $crop)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $crop->category->name ?? 'N/A' }}</td>
                                            <td>{{ $crop->crop_name }}</td>
                                            <td>
                                                <img src="{{ env('APP_URL') . 'public/crops/' . $crop->crop_image }}" alt="Crop Image" width="80">
                                            </td>
                                            <td>
                                                {{ Str::limit($crop->crop_details, 60) }}
                                                @if (Str::length($crop->crop_details) > 60)
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $crop->id }}">Read more</a>
                                                @endif
                                            </td>

                                            <td>
                                                @php
                                                $typeInfo = json_decode($crop->details_type_json, true);
                                                @endphp
                                                <ul class="list-unstyled mb-0">
                                                    @foreach ($typeInfo as $item)
                                                    <li><strong>{{ $item['type'] }}:</strong> {{ $item['name'] }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <a href="{{ route('Crops.edit', $crop->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            </td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No crops found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

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