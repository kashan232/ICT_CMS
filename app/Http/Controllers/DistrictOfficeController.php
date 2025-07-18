<?php

namespace App\Http\Controllers;
use App\Models\DistrictOffice;
use Illuminate\Http\Request;

class DistrictOfficeController extends Controller
{
    public function index() {
        $districts = DistrictOffice::all();
        return view('admin_panel.district.index', compact('districts'));
    }

    public function create() {
        return view('admin_panel.district.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'district_name' => 'required|string',
            'headquarters' => 'required|string',
            'area' => 'required|string',
            'population' => 'required|string',
            'density' => 'required|string',
        ]);

        DistrictOffice::create($validated);
        return redirect()->route('district.index')->with('success', 'Added Successfully');
    }

    public function edit($id) {
        $data = DistrictOffice::findOrFail($id);
        return view('admin_panel.district.edit', compact('data'));
    }

  public function update(Request $request){
    $id = $request->edit_id;

    $district = DistrictOffice::findOrFail($id);

    $validated = $request->validate([
        'district_name' => 'required|string',
        'headquarters' => 'required|string',
        'area' => 'required|string',
        'population' => 'required|string',
        'density' => 'required|string',
    ]);

    $district->update($validated);

    return redirect()->route('district.index')->with('success', 'Updated Successfully');
}

    public function destroy($id) {
        $district = DistrictOffice::findOrFail($id);
        $district->delete();
        return redirect()->route('district.index')->with('success', 'Deleted Successfully');
    }
}
