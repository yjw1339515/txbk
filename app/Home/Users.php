<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $pk     = 'uid';
    protected $fillable = ['sex','email','tel','uname','addr','ucall','birth'];
}
