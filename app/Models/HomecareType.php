<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomecareType extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'homecare_types';

    protected $fillable = [
        'parent_type_id',
        'title',
        'slug',
        'short_description',
        'description',
        'banner_image',
        'icon',
        'faq',
        'additional_sections',
        'meta',
        'status',
        'sort_order',
    ];

    public function parent()
    {
        return $this->belongsTo(HomecareType::class, 'parent_type_id');
    }

    public function children()
    {
        return $this->hasMany(HomecareType::class, 'parent_type_id')->orderBy('sort_order');
    }
}
