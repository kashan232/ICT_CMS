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
                            <div class="card-header text-white"   style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Edit Crop Diseases Managements</h5>
                            </div>
                            <div class="card-body">

                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ route('crop.disease.subtypes.store') }}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Crop Category</label>
                                           <select class="form-control" name="category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $selectedCategoryId ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Crop</label>
                                   <select class="form-control" name="crop_id" required>
            <option value="">Select Crop</option>
            @foreach($crops as $crop)
                <option value="{{ $crop->id }}" {{ $crop->id == $selectedCropId ? 'selected' : '' }}>
                    {{ $crop->crop_name }}
                </option>
            @endforeach
        </select>
                                    </div>
                                    <div id="subDiseaseEntries">
                                            @foreach($subtypes as $index => $sub)
                                        <div class="sub-disease-entry border p-3 rounded mb-3">
                                                        <input type="hidden" name="sub_diseases[{{ $index }}][id]" value="{{ $sub->id }}">
                                            <label>Disease Type</label>
                                      <select class="form-control" name="sub_diseases[{{ $index }}][disease_type_id]" required>
    <option value="">Select Disease Type</option>
    @foreach($diseaseTypes as $type)
        <option value="{{ $type->id }}" {{ $type->id == $sub->disease_type_id ? 'selected' : '' }}>
            {{ $type->type_name }}
        </option>
    @endforeach
</select>
                                            <label class="mt-2">Disease Name</label>
                                            <input type="text" name="sub_diseases[{{ $index }}][name]" class="form-control" value="{{ $sub->name }}" required>
                                            <label class="mt-2">Control</label>
                                            <textarea name="sub_diseases[{{ $index }}][control]" class="form-control" rows="4">{{ $sub->control }}</textarea>
                                         
                                                  {{-- Current Image --}}
            <label class="mt-2">Current Image</label><br>
            @if($sub->image)
                <img src="{{ asset('diseases_subtypes/' . $sub->image) }}" width="100" class="img-thumbnail mb-2">
            @else
                <p>No Image</p>
            @endif

            {{-- Change Image --}}
                                            <label class="mt-2">Image</label>
            <label class="mt-2">Change Image</label>
    <input type="file" name="sub_diseases[{{ $index }}][image]" class="form-control" accept="image/*">
                                        </div>
        @endforeach

                                    </div>
                                    <button type="button" class="btn btn-secondary" id="addMoreSubDisease">+ Add More Sub Disease</button>
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn "  style="background-color:green !important;color:white   !important">Save</button>
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
    // Initialize CKEditor for all existing textareas with class
    document.querySelectorAll('.ckeditor-control').forEach((el) => {
        ClassicEditor.create(el).catch(error => console.error(error));
    });

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

        let count = 1;

        $('#addMoreSubDisease').on('click', function() {
            let diseaseOptions = $('#diseaseTypeSelect').html(); // Get existing options

            let html = `
        <div class="sub-disease-entry border p-3 rounded mb-3">
            <label>Disease Type</label>
            <select class="form-control" name="sub_diseases[${count}][disease_type_id]" required>
                ${diseaseOptions}
            </select>
            <label class="mt-2">Disease Name</label>
            <input type="text" name="sub_diseases[${count}][name]" class="form-control" required>
            <label class="mt-2">Control</label>
            <textarea name="sub_diseases[${count}][control]" class="form-control ckeditor-control" rows="4"></textarea>
            <label class="mt-2">Image</label>
            <input type="file" name="sub_diseases[${count}][image]" class="form-control" accept="image/*">
        </div>
    `;

            $('#subDiseaseEntries').append(html);

            // Only initialize CKEditor for new ones
            setTimeout(() => {
                document.querySelectorAll('.ckeditor-control').forEach((el) => {
                    if (!el.dataset.initialized) {
                        ClassicEditor.create(el)
                            .then(editor => {
                                el.dataset.initialized = true;
                            })
                            .catch(error => console.error(error));
                    }
                });
            }, 100);

            count++;
        });

        $('#cropSelect').on('change', function() {
            let cropId = $(this).val();
            let categoryId = $('#categorySelect').val();

            if (cropId && categoryId) {
                $.ajax({
                    url: '{{ route("get.disease.types") }}',
                    method: 'POST',
                    data: {
                        category_id: categoryId,
                        crop_id: cropId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let options = `<option value="">Select Disease Type</option>`;
                        response.data.forEach(function(item) {
                            options += `<option value="${item.id}">${item.type_name}</option>`;
                        });
                        $('#diseaseTypeSelect').html(options);
                    }
                });
            }
        });
    });
</script>