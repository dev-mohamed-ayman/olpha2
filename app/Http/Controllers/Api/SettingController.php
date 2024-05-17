<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function setting()
    {
        $setting = Setting::query()->where('user_id', auth('api')->user()->id)->first();
        return returnData(true, $setting);
    }

    public function update(Request $request)
    {


        if (auth('api')->user()->package_end_date == null || auth('api')->user()->package_end_date < now()) {
            return returnData(false, 'Please subscribe to a package');
        }


        $validator = Validator::make($request->all(), [
            'active' => 'required|integer',
            'interest' => 'required|integer',
            'ignore' => 'required|integer',
            'visit' => 'required|integer',
            'images' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }

//        return $request;
        $setting = Setting::query()->where('user_id', auth('api')->user()->id)->first();
        $setting->active = $request->active;
        $setting->nationality_messages = $request->nationality_messages;
        $setting->country_messages = $request->country_messages;
        $setting->interest = $request->interest;
        $setting->ignore = $request->ignore;
        $setting->visit = $request->visit;
        $setting->images = $request->images;
        $setting->update();

        return returnData(true, $setting);
    }
}
