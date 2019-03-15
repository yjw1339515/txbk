<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public $table = 'shop_details';
    public $pkj    = 'did';

    // 设置详情表与订单主表的关联: 多对一
    public function orders()
    {
    	return $this->belongsTo('Orders','orders_oid','oid');
    }
}
