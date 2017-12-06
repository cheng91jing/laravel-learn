<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
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
        $user = User::find(Auth::id());
        $user->avatar = Storage::url($filePath);
        $user->save();

        return Response::json([
            'success' => true,
            'avatar' => asset($user->avatar),
        ]);
//        return redirect('/user/avatar');
    }
}
