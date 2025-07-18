@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card-body mt-5">
                    <div class="row mb-3">
                        <div class="col-lg-6"><h5 class="mb-0">Document Upload</h5></div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <a href="{{ route('documents.create') }}" class="btn" style="background-color:green; color:white;">Add Document</a>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table text-center" id="userTable">
                                    <thead style="background-color:green; color:white;">
                                        <tr>
                                            <th class="text-center text-white">#</th>
                                            <th class="text-center text-white">Document Title</th>
                                            <th class="text-center text-white">Date</th>
                                            <th class="text-center text-white">Report No.</th>
                                            <th class="text-center text-white">Document Type</th>
                                            <th class="text-center text-white">PDF</th>
                                            <th class="text-center text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->document_title }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->report_no }}</td>
                                                <td>{{ $item->document_type }}</td>
                                                <td>
                                                    @if($item->pdf_file)
                                                        <a href="{{ asset('storage/' . $item->pdf_file) }}" target="_blank" class="btn btn-sm btn-primary">View PDF</a>
                                                    @else
                                                        <span class="text-muted">No PDF</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('documents.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('documents.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
