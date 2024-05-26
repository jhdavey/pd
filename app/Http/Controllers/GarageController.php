<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarageController extends Controller
{
    public function show(User $user)
    {
        $builds = $user->builds;
        return view('garage.show', compact('user', 'builds'));
    }
}
