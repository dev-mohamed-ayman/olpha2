<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::query()->orderBy('id', 'desc')->paginate(15);
        return view('backend.country.index', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:countries,name',
            'status' => 'required',
            'currency' => 'required',
        ]);

        $country = new Country();
        $country->name = $request->name;
        $country->status = $request->status;
        $country->currency = $request->currency;
        $country->save();

        return back()->with('success', 'Country Created Successfully');
    }

    public function update(Country $country, Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:countries,name,' . $country->id,
            'status' => 'required',
            'currency' => 'required',
        ]);

        $country->name = $request->name;
        $country->status = $request->status;
        $country->currency = $request->currency;
        $country->update();

        return back()->with('success', 'Country Updated Successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();
    }
}
