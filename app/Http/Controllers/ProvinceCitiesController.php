<?php

namespace App\Http\Controllers;

use App\Models\ProvinceCities;
use Illuminate\Http\Request;

class ProvinceCitiesController extends Controller
{
    public function getCities($provinceId)
    {
        $cities = ProvinceCities::where('parent', $provinceId)->get();

        return response()->json($cities);
    }
}
