<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\SiteSetting;

class GalleryController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        if (!$settings->gallery_active) {
            return redirect()->route('home');
        }

        $photos = GalleryImage::where('is_published', true)
            ->latest()
            ->paginate(12);

        return view('gallery.index', compact('photos'));
    }
}

