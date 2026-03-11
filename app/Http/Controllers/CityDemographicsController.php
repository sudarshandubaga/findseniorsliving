<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityDemographicsController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::connection('mysql2')->table('city_demographics');

        if ($request->has('search')) {
            $query->where('city', 'like', '%' . $request->search . '%');
        }

        $demographics = $query->paginate(20);

        return view('web.screens.city-demographics', compact('demographics'));
    }

    public function show($id)
    {
        $demographic = DB::connection('mysql2')->table('city_demographics')->where('id', $id)->first();

        if (!$demographic) {
            abort(404);
        }

        return view('web.screens.city-demographic-details', compact('demographic'));
    }
}
