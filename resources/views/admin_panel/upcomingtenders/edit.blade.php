@include('admin_panel.includes.header')
<div class="wrapper">
@include('admin_panel.includes.navbar')
@include('admin_panel.includes.sidebar')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow-sm mt-4">
                <div class="card-header text-white" style="background-color:green;">
                    <h5>Edit Tender</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('upcomingtenders.update', $tender->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $tender->title }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $tender->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Old PDF File</label><br>
                            @if($tender->pdf_file)
                                <a href="{{ asset('storage/'.$tender->pdf_file) }}" target="_blank" class="btn btn-sm btn-primary">View PDF</a>
                            @else
                                <span class="text-muted">No PDF</span>
                            @endif
                            <input type="hidden" name="old_pdf" value="{{ $tender->pdf_file }}">
                        </div>
                        <div class="mb-3">
                            <label>New PDF File (Optional)</label>
                            <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
                        </div>
                        <div class="mb-3">
                            <label>Date</label>
                            <input type="date" name="date" value="{{ $tender->date }}" class="form-control" required>
                        </div>
                        <div class="text-end">
                            <button class="btn" style="background-color:green;color:white;">Update Tender</button>
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
