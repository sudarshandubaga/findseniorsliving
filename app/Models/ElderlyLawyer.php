<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElderlyLawyer extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'elderly_lawyer';

    public $timestamps = false;
}
