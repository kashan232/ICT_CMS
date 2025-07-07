@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3 mt-4">
                            <div class="card-header  text-white" style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Edit Crop Disease Sub Types</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('update.subtypes') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- Category --}}
                                    <div class="mb-3">
                                        <label>Crop Category</label>
                                        <select class="form-control" name="category_id" id="categorySelect" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $selectedCategoryId ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Crop --}}
                                    <div class="mb-3">
                                        <label>Crop</label>
                                        <select class="form-control" name="crop_id" id="cropSelect" required>
                                            <option value="">Select Crop</option>
                                            @foreach($crops as $crop)
                                            <option value="{{ $crop->id }}" {{ $crop->id == $selectedCropId ? 'selected' : '' }}>
                                                {{ $crop->crop_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Subtypes --}}
                                    <div id="disease-subtypes-section">
                                        @foreach($subtypes as $index => $sub)
                                        <div class="disease-subtype-entry mb-4 border p-3 rounded shadow-sm">
                                            <input type="hidden" name="sub_diseases[{{ $index }}][id]" value="{{ $sub->id }}">

                                            <label>Disease Type</label>
                                            <select class="form-control mb-2" name="sub_diseases[{{ $index }}][disease_type_id]" required>
                                                <option value="">Select Disease Type</option>
                                                @foreach($diseaseTypes as $type)
                                                <option value="{{ $type->id }}" {{ $type->id == $sub->disease_type_id ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                                @endforeach
                                            </select>

                                            <label>Disease Name</label>
                                            <input type="text" name="sub_diseases[{{ $index }}][name]" class="form-control mb-2" value="{{ $sub->name }}" required>

                                            <label>Control</label>
                                            <textarea class="form-control mb-2" name="sub_diseases[{{ $index }}][control]" rows="3">{{ $sub->control }}</textarea>

                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label>Current Image</label><br>
                                                    @if($sub->image)
                                                    <img src="{{ asset('disease_subtypes/' . $sub->image) }}" width="100" class="img-thumbnail">
                                                    @else
                                                    <p>No image</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>Change Image</label>
                                                    <input type="file" class="form-control" name="sub_diseases[{{ $index }}][image]">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- content -->
    </div> <!-- content-page -->

    @include('admin_panel.includes.footer')
</div>

@include('admin_panel.includes.footer_links')
n