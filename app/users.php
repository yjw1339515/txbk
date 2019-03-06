<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $pk     = 'uid'; 
    protected $fillable = ['auth','sex','email','tel','upwd','uname'];
}
