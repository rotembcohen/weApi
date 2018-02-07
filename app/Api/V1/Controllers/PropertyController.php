<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{

    public function index()
    {
        return Property::orderByDesc('name')->get();
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        return $property;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'desks' => 'numeric',
            'Sf' => 'numeric',
            'address1' => 'required',
            'city' => 'required|max:255',
            'state' => 'required|max:2',
            'postalCode' => 'max:10',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'countryId' => 'required|numeric|max:255',
            'regionalCategory' => 'numeric',
            'marketId' =>'required|numeric|max:255',
            'submarketId' =>'numeric',
            'locationId' =>'numeric',
        ]);

        $property = tap(new Property($data))->save();

        return response()->json($property, 201);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $property->update($request->all());

        return response()->json($property, 200);
    }
    /*
    public function delete($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json(null, 204);
    }
    */
}