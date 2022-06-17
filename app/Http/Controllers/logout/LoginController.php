<?php

namespace App\Http\Controllers\logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Common\authorityClass;

class LoginController extends Controller
{
    public function LoginForm(){
        return view('logout.user_login');
    }

    public function login(LoginRequest $request){

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (authorityClass::authority_judge(Auth::user())->admin_role === 10) {
                return redirect()->route('guest_home');
            }
            else if(authorityClass::authority_judge(Auth::user())->admin_role === 1){
                return redirect()->route('auth_home');
            }

        }
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています'
        ])->withInput();
}

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
