<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advices extends Model
{
	 use SoftDeletes;
    public $table ='advices';
}
