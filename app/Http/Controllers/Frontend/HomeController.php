<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        return $request;
        $countries = Country::query()->where('status', 'visible')->get();
        return view('frontend.home', compact('countries'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
    }

    public function search(Request $request)
    {
        if ($request->status == '0') {
            $status = '';
        } else {
            $status = $request->status;
        }

        $users = User::query()
            ->where('gender', $request->gender)
            ->join('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('user_details.age', '>=', $request->age_min)
            ->where('user_details.age', '<=', $request->age_max)
            ->where('user_details.status', 'LIKE', '%' . $status . '%')
            ->orWhere('user_details.nationality', '%' . $request->nationality . '%')
            ->orWhere('user_details.country', '%' . $request->country . '%')
            ->select('user_details.*', 'users.id', 'users.gender', 'users.name')
            ->get();

        return view('frontend.users', compact('users'));
    }
}
