@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card-body mt-5">
                    <div class="row mb-3">
                        <div class="col-lg-6"><h5 class="mb-0">Contact user</h5></div>
                        {{-- <div class="col-lg-6 d-flex justify-content-end">
                            <a href="{{ route('subcenter.create') }}" class="btn" style="background-color:green; color:white;">Add Subcenter</a>
                        </div> --}}
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
                                            <th class="text-center text-white"> user name</th>
                                            <th class="text-center text-white">email</th>
                                            <th class="text-center text-white">phone</th>
                                            <th class="text-center text-white">comments</th>
                                            <th class="text-center text-white">date</th>
                                            <th class="text-center text-white">Action   </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contact as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->comments }}</td>
                                                <td>{{ $item->created_at }}</td>
                                               
                                                <td>
                                                    {{-- <a href="{{ route('subcenter.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                                                    <a href="{{ route('contact.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
