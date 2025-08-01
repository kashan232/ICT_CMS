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
<div class="card-header" style="background-color:green;color:white;"><h5>Add Department</h5></div>
<div class="card-body">
<form action="{{ route('departments.store') }}" method="POST" onsubmit="disableButton(this)">@csrf
<div class="mb-3"><label>Name</label><input type="text" name="department_name" class="form-control" required></div>
<div class="mb-3"><label>Location</label><input type="text" name="location" class="form-control" required></div>
<div class="mb-3"><label>Email</label><input type="text" name="email" class="form-control" required></div>
<div class="mb-3"><label>Timing</label><input type="text" name="timing" class="form-control" required></div>
<div class="mb-3"><label>Phone No 1</label><input type="text" name="phone" class="form-control" required></div>
<div class="mb-3"><label>Phone No 2</label><input type="text" name="phoneno_two" class="form-control" required></div>
<div class="mb-3"><label>Phone No 3</label><input type="text" name="phoneno_three" class="form-control" required></div>
<button class="btn " style="background-color:green; color:white !important;">Add Department</button>
</form>
</div></div></div></div></div></div>    
@include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
<script>
    function disableButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerText = 'Please wait...'; // Optional: Change button text
    }
</script>