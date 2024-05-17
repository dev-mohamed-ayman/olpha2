<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $countries = Country::query()->orderBy('id', 'desc')->get();
        $packages = Package::query()->orderBy('id', 'desc')->paginate(15);
        return view('backend.package.index', compact('countries', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:packages,title',
            'country' => 'required',
            'price' => 'required',
            'months' => 'required',
        ]);


        $package = new Package();
        $package->title = $request->title;
        $package->price = $request->price;
        $package->months = $request->months;
        $package->country_id = $request->country;
        $package->save();

        return back()->with('success', 'Package Created Successfully');
    }

    public function update(Package $package, Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:packages,title',
            'country' => 'required',
            'price' => 'required',
            'months' => 'required',
        ]);

        $package->title = $request->title;
        $package->price = $request->price;
        $package->months = $request->months;
        $package->country_id = $request->country;
        $package->update();

        return back()->with('success', 'Package Updated Successfully');
    }

    public function destroy(Package $package)
    {
        $package->delete();
    }
}
