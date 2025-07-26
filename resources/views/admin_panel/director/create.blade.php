@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Add director general</h5>
                    </div>
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
<form method="POST" action="{{ url('/director-general/store') }}" enctype="multipart/multipart/form-data" onsubmit="disableButton(this)">
    @csrf

    <div class="mb-3">
        <label>DG Name</label>
        <input type="text" name="Name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>DG extension</label>
        <textarea name="dg-extension" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label>Get to know us</label>
        <textarea name="know-us" class="form-control" rows="4" required></textarea>
    </div>

    <div id="heading-description-group">
        <div class="mb-3 border p-3 rounded heading-description-item">
            <h5>Heading & Description Type 1</h5>
            <div class="mb-3">
                <label>Heading</label>
                <textarea name="types[0][heading]" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="types[0][description]" class="form-control" rows="4" required></textarea>
            </div>
        </div>

        <div class="mb-3 border p-3 rounded heading-description-item">
            <h5>Heading & Description Type 2</h5>
            <div class="mb-3">
                <label>Heading</label>
                <textarea name="types[1][heading]" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="types[1][description]" class="form-control" rows="4" required></textarea>
            </div>
        </div>

        <div class="mb-3 border p-3 rounded heading-description-item">
            <h5>Heading & Description Type 3</h5>
            <div class="mb-3">
                <label>Heading</label>
                <textarea name="types[2][heading]" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="types[2][description]" class="form-control" rows="4" required></textarea>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label>Main Image (Round)</label>
        <input type="file" name="main_image" class="form-control" accept="image/*">
    </div>

    <div class="text-end">
        <button type="submit" class="btn" style="background-color:green;color:white;">Add Extension</button>
        <a href="{{ url('/director-general') }}" class="btn btn-secondary">Cancel</a>
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