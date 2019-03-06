<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
        protected $table = 'users';
    protected $pk     = 'uid'; 
    protected $fillable = ['auth','sex','email','tel','upwd','uname'];
}
