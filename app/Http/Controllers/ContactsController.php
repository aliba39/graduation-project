<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
/* ------------------------------------------------------------------------------------------ */
public function index()
    {
        return view('contacts.index', ['contacts' => Contact::all()]);
    }
/* ------------------------------------------------------------------------------------------ */
public function create()
    {
        return view('contacts.create');
    }
/* ------------------------------------------------------------------------------------------ */
public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => ['required', 'string', 'max:10'],
            'message' => ['required','string'],
        ]);
        
        $contact = new contact();

        $contact->name = strip_tags($request->input('name')); 
        $contact->email = strip_tags($request->input('email')); 
        $contact->phone_number = strip_tags($request->input('phone_number')); 
        $contact->message = strip_tags($request->input('message')); 
        
        $contact -> save();

        return redirect()->route('contacts.create');

    }
/* ------------------------------------------------------------------------------------------ */
public function show($Contact)
    {
        return view('contacts.show', ['contact' => Contact::findOrFail($Contact)]);
    }
/* ------------------------------------------------------------------------------------------ */
    public function edit($Contact)
    {
        return view('contacts.edit', ['contact' => Contact::findOrFail($Contact)]);
    }
/* ------------------------------------------------------------------------------------------ */
public function update(Request $request, $Contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'phone_number' => ['required', 'integer'],
            'message' => 'required',
        ]);

        $to_update = Contact::findOrFail($Contact);

        $to_update->name = strip_tags($request->input('name')); 
        $to_update->email = strip_tags($request->input('email')); 
        $to_update->phone_number = strip_tags($request->input('phone_number')); 
        $to_update->message = strip_tags($request->input('message')); 

        $to_update->save();
        
        return redirect()->route('contacts.show', $Contact);
    }
/* ------------------------------------------------------------------------------------------ */
public function destroy($Contact)
    {
        $to_delete = Contact::findOrFail($Contact);
        $to_delete->delete();
        return redirect()->route('contacts.index');
    }
/* ------------------------------------------------------------------------------------------ */
}
