<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get or create profile
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => $user->phone,
                'is_verified' => true,
                'is_active' => true
            ]
        );
        
        return view('profile.index', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        
        // Check if user owns this profile
        if ($profile->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        
        // Check if user owns this profile
        if ($profile->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:100',
            'gender' => 'required|in:male,female,other',
            'nik' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:100',
            'major' => 'nullable|string|max:100',
            'study_period' => 'nullable|string|max:50',
            'study_city' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);
        
        $profile->update($request->all());
        
        return redirect()->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}