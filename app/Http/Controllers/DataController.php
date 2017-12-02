<?php

namespace App\Http\Controllers;

use App\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // where city NICE order by date desc, time desc
    }

    public function GetData()
    {
        $lastData = Data::where('city', Auth::user()->city_name)->orderBy("date", "desc")->orderBy('time', "desc")->first();
        $lastData->date = Carbon::parse($lastData->date)->format("d/m/Y");
        return response()->json($lastData);
    }
}
