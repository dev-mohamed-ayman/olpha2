<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\Message;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{

    public function users()
    {
        $senders = Message::query()->where('sender', auth('api')->user()->id)->pluck('receiver');
        $receivers = Message::query()->where('receiver', auth('api')->user()->id)->pluck('sender');
        $ids = [];
        foreach ($senders as $sender) {
            if (in_array($sender, $ids)) {

            } else {
                array_push($ids, $sender);
            }
        }
        foreach ($receivers as $receiver) {
            if (in_array($receiver, $ids)) {

            } else {
                array_push($ids, $receiver);
            }
        }

        $users = User::query()
            ->whereIn('id', $ids)
            ->with(['senderMessages' => function ($q) {
                $q->orderBy('id', 'desc')->limit(1)->first();
            }, 'receiverMessages' => function ($q) {
                $q->orderBy('id', 'desc')->limit(1)->first();
            }])
            ->get();

        return returnData(true, $users);

    }

    public function chat(Request $request)
    {

        $messages = Message::query()
            ->where('sender', auth()->user()->id)
            ->orWhere('receiver', auth()->user()->id)
            ->with('sender', 'receiver')
            ->orderBy('id', 'asc')
            ->get();

        $data = [];

        foreach ($messages as $message) {
            if ($message->receiver == $request->user_id || $message->sender == $request->user_id) {
                array_push($data, $message);
            } else {
                continue;
            }
        }

        $messages = $data;

        return returnData(true, $messages);

    }


    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'message' => 'required|string',
            'type' => 'required'
        ]);
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }
        $receiver = User::findOrFail($request->user_id);
        $user = auth('api')->user();

//        if (auth('api')->user()->package_end_date == null || auth('api')->user()->package_end_date < now()) {
//            return returnData(false, 'Please subscribe to a package');
//        }

//        if (empty($user->details)) {
//            return returnData(false, 'You cannot send a message to this user');
//        }

        if ($receiver->setting->nationality_messages != null) {
            if ($receiver->setting->nationality_messages != []) {
                if (!in_array($user->details->nationality, $receiver->setting->nationality_messages)) {
                    return returnData(false, 'You cannot send a message to this user');
                }
            }
        }
        if ($receiver->setting->country_messages != null) {
            if ($receiver->setting->country_messages != []) {
                if (!in_array($user->details->nationality, $receiver->setting->country_messages)) {
                    return returnData(false, 'You cannot send a message to this user');
                }
            }
        }

        $message = new Message();
        $message->sender = $user->id;
        $message->receiver = $receiver->id;
        $message->type = $request->type;
        $message->duration = $request->duration;
        if ($request->file('record')) {
//            $message->message = uploadFile('frontend/user-records', $request->file('record'));
            $message->message = \Storage::disk('public_uploads')->put('frontend/records', $request->file('record'));
        } else {
            $message->message = $request->message;
        }
        $message->save();

        event(new \App\Events\Message(
            $user,
            $receiver,
            $message->message,
            $user->image
        ));

        if ($message->type == 'call') {
            event(new \App\Events\Call(
                $user,
                $receiver,
                $message->message,
                $user->image
            ));
        }

        return response()->json([
            'receiver' => $receiver,
            'user' => $user,
            'message' => $message,
            'image' => asset($user->image)
        ]);

    }

    public
    function sendGift(User $user, Gift $gift)
    {


        $userPoint = UserPoint::query()->where('user_id', auth('api')->user()->id)->get();
        $points = $userPoint->sum('amount') - $userPoint->sum('expense');

        if ($gift->price > $points) {
            return response()->json([
                'status' => 'error',
                'msg' => 'نقاطك غير كافيه'
            ]);
        }

        $newUserPoint = new UserPoint();
        $newUserPoint->user_id = auth('api')->user()->id;
        $newUserPoint->amount = '0';
        $newUserPoint->expense = $gift->price;
        $newUserPoint->save();


        $receiver = $user;
        $user = auth('api')->user();
        $msg = '<img src="' . asset($gift->image) . '" style="width: 60px; height: 60px;">';
        $message = new Message();
        $message->sender = $user->id;
        $message->receiver = $receiver->id;
        $message->message = $msg;
        $message->save();

        event(new \App\Events\Message(
            $user,
            $receiver,
            $message->message,
            $user->image
        ));

        return response()->json([
            'receiver' => $receiver,
            'user' => $user,
            'message' => $message,
            'image' => asset($user->image)
        ]);
    }

    public function gift()
    {
        $gifts = Gift::query()->orderBy('id', 'desc')->get();
        return returnData(true, $gifts);
    }

    public function call(User $user)
    {
        return $user;
    }

}
