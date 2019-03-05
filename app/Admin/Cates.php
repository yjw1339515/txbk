<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Goods;

class Cates extends Model
{
    public $table='shop_cates';
    public $pk='id';
   
     //一对多
    public function Many()
    {
        return $this->hasMany('app\Admin\Goods','cid');
    }
}
