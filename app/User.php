<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table= 'user';
    protected $primaryKey= 'username';
    protected $fillable= ['username','email','password','role'];
    protected $hidden=['password','remember_token'];
}
