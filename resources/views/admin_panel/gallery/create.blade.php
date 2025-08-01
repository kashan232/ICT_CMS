@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Add Gallery</h5>
                    </div>
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data" onsubmit="disableButton(this)">
                            @csrf

                            <div class="mb-3">
                                <label>Employee Name</label>
                                <input type="text" name="employee_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Image (Optional)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn" style="background-color:green;color:white;">Add Gallery</button>
                                <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
    </div>

    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
<script>
    function disableButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerText = 'Please wait...';
    }
</script>
