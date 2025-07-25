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
                            <div class="card-header  text-white"   style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Add New Crop Diseases Managements</h5>
                            </div>
                            <div class="card-body">

                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                                @endif
                          <form action="{{ route('Diseases.upload') }}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)">
    @csrf
    {{-- Category --}}
    <div class="mb-3">
        <label>Crop Category</label>
        <select name="category_id" id="categorySelect" class="form-control" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $diseaseTypes->first()->category_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Crop --}}
    <div class="mb-3">
        <label>Crop</label>
        <select name="crop_id" id="cropSelect" class="form-control" required>
            @foreach($crops as $crop)
                <option value="{{ $crop->id }}" {{ $crop->id == $diseaseTypes->first()->crop_id ? 'selected' : '' }}>
                    {{ $crop->crop_name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Disease Types --}}
    <div id="disease-types-section">
        @foreach($diseaseTypes as $index => $disease)
        <div class="disease-type-entry mb-4 border p-3 rounded">
            <input type="hidden" name="disease_types[{{ $index }}][id]" value="{{ $disease->id }}">

            <label>Disease Type Name</label>
            <input type="text" name="disease_types[{{ $index }}][type_name]" class="form-control" value="{{ $disease->type_name }}" required>

            <label class="mt-2">Existing Image</label><br>
            <img src="{{ env('APP_URL') . 'public/disease/' . $disease->image }}" width="100" class="mb-2"><br>

            <label>Change Image (optional)</label>
            <input type="file" name="disease_types[{{ $index }}][image]" class="form-control" accept="image/*">
        </div>
        @endforeach
    </div>

    <div class="text-end mt-4">
        <button type="submit" class="btn "  style="background-color:green !important;color:white   !important">Update</button>
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

    let typeIndex = 1;
    document.getElementById('addDiseaseType').addEventListener('click', function() {
        const container = document.getElementById('disease-types-section');
        const html = `
            <div class="disease-type-entry mb-4 border p-3 rounded">
                <label>Disease Type Name</label>
                <input type="text" name="disease_types[${typeIndex}][type_name]" class="form-control" required>

                <label class="mt-2">Disease Type Image</label>
                <input type="file" name="disease_types[${typeIndex}][image]" class="form-control" accept="image/*" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        typeIndex++;
    });
</script>