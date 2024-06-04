<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Modification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ModificationImage;

class ModificationController extends Controller
{
    public function create(Build $build)
    {
        return view('modifications.create', compact('build'));
    }

    public function store(Request $request, Build $build)
    {
        $validated = $request->validate([
            'category' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'price' => ['nullable', 'numeric'],
            'part' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Create the modification
        $modification = new Modification([
            'category' => $validated['category'],
            'name' => $validated['name'],
            'brand' => $validated['brand'],
            'price' => $validated['price'],
            'part' => $validated['part'],
            'notes' => $validated['notes'],
            'build_id' => $build->id,
        ]);
        $modification->save();

        // Handle the image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('mod_images', 'public');
                ModificationImage::create([
                    'modification_id' => $modification->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('builds.show', $build)->with('status', 'Modification added successfully!');
    }

    public function edit(Build $build, Modification $modification)
    {
        return view('modifications.edit', compact('build', 'modification'));
    }

    public function update(Request $request, Build $build, Modification $modification)
    {
        // Validate non-image data
        $validated = $request->validate([
            'category' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'price' => ['nullable', 'numeric'],
            'part' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
        ]);
    
        // Update the modification with validated data
        $modification->update($validated);
    
        // Validate and handle images separately
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);
    
            // Store new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('mod_images', 'public');
                ModificationImage::create([
                    'modification_id' => $modification->id,
                    'image_path' => $path,
                ]);
            }
        }
    
        return redirect()->route('builds.show', $modification->build_id)->with('status', 'Modification updated successfully!');
    }
    


    public function destroy(Build $build, Modification $modification)
    {
        if ($modification->image) {
            Storage::delete($modification->image);
        }

        $modification->delete();

        return redirect()->route('builds.show', $build)->with('status', 'Modification deleted successfully!');
    }

    public function deleteImage($imageId)
    {
        $image = ModificationImage::findOrFail($imageId);

        // Delete the image file from storage
        Storage::delete($image->image_path);

        // Delete the image record from the database
        $image->delete();

        return back()->with('status', 'Image deleted successfully!');
    }
}
