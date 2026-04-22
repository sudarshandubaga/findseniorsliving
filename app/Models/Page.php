<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'metadata', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url'];

    protected $casts = [
        'metadata' => 'array',
    ];
}
