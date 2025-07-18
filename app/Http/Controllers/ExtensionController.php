<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
  public function index() {
    $data = Extension::all();
    return view('admin_panel.extension.index', compact('data'));
}

public function create() {
    return view('admin_panel.extension.create');
}

public function store(Request $request) {
    $data = new Extension;
    $data->title = $request->title;
    $data->description = $request->description;
    $data->point_one = $request->point_one;
    $data->point_two = $request->point_two;
    $data->point_three = $request->point_three;

    if($request->hasFile('main_image')){
        $mainImage = $request->file('main_image')->store('extension', 'public');
        $data->main_image = $mainImage;
    }
    if($request->hasFile('small_image')){
        $smallImage = $request->file('small_image')->store('extension', 'public');
        $data->small_image = $smallImage;
    }

    $data->save();
    return redirect('/extension');
}

public function edit($id) {
    $data = Extension::find($id);
    return view('admin_panel.extension.edit', compact('data'));
}

public function update(Request $request, $id) {
    $data = Extension::find($id);
    $data->title = $request->title;
    $data->description = $request->description;
    $data->point_one = $request->point_one;
    $data->point_two = $request->point_two;
    $data->point_three = $request->point_three;

    if($request->hasFile('main_image')){
        $mainImage = $request->file('main_image')->store('extension', 'public');
        $data->main_image = $mainImage;
    }
    if($request->hasFile('small_image')){
        $smallImage = $request->file('small_image')->store('extension', 'public');
        $data->small_image = $smallImage;
    }

    $data->update();
    return redirect('/extension');
}

public function delete($id){
    $data = Extension::find($id);
    $data->delete();
    return redirect('/extension');
}

}
