@include('admin_panel.includes.header')
<div class="wrapper">
@include('admin_panel.includes.navbar')
@include('admin_panel.includes.sidebar')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow-sm mt-4">
                <div class="card-header text-white" style="background-color:green;">
                    <h5>Add Tender</h5>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('upcomingtenders.store') }}" enctype="multipart/form-data">
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
                            <label>PDF File</label>
                            <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                        </div>
                        <div class="mb-3">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="text-end">
                            <button class="btn" style="background-color:green;color:white;">Add Tender</button>
                            <a href="{{ route('upcomingtenders.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
