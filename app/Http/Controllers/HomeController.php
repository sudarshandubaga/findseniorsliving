<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.screens.home');
    }
}
