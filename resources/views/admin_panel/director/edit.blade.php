@include('admin_panel.includes.header')
<div class="wrapper">
    @include('admin_panel.includes.navbar')
    @include('admin_panel.includes.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="card shadow-sm mt-4">
                    <div class="card-header text-white" style="background-color:green;">
                        <h5>Edit Director General</h5>
                    </div>
                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

<form method="POST" action="{{ route('director-general.update') }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="edit_id" value="{{ $director->id }}">
    <div class="mb-3">
        <label>DG Name</label>
        <input type="text" name="Name" class="form-control" value="{{ $director->name }}" required>
    </div>

    <div class="mb-3">
        <label>DG Extension</label>
        <textarea name="dg-extension" class="form-control" rows="4" required>{{ $director->dg_extension }}</textarea>
    </div>

    <div class="mb-3">
        <label>Get to know us</label>
        <textarea name="know-us" class="form-control" rows="4" required>{{ $director->know_us }}</textarea>
    </div>

    @php
        $types = json_decode($director->types, true);
    @endphp

    <div id="heading-description-group">
        @foreach($types as $index => $type)
        <div class="mb-3 border p-3 rounded heading-description-item">
            <h5>Heading & Description Type {{ $index + 1 }}</h5>
            <div class="mb-3">
                <label>Heading</label>
                <textarea name="types[{{ $index }}][heading]" class="form-control" rows="2" required>{{ $type['heading'] ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="types[{{ $index }}][description]" class="form-control" rows="4" required>{{ $type['description'] ?? '' }}</textarea>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mb-3">
        <label>Main Image (Round)</label><br>
        @if($director->main_image)
            <img src="{{  env('APP_URL') . 'storage/'.$director->main_image}}" width="100" class="mb-2">
        @endif
        <input type="file" name="main_image" class="form-control" accept="image/*">
    </div>

    <div class="text-end">
        <button type="submit" class="btn" style="background-color:green;color:white;">Update</button>
        <a href="{{ url('/director-general') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

                </div>

            </div>
        </div>
    </div>

    @include('admin_panel.includes.footer')
</div>
@include('admin_panel.includes.footer_links')
