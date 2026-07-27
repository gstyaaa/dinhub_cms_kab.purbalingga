<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function about()
    {
        return view('profile.about');
    }

    public function visionMission()
    {
        return view('profile.vision-mission');
    }

    public function duties()
    {
        return view('profile.duties');
    }

    public function organization()
    {
        return view('profile.organization');
    }
}
