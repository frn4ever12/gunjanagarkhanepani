<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'attachment',
        'publish_date',
        'expiry_date',
        'priority',
        'is_pinned',
        'show_in_ticker',
        'is_published',
        'views',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expiry_date' => 'date',
        'is_pinned' => 'boolean',
        'show_in_ticker' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('expiry_date')
                    ->orWhere('expiry_date', '>=', today());
            });
    }

    public function scopeTicker($query)
    {
        return $query->published()->where('show_in_ticker', true)->orderBy('priority', 'desc')->orderBy('publish_date', 'desc');
    }

    public function scopePinned($query)
    {
        return $query->published()->where('is_pinned', true);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
