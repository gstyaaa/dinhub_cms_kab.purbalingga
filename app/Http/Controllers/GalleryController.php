<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = GalleryImage::where('is_published', true)
            ->latest()
            ->paginate(12);

        return view('gallery.index', compact('photos'));
    }
}
