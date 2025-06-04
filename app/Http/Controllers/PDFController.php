<?php

namespace App\Http\Controllers;

use App\Models\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PDFController extends Controller
{

    public function Upload()
    {
        if (Auth::id()) {
            $userId = Auth::id();

            return view('admin_panel.Upload_PDFs.New_Uploads');
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'pdf_type'     => 'required|string|max:255',
            'title'        => 'required|string|max:255',
            'date'         => 'required|date',
            'cover_photo'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_file'     => 'required|mimes:pdf|max:10000',
        ]);

        // Handle cover photo upload
        $cover = $request->file('cover_photo');
        $coverName = uniqid() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('covers'), $coverName);

        // Handle PDF upload
        $pdf = $request->file('pdf_file');
        $pdfName = uniqid() . '.' . $pdf->getClientOriginalExtension();
        $pdf->move(public_path('pdfs'), $pdfName);

        // Save only filenames in the database
        PDF::create([
            'pdf_type'    => $request->pdf_type,
            'title'       => $request->title,
            'date'        => $request->date,
            'cover_photo' => $coverName,
            'pdf_file'    => $pdfName,
        ]);

        return redirect()->back()->with('success', 'PDF uploaded successfully.');
    }

    public function uploads_files()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $pdfs = PDF::all();
            return view('admin_panel.Upload_PDFs.Uploads', compact('pdfs'));
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $pdf = PDF::findOrFail($id);
        return view('admin_panel.Upload_PDFs.edit_Uploads', compact('pdf')); // You can reuse 'create' view with conditional logic
    }

    public function update(Request $request, $id)
    {
        $pdf = PDF::findOrFail($id);

        $request->validate([
            'pdf_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10000',
        ]);

        // Handle cover photo upload if new one is provided
        if ($request->hasFile('cover_photo')) {
            $oldCoverPath = public_path('covers/' . $pdf->cover_photo);
            if (File::exists($oldCoverPath)) {
                File::delete($oldCoverPath);
            }

            $coverName = Str::random(15) . '.' . $request->file('cover_photo')->getClientOriginalExtension();
            $request->file('cover_photo')->move(public_path('covers'), $coverName);
            $pdf->cover_photo = $coverName;
        }

        // Handle PDF file upload if new one is provided
        if ($request->hasFile('pdf_file')) {
            $oldPdfPath = public_path('pdfs/' . $pdf->pdf_file);
            if (File::exists($oldPdfPath)) {
                File::delete($oldPdfPath);
            }

            $pdfName = Str::random(15) . '.' . $request->file('pdf_file')->getClientOriginalExtension();
            $request->file('pdf_file')->move(public_path('pdfs'), $pdfName);
            $pdf->pdf_file = $pdfName;
        }

        // Update other fields
        $pdf->pdf_type = $request->pdf_type;
        $pdf->title = $request->title;
        $pdf->date = $request->date;

        $pdf->save();

        return redirect()->route('uploads')->with('success', 'PDF updated successfully!');
    }
}
