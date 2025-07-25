@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Add Agriculture Extension</h5>
                    </div>
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ url('/extension/store') }}" enctype="multipart/form-data" onsubmit="disableButton(this)">
                            @csrf

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Point One</label>
                                <input type="text" name="point_one" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Point Two</label>
                                <input type="text" name="point_two" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Point Three</label>
                                <input type="text" name="point_three" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Main Image (Round)</label>
                                <input type="file" name="main_image" class="form-control" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label>Small Image (Optional)</label>
                                <input type="file" name="small_image" class="form-control" accept="image/*">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn" style="background-color:green;color:white;">Add Extension</button>
                                <a href="{{ url('/extension') }}" class="btn btn-secondary">Cancel</a>
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
        button.innerText = 'Please wait...'; // Optional: Change button text
    }
</script>