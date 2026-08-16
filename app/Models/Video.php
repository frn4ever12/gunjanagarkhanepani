<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'video_type',
        'thumbnail',
        'category',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getEmbedUrlAttribute()
    {
        if ($this->video_type === 'youtube') {
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $this->video_url, $matches);
            return isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] : null;
        }
        if ($this->video_type === 'vimeo') {
            preg_match('/vimeo\.com\/(\d+)/', $this->video_url, $matches);
            return isset($matches[1]) ? 'https://player.vimeo.com/video/' . $matches[1] : null;
        }
        return $this->video_url;
    }
}
