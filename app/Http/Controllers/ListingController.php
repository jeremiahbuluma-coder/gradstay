<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    // =========================
    // PUBLIC LISTINGS PAGE
    // =========================
    public function index()
    {
        $listings = Listing::latest()->get();
        return view('listings.index', compact('listings'));
    }

    // =========================
    // ADMIN LISTINGS PAGE
    // =========================
    public function adminIndex()
    {
        $listings = Listing::latest()->get();
        return view('admin.listings.index', compact('listings'));
    }

    // =========================
    // CREATE PAGE
    // =========================
    public function create()
    {
        return view('admin.listings.create');
    }

    // =========================
    // STORE LISTING
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required',
            'description' => 'required',

            // IMAGE
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',

            // VIDEO
            'video' => 'nullable|mimes:mp4,mov,avi,webm|max:20480',

            // YOUTUBE LINK
            'video_url' => 'nullable|string',
        ]);

        $imagePath = null;
        $videoPath = null;

        // =========================
        // IMAGE UPLOAD
        // =========================
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time().'_'.$image->getClientOriginalName();

            $imagePath = $image->storeAs(
                'listings/images',
                $imageName,
                'public'
            );
        }

        // =========================
        // VIDEO UPLOAD
        // =========================
        if ($request->hasFile('video')) {

            $video = $request->file('video');

            $videoName = time().'_'.$video->getClientOriginalName();

            $videoPath = $video->storeAs(
                'listings/videos',
                $videoName,
                'public'
            );
        }

        Listing::create([
            'title' => $request->title,
            'location' => $request->location,
            'price' => $request->price,
            'description' => $request->description,

            'image' => $imagePath,
            'video' => $videoPath,
            'video_url' => $request->video_url,
        ]);

        return redirect()
            ->route('admin.listings.index')
            ->with('success', 'Listing created successfully');
    }

    // =========================
    // DELETE LISTING
    // =========================
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        // DELETE IMAGE
        if ($listing->image &&
            Storage::disk('public')->exists($listing->image)) {

            Storage::disk('public')->delete($listing->image);
        }

        // DELETE VIDEO
        if ($listing->video &&
            Storage::disk('public')->exists($listing->video)) {

            Storage::disk('public')->delete($listing->video);
        }

        $listing->delete();

        return back()->with('success', 'Listing deleted successfully');
    }
}