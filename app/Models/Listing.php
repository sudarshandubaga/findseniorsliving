<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'listings';

    public $timestamps = false;

    public function getImageAttribute($image)
    {
        return $image ? env('IMAGE_BASE') . $image : env('IMAGE_BASE') . '/assets/images/no-image-default.png';
    }
}
