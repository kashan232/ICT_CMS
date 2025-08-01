<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::all();
        return view('admin_panel.videos.index', compact('videos'));
    }

    public function create() {
        return view('admin_panel.videos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'youtube_link' => 'required',
            'description' => 'required',
        ]);

        Video::create($request->all());

        return redirect()->route('videos.index')->with('success', 'Video Added Successfully');
    }

    public function edit($id) {
        $video = Video::findOrFail($id);
        return view('admin_panel.videos.edit', compact('video'));
    }

    public function update(Request $request, $id) {
        $video = Video::findOrFail($id);
        $video->update($request->all());

        return redirect()->route('videos.index')->with('success', 'Video Updated Successfully');
    }

    public function delete($id) {
        Video::findOrFail($id)->delete();
        return redirect()->route('videos.index')->with('success', 'Video Deleted Successfully');
    }
}
