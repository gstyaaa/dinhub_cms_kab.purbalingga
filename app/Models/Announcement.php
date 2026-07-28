<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'publish_date',
        'is_active',
        'show_on_running_text',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_on_running_text' => 'boolean',
        'publish_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}