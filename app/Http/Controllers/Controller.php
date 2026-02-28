<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;

abstract class Controller
{
    public function __construct()
    {
        $service_types = ServiceType::has('listings')->orderBy('name', 'asc')->get();
        view()->share('service_types', $service_types);
    }
}
