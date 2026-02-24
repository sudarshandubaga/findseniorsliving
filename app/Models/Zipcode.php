<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'zipcodes';

    public $timestamps = false;
}
