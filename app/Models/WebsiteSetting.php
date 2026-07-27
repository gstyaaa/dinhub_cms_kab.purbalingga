<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'institution_name',
        'logo',
        'logo_white',
        'favicon',
        'address',
        'email',
        'phone',
        'facebook',
        'instagram',
        'youtube',
        'google_maps',
        'copyright',
    ];
}