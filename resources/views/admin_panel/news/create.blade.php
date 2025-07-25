@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header text-white" style="background-color:green !important;color:white !important">
                                <h5 class="mb-0">Add News</h5>
                            </div>

                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ session('success') }}.
                                    </div>
                                @endif

                                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">News Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="details" class="form-label">News Details</label>
                                        <textarea name="details" id="details" rows="4" class="form-control" placeholder="Enter news details" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Cover Image</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pdf" class="form-label">Attach PDF (Optional)</label>
                                        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Add News</button>
                                    </div>
                                </form>
                            {{-- </div>/ --}}

                        </div>
                    </div>
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