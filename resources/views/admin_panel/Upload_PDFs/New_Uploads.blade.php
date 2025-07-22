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
                            <div class="card-header  text-white"   style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Add New Uploads</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                <form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="pdf_type" class="form-label">PDF Type</label>
                                        <select name="pdf_type" id="pdf_type" class="form-select" required>
                                            <option value="">Select Type</option>
                                            <option value="Booklets">Booklets</option>
                                            <option value="Magazines">Magazines</option>
                                            <option value="Field Guide">Field Guide</option>
                                            <option value="Publication">Publication</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="cover_photo" class="form-label">Cover Photo</label>
                                        <input type="file" name="cover_photo" id="cover_photo" class="form-control" accept="image/*" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">PDF File</label>
                                        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf" required>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important;color:white   !important">Upload</button>
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