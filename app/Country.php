<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        "iso2",
        "shortName",
        "longName",
        "iso3",
        "numCode",
    ];
}
