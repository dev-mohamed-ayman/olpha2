<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index($type)
    {
        $ids = Interest::query()->where('type', $type)->where('me', auth()->user()->id)->pluck('user_id');
        $users = User::query()->whereIn('id', $ids)->get();
        return view('frontend.interest', compact('type', 'users'));
    }
}
