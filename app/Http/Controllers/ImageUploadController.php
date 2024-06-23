<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('file');
        $path = $image->store('note_images');

        return response()->json(['location' => asset('storage/note_images' . $path)]);
    }
}
