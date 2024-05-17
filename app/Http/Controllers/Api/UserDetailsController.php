<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserDetailsRequest;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDetailsController extends Controller
{

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rule());
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }

        $user = UserDetails::query()->updateOrCreate([
            'user_id' => auth('api')->user()->id
        ], [
            'user_id' => auth('api')->user()->id,
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

        return returnData(true, $user);
    }

    public
    function updateUserDetails(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rule());
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }

        $user = UserDetails::query()->where('user_id', auth('api')->user()->id)->first();
        $user->nationality = $request->nationality;
        $user->origin = $request->origin;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->status = $request->status;
        $user->searching_for = $request->searching_for;
        $user->age = $request->age;
        $user->type_marriage = $request->type_marriage;
        $user->weight = $request->weight;
        $user->height = $request->height;
        $user->skin_colour = $request->skin_colour;
        $user->physique = $request->physique;
        $user->religion = $request->religion;
        $user->religion_commitment = $request->religion_commitment;
        $user->smoking = $request->smoking;
        $user->beard = $request->beard;
        $user->educational_qualification = $request->educational_qualification;
        $user->financial_status = $request->financial_status;
        $user->employment = $request->employment;
        $user->job = $request->job;
        $user->monthly_income = $request->monthly_income;
        $user->health_status = $request->health_status;
        $user->specifications_of_your_life_partner = $request->specifications_of_your_life_partner;
        $user->talk_about_your_self = $request->talk_about_your_self;
        $user->save();

        return returnData(true, $user);
    }

    public function rule()
    {
        return [
            'nationality' => 'required',
            'origin' => 'required',
            'country' => 'required',
            'city' => 'required',
            'status' => 'required',
            'searching_for' => 'required',
            'age' => 'required',
            'prayer' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'skin_colour' => 'required',
            'physique' => 'required',
            'religion' => 'required',
            'religion_commitment' => 'required',
            'smoking' => 'required',
            'beard' => 'required',
            'educational_qualification' => 'required',
            'financial_status' => 'required',
            'employment' => 'required',
            'job' => 'required',
            'monthly_income' => 'required',
            'health_status' => 'required',
            'specifications_of_your_life_partner' => 'required',
            'talk_about_your_self' => 'required',
        ];
    }
}
