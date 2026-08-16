<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'title',
        'description',
        'image',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
