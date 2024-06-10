<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class BuildController extends Controller
{
    public function index()
    {
        // Fetch builds and group by 'featured' status
        $builds = Build::latest()
            ->with('tags')
            ->get()
            ->groupBy('featured');

        // Initialize an empty collection for following builds
        $followingBuilds = collect();

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Get the IDs of users the current user is following
            $followingIds = $user->follows->pluck('id');

            // Fetch the builds created by the followed users
            $followingBuilds = Build::whereIn('user_id', $followingIds)->latest()->get();
        }

        // Fetch unique build categories
        $categories = Build::select('build_category')->distinct()->get();

        return view('builds.index', [
            'builds' => $builds[0] ?? collect(),  // Handle the case where there are no non-featured builds
            'featuredBuilds' => $builds[1] ?? collect(),  // Handle the case where there are no featured builds
            'tags' => Tag::all(),
            'categories' => $categories,
            'followingBuilds' => $followingBuilds
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
            'year' => ['required', 'string', 'max:4'],
            'make' => ['required', 'string', 'max:100'],
            'model' => ['required', 'string', 'max:100'],
            'trim' => ['nullable', 'string', 'max:100'],
            'build_category' => ['required'],
            'hp' => ['nullable', 'string', 'max:10'],
            'whp' => ['nullable', 'string', 'max:10'],
            'torque' => ['nullable', 'string', 'max:10'],
            'weight' => ['nullable', 'string', 'max:10'],
            'vehicleLayout' => ['nullable', 'string', 'max:100'],
            'fuel' => ['nullable', 'string', 'max:100'],
            'zeroSixty' => ['nullable', 'string', 'max:10'],
            'zeroOneHundred' => ['nullable', 'string', 'max:10'],
            'quarterMile' => ['nullable', 'string', 'max:10'],
            'engineType' => ['nullable', 'string', 'max:10'],
            'engineCode' => ['nullable', 'string', 'max:10'],
            'forcedInduction' => ['nullable', 'string', 'max:100'],
            'trans' => ['nullable', 'string', 'max:100'],
            'suspension' => ['nullable', 'string', 'max:100'],
            'brakes' => ['nullable', 'string', 'max:100'],
            'image' => ['required', File::types(['png', 'jpg', 'webp'])],
            'tags' => ['nullable', 'string', 'max:50']
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
            'build_category' => request('build_category'),
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
        return redirect()->route('builds.show', $build)->with('status', 'Build updated successfully!');
    }

    public function edit(Build $build) {
        $tags = Tag::all();
        
        return view('builds.edit', compact('build', 'tags'));
    }

    public function update(Request $request, Build $build)
    {
        $validated = $request->validate([
            'year' => ['required', 'string', 'max:4'],
            'make' => ['required', 'string', 'max:100'],
            'model' => ['required', 'string', 'max:100'],
            'trim' => ['nullable', 'string', 'max:100'],
            'build_category' => ['required'],
            'hp' => ['nullable', 'string', 'max:10'],
            'whp' => ['nullable', 'string', 'max:10'],
            'torque' => ['nullable', 'string', 'max:10'],
            'weight' => ['nullable', 'string', 'max:100'],
            'vehicleLayout' => ['nullable', 'string', 'max:100'],
            'fuel' => ['nullable', 'string', 'max:100'],
            'zeroSixty' => ['nullable', 'string', 'max:10'],
            'zeroOneHundred' => ['nullable', 'string', 'max:10'],
            'quarterMile' => ['nullable', 'string', 'max:10'],
            'engineType' => ['nullable', 'string', 'max:10'],
            'engineCode' => ['nullable', 'string', 'max:100'],
            'forcedInduction' => ['nullable', 'string', 'max:100'],
            'trans' => ['nullable', 'string', 'max:100'],
            'suspension' => ['nullable', 'string', 'max:100'],
            'brakes' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'modifications' => ['nullable', 'array'],
            'additional_images' => ['nullable', 'array'],
            'additional_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
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

        // Handle tags
        if ($request->has('tags')) {
            $tagNames = explode(',', $request->input('tags'));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if ($tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
            }
            $build->tags()->sync($tagIds);
        }

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

    public function destroy(Build $build)
    {
        if ($build->image) {
            Storage::delete($build->image);
        }

        foreach ($build->images as $image) {
            Storage::delete($image->path);
            $image->delete();
        }

        $build->delete();

        return redirect()->route('garage.show', ['user' => $build->user_id])->with('status', 'Build deleted successfully!');
    }
    
    public function garage() {
        $userId = Auth::id();
        $builds = Build::where('user_id', $userId)->get();
        $name = Auth::user()->name;
            return view('/garage', ['builds' => $builds, 'name' => $name]);
    }
}
