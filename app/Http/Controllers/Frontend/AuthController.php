<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserDetailsRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return back()->withErrors('بيانات تسجيل الدخول غير صحيحة');
        }
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required|unique:users,phone',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'تم انشاء الحساب بنجاح');
    }

    public function details()
    {
        $countries = Country::query()->where('status', 'visible')->get();
        $userDetails = UserDetails::query()->where('user_id', \auth()->user()->id)->first();
        return view('frontend.details', compact('countries', 'userDetails'));
    }

    public function updateUserDetails(UserDetailsRequest $request)
    {
        UserDetails::query()->updateOrCreate([
            'user_id' => auth()->user()->id
        ], [
            'user_id' => auth()->user()->id,
            'nationality' => $request->nationality,
            'origin' => $request->origin,
            'country' => $request->country,
            'city' => $request->city,
            'status' => $request->status,
            'searching_for' => $request->searching_for,
            'age' => $request->age,
            'weight' => $request->weight,
            'height' => $request->height,
            'skin_colour' => $request->skin_colour,
            'physique' => $request->physique,
            'religion' => $request->religion,
            'religion_commitment' => $request->religion_commitment,
            'prayer' => $request->prayer,
            'smoking' => $request->smoking,
            'beard' => $request->beard,
            'educational_qualification' => $request->educational_qualification,
            'financial_status' => $request->financial_status,
            'employment' => $request->employment,
            'job' => $request->job,
            'monthly_income' => $request->monthly_income,
            'health_status' => $request->health_status,
            'specifications_of_your_life_partner' => $request->specifications_of_your_life_partner,
            'talk_about_your_self' => $request->talk_about_your_self,
        ]);

        return back()->with('success', 'تم تحديث بياناتك بنجاح');
    }

    public function getCities($id)
    {
        $cities = City::query()->where('country_id', $id)->get();
        return response()->json($cities);
    }
}
