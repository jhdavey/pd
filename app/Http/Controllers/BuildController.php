<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Tag;
use App\Models\Modification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class BuildController extends Controller
{
    public function index() {

        $builds = Build::latest()
        ->with('tags')
        ->get()
        ->groupBy('featured');

        return view('builds/index', [
            'builds' => $builds[0],
            'featuredBuilds' => $builds[1],
            'tags' => Tag::all()
        ]);
    }

    public function filtered(Request $request)
    {
        // Start with a base query
        $query = Build::query();

        // Apply filters based on the request input
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('make')) {
            $query->where('make', 'like', '%' . $request->make . '%');
        }

        if ($request->filled('model')) {
            $query->where('model', 'like', '%' . $request->model . '%');
        }

        // Get the filtered builds
        $builds = $query->get();

        // Return the view with the builds
        return view('builds.filtered', compact('builds'));
    }

    public function create() {
        return view('builds.create');
    }

    public function show($buildId) {
        $build = Build::with('modifications')->findOrFail($buildId);

        $modificationsByCategory = $build->modifications->groupBy('category');

        return view('builds.show', compact('build', 'modificationsByCategory'));
    }

    public function store(Request $request) {
        $imagePath = null;

        $attributes = request()->validate([
            'year' => ['required'],
            'make' => ['required'],
            'model' => ['required'],
            'trim' => ['nullable'],
            'hp' => ['nullable'],
            'whp' => ['nullable'],
            'torque' => ['nullable'],
            'weight' => ['nullable'],
            'vehicleLayout' => ['nullable'],
            'fuel' => ['nullable'],
            'zeroSixty' => ['nullable'],
            'zeroOneHundred' => ['nullable'],
            'quarterMile' => ['nullable'],
            'engineType' => ['nullable'],
            'engineCode' => ['nullable'],
            'forcedInduction' => ['nullable'],
            'trans' => ['nullable'],
            'suspension' => ['nullable'],
            'brakes' => ['nullable'],
            'image' => ['required', File::types(['png', 'jpg', 'webp'])],
            'tags' => ['nullable']
        ]);

        $attributes['featured'] = $request->has('featured');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/builds');
            $attributes['image'] = str_replace('public/', '', $imagePath);
        };
    
        $build = Build::create([
            'user_id' => Auth::id(),
            'year' => request('year'),
            'make' => request('make'),
            'model' => request('model'),
            'trim' => request('trim'),
            'hp' => request('hp'),
            'whp' => request('whp'),
            'torque' => request('torque'),
            'weight' => request('weight'),
            'vehicleLayout' => request('vehicleLayout'),
            'fuel' => request('fuel'),
            'zeroSixty' => request('zeroSixty'),
            'zeroOneHundred' => request('zeroOneHundred'),
            'quarterMile' => request('quarterMile'),
            'engineType' => request('engineType'),
            'engineCode' => request('engineCode'),
            'forcedInduction' => request('forcedInduction'),
            'trans' => request('trans'),
            'suspension' => request('suspension'),
            'brakes' => request('brakes'),
            'image' => $imagePath
        ]);

        if (!empty($attributes['tags'])) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $build->tag(trim(strtolower($tag)));
            }
        }
        return redirect('/garage');
    }

    public function edit(Build $build) {
        
        return view('builds/edit', ['build' => $build]);
    }

    public function update(Request $request, Build $build)
    {
        $validated = $request->validate([
            'year' => ['required'],
            'make' => ['required'],
            'model' => ['required'],
            'trim' => ['nullable'],
            'hp' => ['nullable'],
            'whp' => ['nullable'],
            'torque' => ['nullable'],
            'weight' => ['nullable'],
            'vehicleLayout' => ['nullable'],
            'fuel' => ['nullable'],
            'zeroSixty' => ['nullable'],
            'zeroOneHundred' => ['nullable'],
            'quarterMile' => ['nullable'],
            'engineType' => ['nullable'],
            'engineCode' => ['nullable'],
            'forcedInduction' => ['nullable'],
            'trans' => ['nullable'],
            'suspension' => ['nullable'],
            'brakes' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'modifications' => ['nullable', 'array'],
            'additional_images' => ['nullable', 'array'],
            'additional_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Handle the main image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($build->image) {
                Storage::delete($build->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('public/builds');
            $validated['image'] = $imagePath;
        }

        // Update the build details
        $build->update($validated);

        // Handle additional images
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $path = $file->store('builds', 'public');
                $build->images()->create(['path' => $path]);
            }
        }

        // Clear existing modifications
        $build->modifications()->delete();

        // Create new modifications
        if ($request->has('modifications')) {
            foreach ($request->input('modifications') as $modificationData) {
                if ($modificationData !== null && is_array($modificationData)) {
                    $build->modifications()->create($modificationData);
                }
            }
        }

        return redirect()->route('builds.show', $build)->with('status', 'Build updated successfully!');
    }

    public function destroy(Build $build) {
 
        $build->delete();

        return redirect('/garage');
    }
    
    public function garage() {
        $userId = Auth::id();
        $builds = Build::where('user_id', $userId)->get();
        $name = Auth::user()->name;
            return view('/garage', ['builds' => $builds, 'name' => $name]);
    }
}
