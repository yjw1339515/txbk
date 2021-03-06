<?php

namespace App\Home;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Goods;

class Orders extends Model
{
    protected $table = 'shop_orders';
    protected $pk      = 'oid';
     public $timestamps = false; //不验证时间
    // 订单主表(Orders)与详情主表(Details)的关联: 一对多
    public function details()
    {
    	return $this->hasMany('Details','orders_oid','oid'); 
    }

    // 多对一   用户表
        public function user()
    {
       return $this->belongsTo('app\Admin\Users','user_id');
    }


    public static function createOrder($goods)
    {
    	// dump($goods);die;
    	//开启事务
    	DB::beginTransaction();

    	//添加主表信息
    	$sum = $cnt = $mark = 0;
    	$sn = date('YmdHis').mt_rand(1000,9999);
    	foreach ($goods as $key => $value) {
    		$sum += $value['gprice']*$value['cnt'];
    		$cnt += $value['cnt'];
                        // $created_at = $value['created_at'];
    		
    		$datas['orders_oid'] = $sn;
    		$datas['goods_gid']  = $value['gid'];
    		$datas['buy_price'] = $value['gprice'];
    		$datas['buy_cnt'] = $value['cnt'];


    		$res1 = DB::table('shop_details')->insert($datas);
    		if ($res1) {

    			continue;
    		}else{
    			// dump($key);die;

    			$mark ++;
    			DB::rollBack();
    			break;
    		}
    	}
    	$data['oid'] = $sn;
    	$data['sumprice'] = $sum;
    	$data['cnt']    = $cnt;
            $data['user_id']    = session("homeUsers.uid");
            $data['created_at'] = time();
    	$res = DB::table('shop_orders')->insert($data);

    	if ($res && $mark==0) {
    		DB::commit();
    		return true;
    	}else{
    		DB::rollBack();
    		return false;
    	}
    }

    //通过uid查找订单
    public static function findOrdersByUid($uid)
    {
         return DB::table('shop_orders')->where('user_id', '=', $uid)->get();
    }

    //通过uid查找用户中的地址
    public static function findUsersByUid($uid)
    {
         return DB::table('Users')->where('uid', '=', $uid)->get();
    }

    //修改订单状态
    public static function updateStatusByOid($oid,$status)
    {
         return DB::table('shop_orders')->where('oid', '=', $oid)->update(['status' => $status]);
    }
}
