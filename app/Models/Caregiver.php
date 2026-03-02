<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'caregivers';

    protected $appends = ['name'];

    public $timestamps = false;

    public function getImageAttribute($image)
    {
        return $image ? env('IMAGE_BASE') . "/storage/files/" . $image : env('IMAGE_BASE') . '/no_picture.png';
    }

    public function getProfileUrlAttribute()
    {
        return env("IMAGE_BASE") . "/caregiver-profile-details/" . $this->country . "/" . $this->slug;
    }

    public function getNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
