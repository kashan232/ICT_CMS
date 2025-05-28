<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
