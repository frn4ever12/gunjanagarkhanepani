<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'attachment',
        'publish_date',
        'is_featured',
        'is_published',
        'views',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->published()->where('is_featured', true);
    }

    public function getUrlAttribute()
    {
        return route('news.show', $this->slug);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
