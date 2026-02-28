<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElderlyLawyer extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'elderly_lawyer';

    public $timestamps = false;

    public function getImageAttribute($image)
    {
        return $image ? env('IMAGE_BASE') . "/storage/files/" . $image : env('IMAGE_BASE') . '/assets/images/no-image-default.png';
    }

    public function getProfileUrlAttribute()
    {
        return env("IMAGE_BASE") . "/lawyer-profile-details/" . $this->country . "/" . $this->slug;
    }
}
