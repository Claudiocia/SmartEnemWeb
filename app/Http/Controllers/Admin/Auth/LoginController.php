<?php

namespace SmartEnem\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use SmartEnem\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use SmartEnem\Models\User;

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
    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $data['role'] = User::ROLE_ADMIN;
        return $data;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
