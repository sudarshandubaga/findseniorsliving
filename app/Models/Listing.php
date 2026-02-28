<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'listings';

    protected $appends = ['url'];

    public $timestamps = false;

    public function getFeaturedImageAttribute($image)
    {
        return $image ? env('IMAGE_BASE') . $image : env('IMAGE_BASE') . '/assets/images/no-image-default.png';
    }

    public function getUrlAttribute()
    {
        return env("IMAGE_BASE") . "/caregiver_details/" . $this->country . "/" . $this->slug;
    }
}
