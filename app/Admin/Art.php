<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'Arts';
    protected $pk     = 'id';
    protected $fillable = ['title','author','pic'];
}
