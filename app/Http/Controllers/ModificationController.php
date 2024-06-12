<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Modification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ModificationImage;
use App\Rules\DecimalPlaces;

class ModificationController extends Controller
{
    public function create(Build $build)
    {
        return view('modifications.create', compact('build'));
    }

    public function show($buildId)
    {
        $build = Build::with('modifications')->findOrFail($buildId);

        // Group modifications by category and sort the categories alphabetically
        $modificationsByCategory = $build->modifications->groupBy('category')->sortKeys();

        $modificationsByCategory = $modificationsByCategory->sortKeys();

        $modificationsByCategory = $modificationsByCategory->sortKeys();

        return view('builds.show', compact('build', 'modificationsByCategory'));
    }

    public function store(Request $request, Build $build)
    {
        $validated = $request->validate([
            'category' => ['required'],
            'name' => ['required', 'string', 'max:100'],
            'brand' => ['required', 'string', 'max:100'],
            'price' => ['nullable', 'numeric', new DecimalPlaces(2)], 
            'part' => ['nullable', 'string', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'string', 'max:1000'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('images')) {
            if (count($request->file('images')) > 6) {
                return redirect()->back()->withErrors(['images' => 'You can only upload up to 6 images per modification.'])->withInput();
            }
        }

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
            'name' => ['required', 'string', 'max:100'],
            'brand' => ['required', 'string', 'max:100'],
            'price' => ['nullable', 'numeric', new DecimalPlaces(2)], 
            'part' => ['nullable', 'string', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'string', 'max:1000'],
        ]);

        // Validate image uploads
        if ($request->hasFile('images')) {
            $existingImageCount = $modification->images()->count();
            $newImageCount = count($request->file('images'));

            if ($existingImageCount + $newImageCount > 6) {
                return redirect()->back()->withErrors(['images' => 'You can only upload a total of 6 images per modification.'])->withInput();
            }

            $request->validate([
                'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            ]);
        }

        // Update the modification with validated data
        $modification->update($validated);

        // Handle image uploads
        if ($request->hasFile('images')) {
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
