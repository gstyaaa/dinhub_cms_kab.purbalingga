<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [

        'ticket_code',

        'name',

        'email',

        'subject',

        'question',

        'answer',

        'status',

        'answered_at',
    ];

    protected $casts = [

        'answered_at' => 'datetime',
    ];
}