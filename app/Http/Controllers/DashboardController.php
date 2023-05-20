<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\BmdStation;
use App\Models\BmdStationDataRaw;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stations = BmdStation::orderBy("stOrder", "asc")->get();

        return view('dashboard.index', compact(
            'stations'
        ));
    }

    public function station_data($station_code)
    {
        $station_data = BmdStationDataRaw::where("stCode", $station_code)->limit(50)->orderBy("date_time", "desc")->get()->reverse();
        $station_data_minmax = BmdStationDataRaw::where("stCode", $station_code)
            ->select(DB::raw('date(date_time) as event_date'), DB::raw('max(maximum_temp) as max_temp'), DB::raw('min(minimum_temp) as min_temp'))
            ->groupBy(DB::raw('event_date'))
            ->orderBy("date_time", "desc")
            ->limit(31)
            ->get()
            ->reverse();

        return view('dashboard.station_data', compact(
            'station_data',
            'station_data_minmax',
        ));
    }
}
