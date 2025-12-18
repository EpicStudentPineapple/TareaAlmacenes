<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::with('profile')->findOrFail(1);
        return view('profile.show', compact('user'));
    }
}