<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Modification;
use Illuminate\Http\Request;

class ModificationController extends Controller
{
    public function create($build) {
        return view('modifications.create', compact('build'));
    }

    public function store() {
        request()->validate([
            'category' => ['required'],
            'name' => ['required'],
            'brand' => ['required'],
            'price' => ['nullable'],
            'part' => ['nullable'],
            'notes' => ['nullable'],
        ]);

        Modification::create([
            'build_id' => request('build_id'),
            'category' => request('category'),
            'name' => request('name'),
            'brand' => request('brand'),
            'price' => request('price'),
            'part' => request('part'),
            'notes' => request('notes'),
        ]);

        return redirect('/garage');
    }

    public function edit(Modification $modification) {
        
        return view('modifications/edit', ['modification' => $modification]);
    }

    public function update(Request $request, Modification $modification)
    {
        $validated = $request->validate([
                'category' => ['required'],
                'name' => ['required'],
                'brand' => ['required'],
                'price' => ['nullable'],
                'part' => ['nullable'],
                'notes' => ['nullable'],
        ]);

        // Update the modification details
        $modification->update($validated);

        return redirect('/garage');
    }

    public function destroy(Modification $modification) {
 
        $modification->delete();

        return redirect('/garage');
    }
}
