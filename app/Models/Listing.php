<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'listings';

    public $timestamps = false;
}
