<?php

namespace App\Http\Controllers;

class PpidController extends Controller
{
    public function index()
    {
        return view('ppid.profile');
    }

    public function program()
    {
        return view('ppid.program');
    }

    public function sakip()
    {
        return view('ppid.sakip');
    }

    public function peraturan()
    {
        return view('ppid.peraturan');
    }
}
