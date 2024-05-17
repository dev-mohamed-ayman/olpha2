<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Models\Gift;
use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserAllowImage;
use App\Models\UserImage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $images = UserImage::query()->where('user_id', auth()->user()->id)->get();
        return view('frontend.profile.index', compact('images'));
    }

    public function addImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $userImage = new UserImage();
        $userImage->user_id = auth()->user()->id;
        $userImage->path = uploadFile('frontend/images/users', $request->file('image'));
        $userImage->save();
        return back()->with('success', 'تم اضافة الصورة بنجاح');
    }

    public function deleteImage($id)
    {
        $userImage = UserImage::query()->findOrFail($id);
        deleteFile($userImage->path);
        $userImage->delete();
        return back()->with('success', 'تم حذف الصورة بنجاح');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = $request->password;
        }
        if ($request->hasFile('image')) {
            deleteFile($user->image);
            $user->image = uploadFile('frontend/images/users', $request->file('image'));
        }
        $user->update();
        return back()->with('success', 'تم تحديث بياناتك بنجاح');
    }

    public function show(User $user)
    {

        $messages = Message::query()
            ->where('sender', auth()->user()->id)
            ->orWhere('receiver', auth()->user()->id)
            ->orderBy('id', 'asc')
            ->get();

        $data = [];

        foreach ($messages as $message) {
            if ($message->receiver == $user->id || $message->sender == $user->id) {
                array_push($data, $message);
            } else {
                continue;
            }
        }

        sendNotification(auth()->user()->id, $user->id, auth()->user()->name . 'زار ملفك الشخصي', 'زيارة ملفك');

        $messages = $data;
        $gifts = Gift::query()->orderBy('id', 'desc')->get();
        return view('frontend.profile.show', compact('user', 'messages', 'gifts'));
    }

    public function allowed($user_id)
    {
        $uai = UserAllowImage::query()->where('user_id', auth()->user()->id)->where('allowed', $user_id)->first();
        if ($uai) {
            $uai->delete();
            return back()->with('success', 'تم الغاء السماح بمشاهدة الصور');
        }
        $userAllowImage = new UserAllowImage();
        $userAllowImage->user_id = auth()->user()->id;
        $userAllowImage->allowed = $user_id;
        $userAllowImage->save();
        sendNotification(auth()->user()->id, $user_id, auth()->user()->name . ' قام بالسماح لك بمشاهدة صورة', 'مشاهدة الصور');
        return back()->with('success', 'تم السماح بمشاهدو صورك');
    }

    public function images()
    {
        $ids = UserAllowImage::query()->where('allowed', auth()->user()->id)->pluck('user_id');
        $images = UserImage::query()->whereIn('user_id', $ids)->get();
        return view('frontend.profile.images', compact('images'));
    }

    public function notifications()
    {
        $notifications = Notification::query()->where('receiver', auth()->user()->id)->orderBy('id', 'desc')->with('sender')->get();
        return view('frontend.notification', compact('notifications'));
    }
}
