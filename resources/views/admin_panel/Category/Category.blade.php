@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3 mt-5">
                            <div class="card-header text-white"   style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Add New Category</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                <form action="{{ route('category.upload')}}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)">
                                   @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_image" class="form-label">Category Image</label>
                                        <input type="file" name="category_image" id="category_image" class="form-control" accept="image/*" required>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn "   style="background-color:green !important;color:white   !important"     >Upload</button>
                                    </div>
                                </form>
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
    function disableButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerText = 'Please wait...'; // Optional: Change button text
    }
</script>