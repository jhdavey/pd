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
        $builds = Build::query()
        ->with('tags')
        ->where('model', 'LIKE', '%'.request('q').'%')
        ->orWhere('make', 'LIKE', '%'.request('q').'%')
        ->orWhere('model', 'LIKE', '%'.request('q').'%')
        ->orWhere('trim', 'LIKE', '%'.request('q').'%')
        ->get();

        return view('results', ['builds' => $builds]);
    }
}
