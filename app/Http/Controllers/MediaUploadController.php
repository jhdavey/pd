<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,mov,avi,wmv,mp3,wav|max:51200',
        ]);

        $folder = str_starts_with($request->file('file')->getMimeType(), 'image/') ? 'notes' : 'notes/media';

        $path = $request->file('file')->store($folder, 'public');

        $url = Storage::url($path);

        return response()->json(['location' => $url]);
    }
}