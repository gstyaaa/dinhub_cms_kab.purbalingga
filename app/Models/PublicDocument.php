<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PublicDocument extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'category',
        'title',
        'file_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Categories constant list
     */
    public const CATEGORIES = [
        'Program & Kegiatan' => 'Program & Kegiatan',
        'SAKIP' => 'SAKIP',
        'Peraturan' => 'Peraturan',
        'Standar Pelayanan' => 'Standar Pelayanan',
        'Maklumat Pelayanan' => 'Maklumat Pelayanan',
        'Kode Etik' => 'Kode Etik',
        'Nilai SKM' => 'Nilai SKM',
    ];

    /**
     * Spatie Activity Log configuration (Poin 10)
     * Automatically logs create, update, and delete actions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['category', 'title', 'file_path', 'is_active'])
            ->logOnlyDirty()
            ->useLogName('dokumen_publik');
    }

    /**
     * Boot model events to handle automatic file cleanup
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically delete old PDF file from storage when updating file_path
        static::updating(function (PublicDocument $document) {
            if ($document->isDirty('file_path')) {
                $oldFilePath = $document->getOriginal('file_path');
                if (!empty($oldFilePath) && Storage::disk('public')->exists($oldFilePath)) {
                    Storage::disk('public')->delete($oldFilePath);
                }
            }
        });

        // Automatically delete PDF file from storage when record is deleted
        static::deleting(function (PublicDocument $document) {
            if (!empty($document->file_path) && Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }
        });
    }

    /**
     * Scope to filter active documents
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by category
     */
    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
