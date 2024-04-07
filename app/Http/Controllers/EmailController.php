<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalEmail;
use App\Mail\RejectionEmail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $type = $request->input('type');
        $recipient = 'aliba6732@gmail.com'; // Change this to your recipient's email address

        if ($type === 'approval') {
            Mail::to($recipient)->send(new ApprovalEmail());
        } elseif ($type === 'rejection') {
            Mail::to($recipient)->send(new RejectionEmail());
        }

        return response()->json(['message' => 'Email sent successfully']);
    }
}
