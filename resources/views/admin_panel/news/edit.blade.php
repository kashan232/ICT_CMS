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
                            <div class="card-header text-white" style="background-color:green !important; color:white !important">
                                <h5 class="mb-0">Update News</h5>
                            </div>

                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <div class="mb-3">
                                        <label for="title" class="form-label">News Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" value="{{ $news->date }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="details" class="form-label">News Details</label>
                                        <textarea name="details" id="details" rows="4" class="form-control" required>{{ $news->details }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Cover Image</label><br>
                                        @if($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" width="100" alt="Old Image"><br>
                                        @else
                                            <span class="text-muted">No Image Uploaded</span><br>
                                        @endif
                                        <input type="hidden" name="old_image" value="{{ $news->image }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">New Cover Image (Optional)</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old PDF File</label><br>
                                        @if($news->pdf)
                                            <a href="{{ route('news.download', $news->id) }}" target="_blank" class="btn btn-sm btn-secondary">View Current PDF</a>
                                        @else
                                            <span class="text-muted">No PDF Uploaded</span>
                                        @endif
                                        <input type="hidden" name="old_pdf" value="{{ $news->pdf }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pdf" class="form-label">New PDF File (Optional)</label>
                                        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update News</button>
                                        <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a>
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
