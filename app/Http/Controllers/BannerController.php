<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin_panel.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin_panel.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('banners.index')->with('success', 'Banner Added Successfully');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin_panel.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $banner->title = $request->title;
        $banner->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image = $imagePath;
        }

        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner Updated Successfully');
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner Deleted Successfully');
    }
}
