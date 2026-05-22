<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminSettingsController extends Controller
{
    // SHOW PAGE
    public function index()
    {
        abort_if(auth()->user()->role !== 'admin', 403);

        return view('admin.settings');
    }

    // UPDATE PROFILE
    public function updateProfile(Request $request)
    {
        abort_if(auth()->user()->role !== 'admin', 403);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profile updated successfully');
    }

    // CHANGE PASSWORD
    public function updatePassword(Request $request)
    {
        abort_if(auth()->user()->role !== 'admin', 403);

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect');
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success', 'Password updated successfully');
    }
}