<?php

namespace App\Http\Controllers;

use App\Models\PpidPage;

class PpidController extends Controller
{
    public function index()
    {
        $ppidPages = PpidPage::where('is_published', true)
            ->orderBy('sort_order')
            ->get();

        return view('ppid.index', compact('ppidPages'));
    }
}
