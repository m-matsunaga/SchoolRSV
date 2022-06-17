<?php

namespace App\Http\Controllers\logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function RegisterForm(){
        return view('logout.user_register');
    }

    public function added(){
        return view('logout.added');
    }

   protected function Register(RegisterRequest $request){

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        \DB::table('users')->insert([
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        return redirect('/user/added');
    }
}
