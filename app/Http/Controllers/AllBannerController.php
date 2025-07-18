<?php

namespace App\Http\Controllers;

use App\Models\AllBanner;
use Illuminate\Http\Request;

class AllBannerController extends Controller
{public function index(){
    $banners = AllBanner::all();
    return view('admin_panel.allbanner.index', compact('banners'));
}

public function create(){
    return view('admin_panel.allbanner.create');
}

 public function store(Request $request) {
    $data = $request->validate([
        'heading' => 'required|string|max:255',
        'type' => 'nullable',
        'image' => 'nullable|image',
    ]);

    if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('banners', 'public');
    }

    AllBanner::create($data);

    return redirect()->route('allbanner.index')->with('success', 'Banner Added Successfully');
}

 

public function edit($id){
    $banner = AllBanner::findOrFail($id);
    return view('admin_panel.allbanner.edit', compact('banner'));
}

  public function update(Request $request, $id) {
    $banner = AllBanner::findOrFail($id);

    $data = $request->validate([
        'heading' => 'required|string|max:255',
        // 'type' => 'required|string|max:255',
        'image' => 'nullable|image',
    ]);

    if($request->hasFile('image')){
        // Old image delete karna chaaho toh:
        if($banner->image && \Storage::disk('public')->exists($banner->image)){
            \Storage::disk('public')->delete($banner->image);
        }
        $data['image'] = $request->file('image')->store('banners', 'public');
    }

    $banner->update($data);

    return redirect()->route('allbanner.index')->with('success', 'Banner Updated Successfully');
}

public function destroy($id){
    $banner = AllBanner::findOrFail($id);
    if(file_exists(public_path('uploads/banners/'.$banner->image))){
        unlink(public_path('uploads/banners/'.$banner->image));
    }
    $banner->delete();
    return back()->with('success', 'Banner Deleted');
}

}
