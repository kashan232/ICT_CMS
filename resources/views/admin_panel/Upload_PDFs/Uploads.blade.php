@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
       <div class="row">
                
                    <div class="col-md-12 mt-5">
                         
                            
                            <div class="card-body">
  
                            <div class="row ">
     <div class="col-lg-6       ">
 <h5 class="mb-0">PDF Uplaod</h5>
                                    </div>
                                    <div class="col-lg-6       ">
    <div class="card-header text-white d-flex justify-content-end">
    <a href="{{ route('new.uploads') }}" class="btn " style="background-color:green !important;color:white   !important">
        Add PDF
    </a>
</div>
                                    </div>
                            </div>  
                        <div class="card shadow-sm border-0 rounded-3 mt-2  ">
                          
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('success') }}.
                                </div>
                                @endif
                                 <table id="userTable" class="table">
                                    <thead  style="background-color:green !important;color:white   !important">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">PDF Type</th>
                                        <th class="text-white">Title</th>
                                        <th class="text-white">Date</th>
                                        <th class="text-white">Cover</th>
                                        <th class="text-white">PDF File</th>
                                        <th class="text-white">Action</th> <!-- New column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pdfs as $index => $pdf)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pdf->pdf_type }}</td>
                                        <td>{{ $pdf->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pdf->date)->format('d M Y') }}</td>
                                        <td>
                                            <img src="{{ env('APP_URL') . 'public/covers/' . $pdf->cover_photo }}" width="60" alt="Cover">
                                        </td>
                                        <td>
                                            <a href="{{ env('APP_URL') . 'public/pdfs/' . $pdf->pdf_file }}" target="_blank" class="btn btn-sm btn-primary">
                                                View PDF
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('pdfs.edit', $pdf->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('pdfs.destroy', $pdf->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger delete-btn">Delete</button>
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
</div>
@include('admin_panel.includes.footer_links')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.delete-btn', function (e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This PDF will be permanently deleted.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>