<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Storage;
use Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

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
        $filePath = $request->file('avatar')->store('avatars', 'public');
        Image::make(Storage::disk('public')->path($filePath))->fit(200)->save();
        $user = User::find(Auth::id());
        $user->avatar = Storage::url($filePath);
        $user->save();
        return redirect('/user/avatar');
    }
}
