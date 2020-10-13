<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class Controller_register extends Controller
{
    function show(){
        return view('login.register');
    }
    function insert(Request $request)
    {

        $rule = [
            'username'=> 'required|unique:user,username',
            'password'=> 'required|confirmed|min:3',
            'email'=> 'required|unique:user,email|email'
        ];
        $attribute = [
            'username'=>'Username',
            'password'=>'Password',
            'email'=>'Email'
        ];
        $message = [
            'required'=> ':attribute is required',
            'unique'=>':attribute is already used',
            'email'=>':attribute must be a proper email',
            'min'=>':attribute minimal length is :min',
            'confirmed'=>':attribute does not match'
        ];
        $this->validate($request,$rule,$message,$attribute);
        $username=$request->username;
        $password=$request->password;
        $email=$request->email;
        User::insert($username,$email,$password);
        return redirect()->route('login');
    }
}
