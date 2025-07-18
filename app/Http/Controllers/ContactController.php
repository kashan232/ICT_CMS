<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
     public function index() {
        $contact = Contact::all();
        return view('admin_panel.contact.index', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request){
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'comments' => 'required|string',
    ]);

    // Save to database
    Contact::create($validated);

    return response()->json(['status' => 'success', 'message' => 'Submitted Successfully']);
}


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy($id)
    {
        $director = Contact::findOrFail($id);
        $director->delete();
        return redirect('/contact')->with('success', 'Deleted Successfully');
    }

}
