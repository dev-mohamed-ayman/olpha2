<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:admins,email,' . auth('admin')->user()->id,
        ]);

        $user = Admin::query()->findOrFail(auth('admin')->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return back()->with('success', 'Profile Updated Successfully');

    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Admin::query()->findOrFail(auth('admin')->id());
        $user->password = bcrypt($request->password);
        $user->update();

        return back()->with('success', 'Password Updated Successfully');
    }
}
