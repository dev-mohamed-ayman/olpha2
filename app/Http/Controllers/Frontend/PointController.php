<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isJson;

class PointController extends Controller
{
    public function index()
    {
        $userDetails = UserDetails::query()->where('user_id', auth()->user()->id)->first();
        if (empty($userDetails) || $userDetails == null) {
            return back()->with('success', 'برجاء استكمال بياناتك للمتابعه');
        }
        $points = Point::query()->where('country_id', $userDetails->country)->get();
        return view('frontend.point', compact('points'));
    }

    public function payment(Point $point)
    {
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $point->price .
            "&currency=" . $point->country->currency .
            "&customer.merchantCustomerId=" . $point->id .
            "&customer.email=" . auth()->user()->email .
            "&paymentType=DB";


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $data = json_decode($responseData);
        return view('test', ['id' => $data->id]);
    }

    public function callback(Request $request)
    {
        $url = "https://eu-test.oppwa.com/v1/checkouts/" . $request->id . "/payment";
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $data = json_decode($responseData);

//        return $data;
        $point = Point::query()->where('id', $data->customer->merchantCustomerId)->first();
        $user = User::query()->where('email', $data->customer->email)->first();
        $userPoint = new UserPoint();
        $userPoint->user_id = $user->id;
        $userPoint->amount = $point->count;
        $userPoint->expense = '0';
        $userPoint->save();


        return redirect()->route('point.index')->with('success', 'تم اضافة النقاط بنجاح');
    }
}
