<?php

namespace App\Admin;
use App\Admin\Cates;
use App\Admin\Users;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $table = 'shop_goods';

      public $timestamps = false;

    // 多对一
      public function goods()
    {
        return $this->belongsTo('app\Admin\Cates','cid');
    }

    // 多对一
    public function users()
    {
        return $this->belongsTo('app\Admin\Users','uid');
    }

}
