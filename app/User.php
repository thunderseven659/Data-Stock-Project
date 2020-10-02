<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table= 'user';
    protected $primaryKey= 'username';
    protected $fillable= ['username','email','password','role'];
    protected $hidden=['password','remember_token'];
    static function insert($username, $email, $password)
    {
        User::create([
            'username'=> $username,
            'email'=> $email,
            'password'=> Hash::make($password),
            'role'=> 'member'
        ]);
    }
}
