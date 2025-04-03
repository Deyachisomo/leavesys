<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class ProfileController extends Controller
{
    /**
     * Display the user profile.
     */
    public function index()
    {
        return view('profile.index'); // Ensure this view exists
    }

    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        return view('profile.edit'); // Ensure this view exists
    }

    /**
     * Update the user profile.
     */
    public function update(Request $request)
    {
        // Perform profile update logic
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
