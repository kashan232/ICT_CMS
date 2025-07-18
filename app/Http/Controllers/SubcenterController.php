<?php
namespace App\Http\Controllers;

use App\Models\Subcenter;
use Illuminate\Http\Request;

class SubcenterController extends Controller
{
    public function index() {
        $subcenters = Subcenter::all();
        return view('admin_panel.subcenter.index', compact('subcenters'));
    }

    public function create() {
        return view('admin_panel.subcenter.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('subcenter', 'public');
        }

        Subcenter::create($data);

        return redirect()->route('subcenter.index')->with('success', 'Subcenter Added Successfully');
    }

    public function edit($id) {
        $subcenter = Subcenter::findOrFail($id);
        return view('admin_panel.subcenter.edit', compact('subcenter'));
    }

    public function update(Request $request, $id) {
        $subcenter = Subcenter::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            if($subcenter->image){
                \Storage::delete('public/'.$subcenter->image);
            }
            $data['image'] = $request->file('image')->store('subcenter', 'public');
        }

        $subcenter->update($data);

        return redirect()->route('subcenter.index')->with('success', 'Subcenter Updated Successfully');
    }

    public function delete($id) {
        $subcenter = Subcenter::findOrFail($id);
        if($subcenter->image){
            \Storage::delete('public/'.$subcenter->image);
        }
        $subcenter->delete();
        return redirect()->route('subcenter.index')->with('success', 'Deleted Successfully');
    }
}
