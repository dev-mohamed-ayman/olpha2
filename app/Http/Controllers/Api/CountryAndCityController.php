<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryAndCityController extends Controller
{
    public function countries()
    {
        $countries = Country::query()->with('cities')->get();
        return returnData(true, $countries);
    }

    public function cities()
    {
        $cities = City::all();
        return returnData(true, $cities);
    }
}
