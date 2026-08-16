<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'designation',
        'photo',
        'bio',
        'phone',
        'email',
        'show_on_homepage',
        'order',
        'is_active',
    ];

    protected $casts = [
        'show_on_homepage' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeHomepage($query)
    {
        return $query->active()->where('show_on_homepage', true);
    }
}
