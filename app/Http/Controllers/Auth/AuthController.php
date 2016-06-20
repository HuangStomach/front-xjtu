<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Auth;
use App\User;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    public function __construct()
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function getLogin() {
        return view('auth/login');
    }

    public function postLogin(Request $request) {
        $validator = $this->validate($request, [
            'token' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['token' => $request->get('token'), 'password' => $request->get('password')])) {
            return redirect()->intended('admin');
        }
    }

    public function getLogout () {
        Auth::logout();
    }

}
