<?php

namespace App\Home;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Phb;

class Phb extends Model
{
    protected $table = 'shop_goods';
    protected $pk     = 'id';
    protected $fillable = ['gname','gprice','gpic','gdesc','stock','tid'];
}
