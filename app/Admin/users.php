<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Goods;
class Users extends Model
{
    protected $table = 'users';
    protected $pk     = 'uid';
    protected $fillable = ['auth','sex','email','tel','upwd','uname','addr'];

         //一对多
    public function Many()
    {
        return $this->hasMany('app\Admin\Goods','cid');
    }
}
