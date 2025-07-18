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
                            <div class="card-header text-white" style="background-color:green !important;">
                                <h5 class="mb-0">Edit Document</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Document Title</label>
                                        <input type="text" name="document_title" class="form-control" value="{{ $document->document_title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="date" name="date" class="form-control" value="{{ $document->date }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Report No.</label>
                                        <input type="text" name="report_no" class="form-control" value="{{ $document->report_no }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Document Type</label>
                                        <input type="text" name="document_type" class="form-control" value="{{ $document->document_type }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old PDF</label><br>
                                        @if($document->pdf_file)
                                            <a href="{{ asset('storage/' . $document->pdf_file) }}" target="_blank" class="btn btn-sm btn-primary">View PDF</a>
                                        @else
                                            <span class="text-muted">No PDF</span>
                                        @endif
                                        <input type="hidden" name="old_pdf" value="{{ $document->pdf_file }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New PDF (Optional)</label>
                                        <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update</button>
                                        <a href="{{ route('documents.index') }}" class="btn btn-secondary">Cancel</a>
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
@include('admin_panel.includes.footer_links')
