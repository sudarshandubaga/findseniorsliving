<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        $settings = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
        return view('web.screens.contact', compact('settings'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // For now, we'll just flash a success message. 
        // In a real scenario, you'd send an email here.
        
        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
