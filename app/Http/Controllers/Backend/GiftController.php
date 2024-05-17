<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::query()->orderBy('id', 'desc')->paginate(15);
        return view('backend.gift.index', compact('gifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'price' => 'required',
        ]);


        $gift = new Gift();
        $gift->image = uploadFile('backend/images/gifts', $request->file('image'));
        $gift->price = $request->price;
        $gift->save();

        return back()->with('success', 'Gift Created Successfully');
    }

    public function update(Gift $gift, Request $request)
    {
        $request->validate([
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {
            deleteFile($gift->image);
            $gift->image = uploadFile('backend/images/gifts', $request->file('image'));
        }
        $gift->price = $request->price;
        $gift->save();

        return back()->with('success', 'Gift Updated Successfully');
    }

    public function destroy(Gift $gift)
    {
        $gift->delete();
    }
}
