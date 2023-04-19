<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmdStationDataRaw extends Model
{
    protected $fillable = [
        "id",
        "stCode",
        "date_time",
        "update_by",
        "r_day",
        "r_hour",
        "humidity",
        "timeUpdate",
        "status",
        "maximum_temp",
        "minimum_temp",
        "rainfall",
        "rainfall_3",
        "rainfall_6",
        "rainfall_24",
        "dry_bulb",
    ];
}
