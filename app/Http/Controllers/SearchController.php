<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = Build::query()->with('tags');

        // Handle general search query
        if ($request->has('q')) {
            $query->where(function($q) use ($request) {
                $q->where('model', 'LIKE', '%' . $request->input('q') . '%')
                  ->orWhere('make', 'LIKE', '%' . $request->input('q') . '%')
                  ->orWhere('trim', 'LIKE', '%' . $request->input('q') . '%')
                  ->orWhere('build_category', 'LIKE', '%' . $request->input('q') . '%');

            });
        }

        // Handle category filter
        if ($request->has('build_category')) {
            $query->where('build_category', $request->input('build_category'));
        }

        $builds = $query->get();

        return view('results', ['builds' => $builds]);
    }
}
