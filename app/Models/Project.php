<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'year',
        'role',
        'stack',
        'problem',
        'solution',
        'impact',
        'demo_url',
        'github_url',
        'cover_image',
        'gallery_images',
        'is_featured',
    ];

    protected $casts = [
        'stack' => 'array',
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
    ];
}
