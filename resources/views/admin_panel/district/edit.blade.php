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
                                <h5 class="mb-0">Edit District Office</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('district.update') }}" method="POST">
                                    @csrf
                                        <input type="text" name="edit_id" class="form-control" value="{{ $data->id }}" required>
                                    
                                    <div class="mb-3">
                                        <label for="district_name" class="form-label">District Name</label>
                                        <input type="text" name="district_name" class="form-control" value="{{ $data->district_name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="headquarters" class="form-label">Headquarters</label>
                                        <input type="text" name="headquarters" class="form-control" value="{{ $data->headquarters }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area</label>
                                        <input type="text" name="area" class="form-control" value="{{ $data->area }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="population" class="form-label">Population</label>
                                        <input type="text" name="population" class="form-control" value="{{ $data->population }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="density" class="form-label">Density</label>
                                        <input type="text" name="density" class="form-control" value="{{ $data->density }}" required>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn" style="background-color:green !important; color:white !important">Update</button>
                                        <a href="{{ url('/district') }}" class="btn btn-secondary">Cancel</a>
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
