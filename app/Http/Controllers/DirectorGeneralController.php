<?php

namespace App\Http\Controllers;

use App\Models\DirectorGeneral;
use Illuminate\Http\Request;

class DirectorGeneralController extends Controller
{
    public function index()
{
    $data = DirectorGeneral::all();
    return view('admin_panel.director.index', compact('data'));
}

public function create()
{
    return view('admin_panel.director.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'Name' => 'required',
        'dg-extension' => 'required',
        'know-us' => 'required',
        'types' => 'required|array',
        'main_image' => 'nullable|image',
    ]);

    $filename = null;
    if ($request->hasFile('main_image')) {
        $filename = $request->file('main_image')->store('director', 'public');
    }

    $director = new DirectorGeneral();
    $director->name = $validated['Name'];
    $director->dg_extension = $validated['dg-extension'];
    $director->know_us = $validated['know-us'];
    $director->types = json_encode($validated['types']);
    $director->main_image = $filename;
    $director->save();

    return redirect('/director-general')->with('success', 'Director General added!');
}


public function edit($id)
{
    $director = DirectorGeneral::findOrFail($id);
    return view('admin_panel.director.edit', compact('director'));
}

public function update(Request $request)
{
    $data = $request->validate([
        'edit_id' => 'required|exists:director_generals,id',
        'Name' => 'required',
        'dg-extension' => 'required',
        'know-us' => 'required',
        'types' => 'required|array',
        'main_image' => 'nullable|image',
    ]);

    $director = DirectorGeneral::findOrFail($data['edit_id']);

    // Image upload
    if ($request->hasFile('main_image')) {
        $filename = $request->file('main_image')->store('director', 'public');
        $director->main_image = $filename;
    }

    // Update other fields
    $director->name = $data['Name'];
    $director->dg_extension = $data['dg-extension'];
    $director->know_us = $data['know-us'];
    $director->types = json_encode($data['types']);

    $director->save();

    return redirect('/director-general')->with('success', 'Director General updated successfully!');
}



public function destroy($id)
{
    $director = DirectorGeneral::findOrFail($id);
    $director->delete();
    return redirect('/director-general')->with('success', 'Deleted Successfully');
}

}
