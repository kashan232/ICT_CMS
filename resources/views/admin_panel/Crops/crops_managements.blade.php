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
                            <div class="card-header  text-white"  style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Add New Crop Management</h5>
                            </div>
                            <div class="card-body">

                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ route('Crops.Management.upload') }}" method="POST" enctype="multipart/form-data" id="managementForm" novalidate onsubmit="disableButton(this)">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="categorySelect" class="form-label">Crop Category</label>
                                        <select class="form-control" name="category_id" id="categorySelect">
                                            <option value="">Select Crop Category</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cropSelect" class="form-label">Crop</label>
                                        <select class="form-control" name="crop_id" id="cropSelect">
                                            <option value="">Select Crop</option>
                                        </select>
                                    </div>

                                    <div id="dynamicSectionsContainer">
                                        <!-- Dynamic management sections will be appended here -->
                                    </div>

                                    <button type="button" class="btn btn-sm btn-outline-success mb-3" id="addSectionBtn">Add Management Section</button>

                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn "  style="background-color:green !important;color:white   !important">Upload</button>
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
<script>
    function disableButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerText = 'Please wait...'; // Optional: Change button text
    }
</script>
@include('admin_panel.includes.footer_links')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let count = 0;

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
                .catch(error => console.error(error));
        }

        function removeSection(id) {
            $(`#section_${id}`).remove();
        }

        $(document).ready(function() {
            // First section on page load
            addSection();

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
    </script>