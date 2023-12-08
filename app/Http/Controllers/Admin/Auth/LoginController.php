<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin_web')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }
 
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(route('admin.login'));
    }

    protected function attemptLogin(Request $request)
    {
        $cred = $this->credentials($request);
        return $this->guard()->attempt($cred);
    }

    protected function guard()
    {
        return auth()->guard('admin_web');
    }
}
