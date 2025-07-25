@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Add Document</h5>
                    </div>
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" onsubmit="disableButton(this)">
                            @csrf

                            <div class="mb-3">
                                <label>Document Title</label>
                                <input type="text" name="document_title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Report No.</label>
                                <input type="text" name="report_no" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Document Type</label>
                                <input type="text" name="document_type" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>PDF File</label>
                                <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn" style="background-color:green;color:white;">Add Document</button>
                                <a href="{{ route('documents.index') }}" class="btn btn-secondary">Cancel</a>
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