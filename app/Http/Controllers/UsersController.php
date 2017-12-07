<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Storage;
use Image;
use Response;
use Validator;

class UsersController extends Controller
{
    public function confirmEmail($confirm_code)
    {
        $user = User::where('email_confirm_code', $confirm_code)->firstOrFail();
        $user->is_confirmed = true;
        $user->email_confirm_code = null;
        $user->save();

        \Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect('/');
    }

    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
//        $file = $request->file('avatar');
//        $destinationPath = 'uploads/';
//        $filename = Auth::id() . '_' . time() . $file->getClientOriginalName();
//        $file->move($destinationPath, $filename);
//        $user->avatar = $destinationPath . $filename;

        $validator = Validator::make($request->all(), ['avatar' => 'required|image']);
        if($validator->fails()){
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }

        $filePath = $request->file('avatar')->store('avatars', 'public');
        Image::make(Storage::disk('public')->path($filePath))->fit(200)->save();

        return Response::json([
            'success' => true,
            'avatar' => Storage::url($filePath),
        ]);
//        return redirect('/user/avatar');
    }

    public function cropAvatar(Request $request)
    {
        $photo = $request->photo;
        $w = (integer) $request->w;
        $h = (integer) $request->h;
        $x = (integer) $request->x;
        $y = (integer) $request->y;
        $file_path = Str::after($photo, '/storage/');
        Image::make(Storage::disk('public')->path($file_path))->crop($w, $h, $x, $y)->save();

        $user = Auth::user();
        $user->avatar = Storage::url($file_path);
        $user->save();

        return redirect('user/avatar');
    }
}
