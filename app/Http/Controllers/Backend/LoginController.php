<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('dashboard.index')->with('success', 'Login successfully');
        } else {
            return back()->withErrors('incorrect email or password');
        }

    }

    public function logout()
    {
        \auth('admin')->logout();
        return redirect()->route('dashboard.login')->with('success', 'Logged out successfully');
    }
}
