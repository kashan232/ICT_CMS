<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        $galleries = Gallery::all();
        return view('admin_panel.gallery.index', compact('galleries'));
    }

    public function create() {
        return view('admin_panel.gallery.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'employee_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create($data);

        return redirect()->route('gallery.index')->with('success', 'Gallery Item Added Successfully');
    }

    public function edit($id) {
        $gallery = Gallery::findOrFail($id);
        return view('admin_panel.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id) {
        $gallery = Gallery::findOrFail($id);

        $data = $request->validate([
            'employee_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('image')) {
            if($gallery->image){
                \Storage::delete('public/' . $gallery->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'Gallery Item Updated Successfully');
    }

    public function delete($id) {
        $gallery = Gallery::findOrFail($id);
        if($gallery->image){
            \Storage::delete('public/' . $gallery->image);
        }
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Deleted Successfully');
    }
}
