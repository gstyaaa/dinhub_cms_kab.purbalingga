<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::with('images')
            ->where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('gallery.index', compact('albums'));
    }
}
