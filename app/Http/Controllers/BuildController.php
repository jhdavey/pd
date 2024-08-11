<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\BuildImage;
use App\Models\Tag;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BuildController extends Controller
{
    public function index()
    {
        // Fetch builds and group by 'featured' status
        $builds = Build::orderBy('updated_at', 'desc')
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

        // Apply filters only if the corresponding input is filled
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

    public function create()
    {
        return view('builds.create');
    }

    public function show($buildId)
    {
        $build = Build::with('modifications', 'files')->findOrFail($buildId);

        $modificationsByCategory = $build->modifications->groupBy('category')->sortKeys();

        return view('builds.show', compact('build', 'modificationsByCategory'));
    }

    public function store(Request $request)
    {
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
            'engineType' => ['nullable', 'string', 'max:100'],
            'engineCode' => ['nullable', 'string', 'max:10'],
            'forcedInduction' => ['nullable', 'string', 'max:100'],
            'trans' => ['nullable', 'string', 'max:100'],
            'suspension' => ['nullable', 'string', 'max:100'],
            'brakes' => ['nullable', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp'],
            'tags' => ['nullable', 'string', 'max:50']
        ]);

        $attributes['featured'] = $request->has('featured');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('builds', 'public');
            $attributes['image'] = Storage::url($imagePath);
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

    public function edit(Build $build)
    {
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
            'weight' => ['nullable', 'string', 'max:10'],
            'vehicleLayout' => ['nullable', 'string', 'max:100'],
            'fuel' => ['nullable', 'string', 'max:100'],
            'zeroSixty' => ['nullable', 'string', 'max:10'],
            'zeroOneHundred' => ['nullable', 'string', 'max:10'],
            'quarterMile' => ['nullable', 'string', 'max:10'],
            'engineType' => ['nullable', 'string', 'max:100'],
            'engineCode' => ['nullable', 'string', 'max:100'],
            'forcedInduction' => ['nullable', 'string', 'max:100'],
            'trans' => ['nullable', 'string', 'max:100'],
            'suspension' => ['nullable', 'string', 'max:100'],
            'brakes' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
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
            $imagePath = $request->file('image')->store('builds', 'public');
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

    public function garage()
    {
        $userId = Auth::id();
        $builds = Build::where('user_id', $userId)->get();
        $name = Auth::user()->name;
        return view('/garage', ['builds' => $builds, 'name' => $name]);
    }

    public function deleteImage($imageId)
    {
        $image = BuildImage::findOrFail($imageId);

        // Delete the image file from storage
        Storage::delete($image->path);

        // Delete the image record from the database
        $image->delete();

        return back()->with('status', 'Image deleted successfully!');
    }

    public function download(Build $build, $format)
    {
        // Load necessary relationships
        $build->load('modifications', 'notes');

        switch ($format) {
            case 'excel':
                return $this->downloadExcel($build);
            case 'word':
                return $this->downloadWord($build);
            case 'txt':
                return $this->downloadTxt($build);
            default:
                return redirect()->back()->withErrors('Invalid download format.');
        }
    }

    protected function downloadExcel(Build $build)
    {
        $data = [
            ['Year', 'Make', 'Model', 'Trim', 'Category'],
            [$build->year, $build->make, $build->model, $build->trim, $build->build_category]
        ];


        // Add modifications
        $data[] = ['Modifications'];
        foreach ($build->modifications as $mod) {
            $data[] = [
                $mod->category,
                $mod->brand,
                $mod->name,
                $mod->price,
                $mod->part_number,
                $mod->notes
            ];
        }

        // Add build notes
        $data[] = ['Build Notes'];
        foreach ($build->notes as $note) {
            $data[] = [$note->content];
        }

        return Excel::download(new class($data) implements FromArray
        {
            private $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }
        }, 'build_' . $build->id . '.xlsx');
    }

    protected function downloadWord(Build $build)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Add title and details
        $section->addText('Build Details', ['bold' => true, 'size' => 16]);
        $section->addText('Build Name: ' . $build->name);
        $section->addText('Year: ' . $build->year);
        $section->addText('Make: ' . $build->make);
        $section->addText('Model: ' . $build->model);

        $section->addTextBreak(1);

        // Add modifications
        $section->addText('Modifications:', ['bold' => true]);

        if ($build->modifications->isEmpty()) {
            $section->addText('No modifications found.');
        } else {
            foreach ($build->modifications as $mod) {
                if (!is_null($mod->category) && !is_null($mod->brand) && !is_null($mod->name)) {
                    $section->addText("Category: {$mod->category}");
                    $section->addText("Brand: {$mod->brand}");
                    $section->addText("Name: {$mod->name}");
                    $section->addText("Price: {$mod->price}");
                    $section->addText("Part Number: {$mod->part_number}");
                    $section->addText("Notes: {$mod->notes}");
                    $section->addTextBreak(1);
                } else {
                    $section->addText('Some modification details are missing.');
                }
            }
        }

        // Add notes
        $section->addText('Build Notes:', ['bold' => true]);

        if ($build->notes->isEmpty()) {
            $section->addText('No notes found.');
        } else {
            foreach ($build->notes as $note) {
                if (!is_null($note->content)) {
                    $section->addText($note->content);
                    $section->addTextBreak(1);
                } else {
                    $section->addText('Note content is missing.');
                }
            }
        }

        // Ensure the temp directory exists
        $tempDirectory = storage_path('app/temp');
        if (!File::exists($tempDirectory)) {
            File::makeDirectory($tempDirectory, 0755, true);
        }

        // Save the document to a temporary file
        $tempFilePath = storage_path('app/temp/build_' . $build->id . '.docx');

        try {
            $phpWord->save($tempFilePath, 'Word2007');
            Log::info('Word document saved successfully: ' . $tempFilePath);
        } catch (\Exception $e) {
            Log::error('Error saving Word document: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate document'], 500);
        }

        // Check file size and permissions
        if (File::exists($tempFilePath) && File::size($tempFilePath) > 0) {
            Log::info('File exists and size is OK: ' . $tempFilePath);
        } else {
            Log::error('File not found or empty: ' . $tempFilePath);
            return response()->json(['error' => 'File generation issue'], 500);
        }

        // Create a response with the Word document
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="build_' . $build->id . '.docx"',
        ];

        return response()->stream(
            function () use ($tempFilePath) {
                // Output the file contents
                readfile($tempFilePath);
                // Optionally delete the file after serving
                unlink($tempFilePath);
            },
            200,
            $headers
        );
    }

    protected function downloadTxt(Build $build)
    {
        $txtContent = "Build Name: {$build->name}\n";
        $txtContent .= "Year: {$build->year}\n";
        $txtContent .= "Make: {$build->make}\n";
        $txtContent .= "Model: {$build->model}\n\n";

        // Modifications
        $txtContent .= "Modifications:\n";
        foreach ($build->modifications as $mod) {
            $txtContent .= "Category: {$mod->category}\n";
            $txtContent .= "Brand: {$mod->brand}\n";
            $txtContent .= "Name: {$mod->name}\n";
            $txtContent .= "Price: {$mod->price}\n";
            $txtContent .= "Part Number: {$mod->part_number}\n";
            $txtContent .= "Notes: {$mod->notes}\n\n";
        }

        // Notes
        $txtContent .= "Build Notes:\n";
        foreach ($build->notes as $note) {
            $txtContent .= "{$note->content}\n\n";
        }

        return response($txtContent)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="build_' . $build->id . '.txt"');
    }
}
