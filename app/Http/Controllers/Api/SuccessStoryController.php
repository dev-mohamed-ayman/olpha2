<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $successStories = SuccessStory::query()->orderBy('id', 'desc')->with('user')->get();
        return returnData(true, $successStories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
            'agree' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }

        $successStory = new SuccessStory();
        $successStory->user_id = auth('api')->user()->id;
        $successStory->message = $request->message;
        $successStory->agree = $request->agree;
        $successStory->save();

        return returnData(true, $successStory);
    }
}
