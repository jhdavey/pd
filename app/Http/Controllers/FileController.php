<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function store(Request $request, Build $build)
    {
        $request->validate([
            'file' => 'required|file|max:51200',
        ]);

        $file = $request->file('file');
        $path = $file->store('files', 'public');

        $build->files()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function download(File $file)
    {
        return Storage::disk('public')->download($file->path, $file->name);
    }

    public function destroy(File $file)
    {
        Storage::disk('public')->delete($file->path);
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
}
