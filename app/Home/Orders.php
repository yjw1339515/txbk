<?php

namespace App\Home;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Goods;

class Orders extends Model
{
    protected $table = 'shop_orders';
    protected $pk      = 'oid';

    // 订单主表(Orders)与详情主表(Details)的关联: 一对多
    public function details()
    {
    	return $this->hasMany('Details','orders_oid','oid'); 
    }

    public static function createOrder($goods)
    {
    	// dump($goods);die;
    	//开启事务
    	DB::beginTransaction();
    	// // 添加购买时间字段
     //        $created_at = Goods::where('gid',$id)->get('created_at');
     //        dump($created_at);die;
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

        public static function delOrdersByOid($oid)
    {
         return DB::table('shop_orders')->where('oid', '=', $oid)->get();
    }

    //修改订单状态
    public static function updateStatusByOid($oid,$status)
    {
         return DB::table('shop_orders')->where('oid', '=', $oid)->update(['status' => $status]);
    }
}
