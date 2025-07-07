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
                                <h5 class="mb-0">Edit Crop Management</h5>
                            </div>
                            <div class="card-body">

                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                                @endif

                                    <form action="{{ route('Crops.Management.upload') }}" method="POST" enctype="multipart/form-data" id="managementForm">
                                        @csrf
                                        @method('POST')
                                        @foreach($managementDetails as $cat)
                                            <input type="hidden" id="edit_id" name="edit_id[]" value="{{ $cat->id }}">    
                                        @endforeach
                                        <div class="mb-3">
                                            <label for="categorySelect" class="form-label">Crop Category</label>
                                            <select class="form-control" name="category_id" id="categorySelect" required>
                                                <option value="">Select Crop Category</option>
                                                @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $management->category_id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cropSelect" class="form-label">Crop</label>
                                            <select class="form-control" name="crop_id" id="cropSelect" required>
                                                <option value="">Select Crop</option>
                                                @foreach($filteredCrops as $crop)
                                                <option value="{{ $crop->id }}" {{ $crop->id == $management->crop_id ? 'selected' : '' }}>
                                                    {{ $crop->crop_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div id="dynamicSectionsContainer">
                                            @php $count = 0; @endphp
                                            @foreach($managementDetails as $index => $item)
                                            @php $count++; @endphp
                                            <div class="border p-3 rounded mb-3" id="section_{{ $count }}">
                                                <label class="form-label">Management Type</label>
                                                <select name="management_type[]" class="form-control mb-2" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="plantNutrition" {{ $item->management_type == 'plantNutrition' ? 'selected' : '' }}>Plant Nutrition</option>
                                                    <option value="cropManagement" {{ $item->management_type == 'cropManagement' ? 'selected' : '' }}>Crop Management</option>
                                                    <option value="othersManagement" {{ $item->management_type == 'othersManagement' ? 'selected' : '' }}>Others Management</option>
                                                </select>

                                                <label class="form-label">Management Details</label>
                                                <textarea name="management_details[]" id="editor_{{ $count }}" class="form-control" required>{!! $item->management_details !!}</textarea>

                                                <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeSection({{ $count }})">Remove</button>
                                            </div>
                                            @endforeach
                                        </div>

                                        <button type="button" class="btn btn-sm btn-secondary mb-3" id="addSectionBtn">Add Management Section</button>

                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn " style="background-color:green !important;color:white   !important">Update</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  let count = {{ count($managementDetails) }};


    let editors = {};

    function addSection() {
        count++;
        let html = `
            <div class="border p-3 rounded mb-3" id="section_${count}">
                <label class="form-label">Management Type</label>
                <select name="management_type[]" class="form-control mb-2" required>
                    <option value="">-- Select --</option>
                    <option value="plantNutrition">Plant Nutrition</option>
                    <option value="cropManagement">Crop Management</option>
                    <option value="othersManagement">Others Management</option>
                </select>

                <label class="form-label">Management Details</label>
                <textarea name="management_details[]" id="editor_${count}" class="form-control" required></textarea>

                <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeSection(${count})">Remove</button>
            </div>
        `;
        $('#dynamicSectionsContainer').append(html);

        ClassicEditor
            .create(document.querySelector(`#editor_${count}`))
            .then(editor => {
                editors[`editor_${count}`] = editor;
            })
            .catch(error => console.error(error));
    }

    function removeSection(id) {
        if (editors[`editor_${id}`]) {
            editors[`editor_${id}`].destroy();
            delete editors[`editor_${id}`];
        }
        $(`#section_${id}`).remove();
    }

    $(document).ready(function() {
        // Initialize existing editors
        for (let i = 1; i <= count; i++) {
            ClassicEditor
                .create(document.querySelector(`#editor_${i}`))
                .then(editor => {
                    editors[`editor_${i}`] = editor;
                })
                .catch(error => console.error(error));
        }

        $('#addSectionBtn').click(function() {
            addSection();
        });

        // Load crops based on category
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

        $('#managementForm').on('submit', function(e) {
            let isValid = true;

            for (const id in editors) {
                const data = editors[id].getData().trim();
                if (!data) {
                    isValid = false;
                    alert("Please fill all Management Details fields.");
                    document.getElementById(id).scrollIntoView({
                        behavior: 'smooth'
                    });
                    break;
                }
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>