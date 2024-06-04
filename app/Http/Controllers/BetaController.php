<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BetaController extends Controller
{

    public function create()
    {
        return view('beta');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Handle the form submission (e.g., save to the database, send email, etc.)
        // For demonstration purposes, we'll just flash a message to the session
        // and redirect back to the beta sign-up page.

        // Example: Store the beta sign-up in the database (create a BetaSignup model)
        // \App\Models\BetaSignup::create($request->all());

        // Flash a success message to the session
        session()->flash('success', 'Thank you for signing up for beta access!');

        // Redirect back to the beta sign-up page
        return redirect()->route('beta');
    }
}
