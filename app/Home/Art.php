<?php

namespace App\Home;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Art;

class Phb extends Model
{
    protected $table = 'Arts';
    protected $pk     = 'id';
    protected $fillable = ['title','body','pic'];
}
