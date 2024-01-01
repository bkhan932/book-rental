<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rentals = $user->rentals;

        return view('profile.index', compact('user', 'rentals'));
    }

    public function edit()
    {
        return view('profile.edit');
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('user_images', $image, $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('profile.index')->with('message', 'Profile updated successfully.');
    }
}
