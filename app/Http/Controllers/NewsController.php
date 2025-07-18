<?php
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin_panel.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin_panel.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'pdf' => 'nullable|mimes:pdf',
        ]);

        $data = $request->only('title', 'date', 'details');

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        if($request->hasFile('pdf')){
            $data['pdf'] = $request->file('pdf')->store('news_pdfs', 'public');
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News added successfully.');
    }

    public function edit(News $news)
    {
        return view('admin_panel.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'pdf' => 'nullable|mimes:pdf',
        ]);

        $data = $request->only('title', 'date', 'details');

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        if($request->hasFile('pdf')){
            $data['pdf'] = $request->file('pdf')->store('news_pdfs', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted.');
    }

    public function downloadPdf(News $news)
    {
        if($news->pdf){
            return response()->download(storage_path("app/public/" . $news->pdf));
        }
        return back()->with('error', 'PDF not found.');
    }
}
