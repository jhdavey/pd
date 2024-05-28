<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Modification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModificationController extends Controller
{
    public function create(Build $build) {
        return view('modifications.create', compact('build'));
    }

    public function store(Request $request, Build $build) {
        $validated = $request->validate([
            'category' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'price' => ['nullable', 'numeric'],
            'part' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    
        $modification = new Modification($validated);
        $modification->build_id = $build->id;
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('mod_images', 'public');
            $modification->image = $path;
        }
    
        $modification->save();
    
        return redirect()->route('builds.show', $build)->with('status', 'Modification added successfully!');
    }

    public function edit(Build $build, Modification $modification) {
        return view('modifications.edit', compact('build', 'modification'));
    }

    public function update(Request $request, Modification $modification)
    {
        $validated = $request->validate([
            'category' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'price' => ['nullable', 'numeric'],
            'part' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($modification->image) {
                Storage::delete($modification->image);
            }
            $path = $request->file('image')->store('mod_images', 'public');
            $validated['image'] = $path;
        }

        $modification->update($validated);

        return redirect()->route('builds.show', $modification->build_id)->with('status', 'Modification updated successfully!');
    }

    public function destroy(Build $build, Modification $modification) {
        if ($modification->image) {
            Storage::delete($modification->image);
        }

        $modification->delete();

        return redirect()->route('builds.show', $build)->with('status', 'Modification deleted successfully!');
    }
}
