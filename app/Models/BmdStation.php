<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmdStation extends Model
{
    protected $fillable = [
        "id",
        "nid",
        "is_gts",
        "pointparent",
        "name",
        "nameBN",
        "code",
        "loc_lat",
        "loc_long",
        "phone",
        "email",
        "location",
        "description",
        "stOrder",
        "timeUpdate",
        "status",
    ];
}
