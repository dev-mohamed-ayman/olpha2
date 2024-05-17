<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserAllowImage;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class MemberController extends Controller
{
    public function members()
    {
        $members = User::query()
            ->orderBy('id', 'desc')
            ->with('details.country', 'details.nationality', 'details.origin', 'details.cities')
            ->get();
        return returnData(true, $members);
    }

    public function member($user_id)
    {
        if (auth('api')->check()) {
            sendNotification(auth('api')->user()->id, $user_id, auth('api')->user()->name . 'قام بزيارة ملفك الشخصي', 'زيارة ملفك الشخصي');
        }
        $user = User::query()->where('id', $user_id)->with('details.country', 'details.nationality', 'details.origin', 'details.cities')->first();
        return returnData(true, $user);
    }

    public function search(Request $request)
    {
        $users = User::query()
            ->join('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('user_details.status', $request->status)
            ->orWhere('user_details.searching_for', $request->searching_for)
            ->orWhere('user_details.nationality', $request->nationality)
            ->orWhere('user_details.country', $request->country)
            ->orWhere('user_details.age', '>=', $request->min_age)
            ->orWhere('user_details.age', '<=', $request->max_age)
            ->orWhere('user_details.height', '>=', $request->min_height)
            ->orWhere('user_details.height', '<=', $request->max_height)
            ->orWhere('user_details.weight', '>=', $request->min_weight)
            ->orWhere('user_details.weight', '<=', $request->max_weight)
            ->orWhere('user_details.educational_qualification', $request->educational_qualification)
            ->orWhere('user_details.financial_status', $request->financial_status)
            ->orWhere('user_details.employment', $request->employment)
            ->select('users.*')
            ->with('details.country', 'details.nationality', 'details.origin', 'details.cities')
            ->get();

        return returnData(true, $users);
    }

    public function allowed($user_id)
    {
        $uai = UserAllowImage::query()->where('user_id', auth('api')->user()->id)->where('allowed', $user_id)->first();
        if ($uai) {
            $uai->delete();
            return returnData(true, []);
        }
        $userAllowImage = new UserAllowImage();
        $userAllowImage->user_id = auth('api')->user()->id;
        $userAllowImage->allowed = $user_id;
        $userAllowImage->save();
        return returnData(true, []);
    }

    public function isAllowed($user_id)
    {
        $uai = UserAllowImage::query()->where('user_id', auth('api')->user()->id)->where('allowed', $user_id)->first();
        if ($uai) {
            return returnData(true, 'allow');
        } else {
            return returnData(true, 'allow');
        }
    }

    public function images()
    {
        $ids = UserAllowImage::query()->where('allowed', auth('api')->user()->id)->pluck('user_id');
        $images = UserImage::query()
            ->whereIn('user_id', $ids)
            ->with('user.details.nationality', 'user.details.country', 'user.details.origin', 'user.details.cities')
            ->get();
        return returnData(true, $images);
    }

    public function notifications()
    {
        $notifications = Notification::query()->where('receiver', auth('api')->user()->id)->orderBy('id', 'desc')->with('sender')->get();
        return returnData(true, $notifications);
    }
}
