@include('admin_panel.includes.header')
<div class="wrapper">
@include('admin_panel.includes.navbar')
@include('admin_panel.includes.sidebar')
<div class="content-page">
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 mt-4">
<div class="card shadow-sm">
<div class="card-header" style="background-color:green;color:white;"><h5>Edit Department</h5></div>
<div class="card-body">
<form action="{{ route('departments.update', $department->id) }}" method="POST">@csrf
<div class="mb-3"><label>Name</label><input type="text" name="department_name" class="form-control" value="{{ $department->department_name }}" required></div>
<div class="mb-3"><label>email</label><input type="text" name="email" class="form-control" value="{{ $department->email }}" required></div>
<div class="mb-3"><label>Location</label><input type="text" name="location" class="form-control" value="{{ $department->location }}" required></div>
<div class="mb-3"><label>Timing</label><input type="text" name="timing" class="form-control" value="{{ $department->timing }}" required></div>
<div class="mb-3"><label>Phone No 1</label><input type="text" name="phone" class="form-control" value="{{ $department->phone }}" required></div>
<div class="mb-3"><label>Phone No 2</label><input type="text" name="phoneno_two" class="form-control" value="{{ $department->phoneno_two }}" ></div>
<div class="mb-3"><label>Phone No 3</label><input type="text" name="phoneno_three" class="form-control" value="{{ $department->phoneno_three }}" ></div>
<button class="btn " style="background-color:green; color:white !important;">Update Department</button>
<a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</div></div></div></div></div></div>
@include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
