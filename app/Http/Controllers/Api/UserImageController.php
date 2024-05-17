<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserImageController extends Controller
{
    public function images()
    {
        $images = UserImage::query()->where('user_id', auth('api')->user()->id)->get();
        return returnData(true, $images);
    }

    public function addImages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return returnData(false, $validator->errors());
        }
        foreach ($request->images as $image) {
            $userImage = new UserImage();
            $userImage->user_id = auth('api')->user()->id;
            $userImage->path = uploadFile('frontend/images/user-images', $image);
            $userImage->save();
        }
        return returnData(true, []);
    }

    public function deleteImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_id' => 'required',
        ]);
        $userImage = UserImage::query()
            ->where('user_id', auth('api')->user()->id)
            ->where('id', $request->image_id)
            ->first();

        deleteFile($userImage->path);
        $userImage->delete();

        return returnData(true, []);
    }
}
