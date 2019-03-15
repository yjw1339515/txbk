<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'shop_orders';
    protected $pk     = 'oid';
    protected $fillable = ['sumprice','cnt','user_id','addr','tel','message','status'];
}
