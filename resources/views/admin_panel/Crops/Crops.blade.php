@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3 mt-4">
                            <div class="card-header  text-white"   style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Add New Crops</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                <form action="{{ route('Crops.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Crop Category</label>
                                        <select class="form-control" name="category_id" id="categorySelect" required>
                                            <option value="">Select Crop Category</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="crop_name" class="form-label">Crop Name</label>
                                        <input type="text" class="form-control" name="crop_name" id="crop_name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="crop_image" class="form-label">Crop Image</label>
                                        <input type="file" class="form-control" name="crop_image" id="crop_image" accept="image/*" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="crop_details" class="form-label">Crop Details</label>
                                        <textarea class="form-control" name="crop_details" id="crop_details" rows="4" placeholder="Enter detailed description..." required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Details Type</label>
                                        <table class="table table-bordered" id="detailsTypeTable">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Name</th>
                                                    <th style="width: 50px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="types[]" class="form-control" required></td>
                                                    <td><input type="text" name="names[]" class="form-control" required></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-danger remove-row">&times;</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" id="addMore" class="btn btn-sm btn-secondary">Add More</button>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn " style="background-color:green !important;color:white   !important">Upload</button>
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
</div>
@include('admin_panel.includes.footer_links')
<script>
    document.getElementById('addMore').addEventListener('click', function() {
        let tableBody = document.querySelector('#detailsTypeTable tbody');
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" name="types[]" class="form-control" required></td>
            <td><input type="text" name="names[]" class="form-control" required></td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-danger remove-row">&times;</button>
            </td>
        `;
        tableBody.appendChild(newRow);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>