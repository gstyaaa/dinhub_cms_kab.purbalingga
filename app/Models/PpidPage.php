<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidPage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
        'attachment',
        'is_published',
        'sort_order',
    ];
}