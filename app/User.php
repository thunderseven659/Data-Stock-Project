<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $table= 'user';
    protected $primaryKey= 'username';
    protected $fillable= ['username','email','password','role'];
    protected $hidden=['password','remember_token'];
    public $incrementing= false;
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
