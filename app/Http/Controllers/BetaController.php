<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BetaSignup;

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
            'email' => 'required|email|max:255|unique:beta_signups,email',
        ]);
    
        // Store the beta sign-up in the database
        BetaSignup::create($request->only('name', 'email'));
        
        // Redirect back to the beta sign-up page
        return redirect()->route('beta')->with('status', 'Thank you. You will receive an email once you have been approved.');
    }
}
