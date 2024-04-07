<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactController extends Controller
{

    function contact() {
        return view('contact');
    }
    public function send(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send an email to the site owner
        Mail::to('ezela809@example.com')->send(new ContactFormSubmitted($validatedData));

        // Redirect back with success message
        return back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
    }
}
