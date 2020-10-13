<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use User;

class Controller_login extends Controller
{
    function show(){
        return view('login.login');
    }
    function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){

            return redirect()->route('insertData');
        }
        else{
            return back()->with("error", "Email/password is Wrong");
        }
    }
}
