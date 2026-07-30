<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_hash',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'date',
    ];
}
