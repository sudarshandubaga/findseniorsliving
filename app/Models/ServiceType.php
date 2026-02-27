<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceType extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'service_types';

    public $timestamps = false;

    public function listings()
    {
        return $this->hasMany(Listing::class, 'service_type_id', 'id')
            ->whereRaw("FIND_IN_SET(service_types.id, listings.service_type_id)");
    }
}