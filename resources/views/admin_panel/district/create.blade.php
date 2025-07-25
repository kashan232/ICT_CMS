@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Add District Office</h5>
                    </div>
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('district.store') }}" onsubmit="disableButton(this)">
                            @csrf

                          

                            <div class="mb-3">
                                <label>District Name</label>
                                <input type="text" name="district_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Headquarters</label>
                                <input type="text" name="headquarters" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Area</label>
                                <input type="text" name="area" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Population</label>
                                <input type="text" name="population" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Density</label>
                                <input type="text" name="density" class="form-control" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn" style="background-color:green;color:white;">Add District</button>
                                <a href="{{ route('district.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>

                </div>

            </div>
        </div>
    </div>

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