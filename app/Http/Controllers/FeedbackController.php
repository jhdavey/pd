<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'feedback' => 'required|string|max:1000'
        ]);

        // Store the feedback in the database
        Feedback::create(['feedback' => $request->input('feedback')]);

        // Redirect back to the feedback page with a success message
        return redirect()->route('feedback')->with('status', 'Thank you. Your feedback is very important to us!');
    }
}
