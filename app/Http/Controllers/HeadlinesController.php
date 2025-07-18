<?php

namespace App\Http\Controllers;

use App\Models\Headlines;
use Illuminate\Http\Request;

class HeadlinesController extends Controller
{
     public function index() {
        $headline = Headlines::all();
        return view('admin_panel.headlines.index', compact('headline'));
    }

    public function create() {
        return view('admin_panel.headlines.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('Headlines', 'public');
        }

        Headlines::create($data);

        return redirect()->route('headline.index')->with('success', 'Headlines Added Successfully');
    }

    public function edit($id) {
        $Headline = Headlines::findOrFail($id);
        return view('admin_panel.headlines.edit', compact('Headline'));
    }

    public function update(Request $request, $id) {
        $Headlines = Headlines::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            if($Headlines->image){
                \Storage::delete('public/'.$Headlines->image);
            }
            $data['image'] = $request->file('image')->store('Headlines', 'public');
        }

        $Headlines->update($data);

        return redirect()->route('headline.index')->with('success', 'Headlines Updated Successfully');
    }

    public function delete($id) {
        $Headlines = Headlines::findOrFail($id);
        if($Headlines->image){
            \Storage::delete('public/'.$Headlines->image);
        }
        $Headlines->delete();
        return redirect()->route('headline.index')->with('success', 'Deleted Successfully');
    }
}
