<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table       = 'users';
    public $primaryKey  = 'uid';
}
