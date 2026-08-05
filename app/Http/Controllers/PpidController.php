<?php

namespace App\Http\Controllers;

use App\Models\PublicDocument;

class PpidController extends Controller
{
    /**
     * Profil PPID Pelaksana
     */
    public function index()
    {
        return view('ppid.profile');
    }

    /**
     * Program & Kegiatan Dokumen Publik
     */
    public function program()
    {
        $documents = PublicDocument::active()
            ->category('Program & Kegiatan')
            ->get();

        return view('ppid.program', compact('documents'));
    }

    /**
     * SAKIP Dokumen Publik
     */
    public function sakip()
    {
        $documents = PublicDocument::active()
            ->category('SAKIP')
            ->get();

        return view('ppid.sakip', compact('documents'));
    }

    /**
     * Peraturan Dokumen Publik
     */
    public function peraturan()
    {
        $documents = PublicDocument::active()
            ->category('Peraturan')
            ->get();

        return view('ppid.peraturan', compact('documents'));
    }
}
