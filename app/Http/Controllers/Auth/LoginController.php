<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $this->setPrevious();
        return view('auth.login');
    }

    protected function redirectTo()
    {
        if(session()->has('login_previous'))
            return session()->pull('login_previous');
        return $this->redirectTo;
    }

    protected function setPrevious()
    {
        $root = url()->getRequest()->root();
        $previous = url()->previous();
        $relatively = Str::after($previous, $root);
        if($relatively != $previous && route('login') != $previous)
            session(['login_previous' => $relatively]);
        else
            session()->forget('login_previous');
    }
}
