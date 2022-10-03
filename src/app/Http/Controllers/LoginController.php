<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getAuth(Request $request) {
        $param = ['message' => 'ログインして下さい'];
        return view('admin.login', $param);
    }

    public function postAuth(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/admin');
        } else {
            $message = 'ログインに失敗しました';

            return view('admin.login', ['message' => $message]);
        }
    }
}

// 使ってない