@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 rounded-3 mt-4">
                            <div class="card-header text-white" style="background-color:green !important;color:white   !important">
                                <h5 class="mb-0">Update PDF Upload</h5>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('pdfs.update', $pdf->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="pdf_type" class="form-label">PDF Type</label>
                                        <select name="pdf_type" id="pdf_type" class="form-select" required>
                                            <option value="">Select Type</option>
                                            <option value="Booklets" {{ $pdf->pdf_type == 'Booklets' ? 'selected' : '' }}>Booklets</option>
                                            <option value="Magazines" {{ $pdf->pdf_type == 'Magazines' ? 'selected' : '' }}>Magazines</option>
                                            <option value="Field Guide" {{ $pdf->pdf_type == 'Field Guide' ? 'selected' : '' }}>Field Guide</option>
                                            <option value="Publication" {{ $pdf->pdf_type == 'Publication' ? 'selected' : '' }}>Publication</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $pdf->title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" value="{{ $pdf->date }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Cover Photo</label><br>
                                        <img src="{{ env('APP_URL') . 'public/covers/' . $pdf->cover_photo }}" width="100" alt="Old Cover">
                                        <input type="hidden" name="old_cover" value="{{ $pdf->cover_photo }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cover_photo" class="form-label">New Cover Photo (Optional)</label>
                                        <input type="file" name="cover_photo" id="cover_photo" class="form-control" accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old PDF File</label><br>
                                        <a href="{{ env('APP_URL') . 'public/pdfs/' . $pdf->pdf_file }}" target="_blank" class="btn btn-sm btn-secondary">View Current PDF</a>
                                        <input type="hidden" name="old_pdf" value="{{ $pdf->pdf_file }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">New PDF File (Optional)</label>
                                        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn " style="background-color:green !important;color:white   !important">Update PDF</button>
                                        <a href="{{ route('uploads') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin_panel.includes.footer')
    </div>
</div>
@include('admin_panel.includes.footer_links')
