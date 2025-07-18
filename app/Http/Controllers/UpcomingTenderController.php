<?php

namespace App\Http\Controllers;

use App\Models\UpcomingTender;
use Illuminate\Http\Request;

class UpcomingTenderController extends Controller
{public function index() {
    $tenders = UpcomingTender::all();
    return view('admin_panel.upcomingtenders.index', compact('tenders'));
}

public function create() {
    return view('admin_panel.upcomingtenders.create');
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'pdf_file' => 'required|mimes:pdf|max:2048',
        'date' => 'required|date',
    ]);

    $filePath = $request->file('pdf_file')->store('tenders', 'public');

    UpcomingTender::create([
        'title' => $request->title,
        'description' => $request->description,
        'pdf_file' => $filePath,
        'date' => $request->date,
    ]);

    return redirect()->route('upcomingtenders.index')->with('success', 'Tender added successfully.');
}

public function edit($id) {
    $tender = UpcomingTender::findOrFail($id);
    return view('admin_panel.upcomingtenders.edit', compact('tender'));
}

public function update(Request $request, $id) {
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'pdf_file' => 'nullable|mimes:pdf|max:2048',
    ]);

    $tender = UpcomingTender::findOrFail($id);
    $data = $request->only(['title', 'description', 'date']);

    if ($request->hasFile('pdf_file')) {
        $data['pdf_file'] = $request->file('pdf_file')->store('tenders', 'public');
    }

    $tender->update($data);

    return redirect()->route('upcomingtenders.index')->with('success', 'Tender updated successfully.');
}

public function destroy($id) {
    UpcomingTender::findOrFail($id)->delete();
    return redirect()->route('upcomingtenders.index')->with('success', 'Tender deleted successfully.');
}

}
