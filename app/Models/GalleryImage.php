<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_album_id',
        'image',
        'caption',
        'sort_order',
    ];

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class);
    }
}