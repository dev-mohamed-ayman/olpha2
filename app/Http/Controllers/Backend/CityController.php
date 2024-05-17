<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $countries = Country::query()->orderBy('id', 'desc')->get();
        $cities = City::query()->orderBy('id', 'desc')->paginate(15);
        return view('backend.city.index', compact('countries', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:countries,name',
            'country' => 'required'
        ]);


        $city = new City();
        $city->name = $request->name;
        $city->country_id = $request->country;
        $city->save();

        return back()->with('success', 'City Created Successfully');
    }

    public function update(City $city, Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:countries,name,' . $city->id,
            'country' => 'required'
        ]);

        $city->name = $request->name;
        $city->country_id = $request->country;
        $city->update();

        return back()->with('success', 'City Updated Successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();
    }
}
