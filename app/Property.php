<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'desks',
        'Sf',
        'address1',
        'address2',
        'city',
        'state',
        'postalCode',
        'latitude',
        'longitude',
        'regionalCategory',
        'submarketId',
        'locationId',
        'countryId',
        'marketId',
    ];
}
