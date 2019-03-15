<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Goods;
class Users extends Model
{
    protected $table = 'users';
    protected $pk     = 'uid';
    protected $fillable = ['auth','sex','email','tel','upwd','uname','addr'];

         //一对多  商品表
    public function Many()
    {
        return $this->hasMany('app\Admin\Goods','cid');
    }

    // 一对多   订单表
        public function orders()
    {
        return $this->hasMany('app\Home\Orders','user_id');
    }
}
