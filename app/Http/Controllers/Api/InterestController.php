<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InterestController extends Controller
{
    public function interest()
    {
        $ids = Interest::query()->where('type', 'interest')->where('me', auth('api')->user()->id)->pluck('user_id');
        $users = User::query()->whereIn('id', $ids)->with('details.cities', 'details.country', 'details.nationality', 'details.origin')->get();
        return returnData(true, $users);
    }

    public function ignorance()
    {
        $ids = Interest::query()->where('type', 'ignorance')->where('me', auth('api')->user()->id)->pluck('user_id');
        $users = User::query()->whereIn('id', $ids)->with('details.cities', 'details.country', 'details.nationality', 'details.origin')->get();
        return returnData(true, $users);
    }

    public function addAndRemoveInterest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }


        $interest = Interest::query()
            ->where('type', 'interest')
            ->where('user_id', $request->user_id)
            ->where('me', auth('api')->user()->id)
            ->first();


        if ($interest == null) {
            $interest = new Interest();
            $interest->me = auth('api')->user()->id;
            $interest->user_id = $request->user_id;
            $interest->type = 'interest';
            $interest->save();
            sendNotification($interest->me, $interest->user_id, 'تم اضافتك الي قائمة الاهتمام بواسطه ' . auth('api')->user()->name, 'قائمة الاهتمام');
        } else {
            $interest->delete();
        }

        return returnData(true, []);

    }

    public function addAndRemoveIgnorance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }

        $interest = Interest::query()
            ->where('type', 'ignorance')
            ->where('user_id', $request->user_id)
            ->where('me', auth('api')->user()->id)
            ->first();


        if ($interest == null) {
            $interest = new Interest();
            $interest->me = auth('api')->user()->id;
            $interest->user_id = $request->user_id;
            $interest->type = 'ignorance';
            $interest->save();
            sendNotification($interest->me, $interest->user_id, 'تم اضافتك الي قائمة التجاهل بواسطه ' . auth('api')->user()->name, 'قائمة التجاهل');
        } else {
            $interest->delete();
        }

        return returnData(true, []);

    }

    public function interestMe()
    {
        $ids = Interest::query()
            ->where('user_id', auth('api')->user()->id)
            ->pluck('me');
        $users = User::query()->whereIn('id', $ids)->with('details.cities', 'details.country', 'details.nationality', 'details.origin')->get();
        return returnData(true, $users);
    }

}
