<?php

namespace App\Http\Controllers;

use App\Models\ProjectDocument;
use Illuminate\Http\Request;

class ProjectDocumentController extends Controller
{
    public function index() {
        $documents = ProjectDocument::all();
        return view('admin_panel.documents.index', compact('documents'));
    }

    public function create() {
        return view('admin_panel.documents.create');
    }

   public function store(Request $request) {
    $request->validate([
        'document_title' => 'required',
        'date' => 'required|date',
        'report_no' => 'required',
        'document_type' => 'required',
        'pdf_file' => 'required|mimes:pdf|max:2048',
    ]);

    $filePath = $request->file('pdf_file')->store('documents', 'public');

    ProjectDocument::create([
        'document_title' => $request->document_title,
        'date' => $request->date,
        'report_no' => $request->report_no,
        'document_type' => $request->document_type,
        'pdf_file' => $filePath,
    ]);

    return redirect()->route('documents.index');
}


    public function edit($id) {
        $document = ProjectDocument::findOrFail($id);
        return view('admin_panel.documents.edit', compact('document'));
    }

   public function update(Request $request, $id) {
    $request->validate([
        'document_title' => 'required',
        'date' => 'required|date',
        'report_no' => 'required',
        'document_type' => 'required',
        'pdf_file' => 'nullable|mimes:pdf|max:2048',
    ]);

    $document = ProjectDocument::findOrFail($id);
    $data = $request->only(['document_title', 'date', 'report_no', 'document_type']);

    if ($request->hasFile('pdf_file')) {
        $filePath = $request->file('pdf_file')->store('documents', 'public');
        $data['pdf_file'] = $filePath;
    }

    $document->update($data);
    return redirect()->route('documents.index');
}


    public function destroy($id) {
        ProjectDocument::findOrFail($id)->delete();
        return redirect()->route('documents.index');
    }
}
