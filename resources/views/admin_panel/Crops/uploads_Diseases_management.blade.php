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
                            <div class="card-header text-white" style="background-color:green !important;color:white !important">
                                <h5 class="mb-0">Add New Crop Diseases Management</h5>
                            </div>
                            <div class="card-body">

                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('Diseases.upload') }}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)" >
                                    @csrf

                                    {{-- Category --}}
                                    <div class="mb-3">
                                        <label>Crop Category</label>
                                        <select name="category_id" id="categorySelect" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Crop --}}
                                    <div class="mb-3">
                                        <label>Crop</label>
                                        <select name="crop_id" id="cropSelect" class="form-control" required>
                                            <option value="">Select Crop</option>
                                        </select>
                                    </div>

                                    {{-- Disease Types --}}
                                    <div id="disease-types-section">
                                        <div class="disease-type-entry mb-4 border p-3 rounded shadow-sm">
                                            <label>Disease Type Name</label>
                                            <input type="text" name="disease_types[0][type_name]" class="form-control" required>

                                            <label class="mt-2">Disease Type Image</label>
                                            <input type="file" name="disease_types[0][image]" class="form-control" accept="image/*" required>
                                        </div>
                                    </div>

                                    <div class="text-start mb-3">
                                        <button type="button" id="addDiseaseType" class="btn text-white" style="background:green">Add More Disease Type</button>
                                    </div>

                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn submit" style="background-color:green !important;color:white !important">Save</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- content -->
    </div> <!-- content-page -->

    @include('admin_panel.includes.footer')
</div>

@include('admin_panel.includes.footer_links')

{{-- Scripts --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function disableButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerText = 'Please wait...'; // Optional: Change button text
    }
</script>
<script>
    // Crop Load based on Category
    $(document).ready(function() {
        $('#categorySelect').on('change', function() {
            const categoryId = $(this).val();
            $('#cropSelect').empty().append('<option value="">Select Crop</option>');

            if (categoryId) {
                $.ajax({
                    url: "{{ route('Crops.getByCategory', ['id' => '__id__']) }}".replace('__id__', categoryId),
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(index, crop) {
                            $('#cropSelect').append(`<option value="${crop.id}">${crop.crop_name}</option>`);
                        });
                    }
                });
            }
        });
    });

    // Add More Disease Type
    let typeIndex = 1;
    $('#addDiseaseType').click(function() {
        const html = `
            <div class="disease-type-entry mb-4 border p-3 rounded shadow-sm">
                <label>Disease Type Name</label>
                <input type="text" name="disease_types[${typeIndex}][type_name]" class="form-control" required>

                <label class="mt-2">Disease Type Image</label>
                <input type="file" name="disease_types[${typeIndex}][image]" class="form-control" accept="image/*" required>
            </div>
        `;
        $('#disease-types-section').append(html);
        typeIndex++;
    });
</script>
