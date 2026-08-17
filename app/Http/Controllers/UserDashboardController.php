<?php

namespace App\Http\Controllers;

use App\Models\ProvinceCities;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function DashboardAddressCreate()
    {
        $provinces = ProvinceCities::where('parent', 0)->get();
        return view('dashboardAddress' , compact('provinces'));
    }
}
