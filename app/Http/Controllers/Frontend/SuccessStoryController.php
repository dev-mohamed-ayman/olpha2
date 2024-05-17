<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $successStories = SuccessStory::query()->orderBy('id', 'desc')->get();
        return view('frontend.success-story', compact('successStories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'agree' => 'required',
        ]);

        $successStory = new SuccessStory();
        $successStory->user_id = auth()->user()->id;
        $successStory->message = $request->message;
        $successStory->agree = $request->agree;
        $successStory->save();

        return back()->with('success', 'تم اضافة قصة النجاح');
    }
}
