<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        if (empty(auth()->user()->details->country)) {
            return back()->withErrors('برجاء استكمال بياناتك للمتابعه');
        }

        $packages = Package::query()
            ->orderBy('id', 'desc')
            ->where('country_id', auth()->user()->details->country)
            ->get();

        return view('frontend.package', compact('packages'));
    }

    public function payment(Package $package)
    {
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $package->price .
            "&currency=" . $package->country->currency .
            "&customer.merchantCustomerId=" . $package->id .
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
        return view('frontend.package-payment', ['id' => $data->id]);
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
        $package = Package::query()->where('id', $data->customer->merchantCustomerId)->first();
        $user = User::query()->where('email', $data->customer->email)->first();
        $user->package_end_date = now()->addMonth($package->months);
        $user->package_id = $package->id;
        $user->update();

        return redirect()->route('package.index')->with('success', 'تم الاشتراك في باقة التميز بنجاح');
    }
}
