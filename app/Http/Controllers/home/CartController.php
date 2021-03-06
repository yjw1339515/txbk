<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Goods;
use App\Admin\Cart;
use App\Admin\Users;
use App\Home\Orders;
use App\Home\Details;
use DB;

class CartController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcar(Request $request)
    {

        // session_start();
        // $_SESSION['car'] = [];

        $gid = $request->input('gid');
        $cnt = $request->input('cnt');
        //查询数据库 该商品是否存在
        $goods = Goods::where('id',$gid)->first();
        //数据库商品如果不存在
        if (!$goods){
            $return = [
                "code"=>"0",
                "msg" => "商品不存在",
                "data"=>[]
            ];
            echo json_encode($return);die;
        }

        //如果购物车内该商品不存在
        if( !array_key_exists('car',$_SESSION) ) {
            $_SESSION["car"][$gid]  = [
                "gid" => $gid,
                "gname" => $goods["gname"],
                "cnt" => $cnt,
                "gpic" => $goods["gpic"],
                "gprice" => $goods["gprice"],
            ];
        }else{
            if (!array_key_exists($gid, $_SESSION["car"])) {
                $_SESSION["car"][$gid] = [
                    "gid" => $gid,
                    "gname" => $goods["gname"],
                    "cnt" => $cnt,
                    "gpic" => $goods["gpic"],
                    "gprice" => $goods["gprice"],
                ];
            }else{
                $_SESSION["car"][$gid]["cnt"] += $cnt;
            }
        }
        $return = [
            "code"=>"1",
            "msg" => "商品已加入购物车",
            "data"=>[]
        ];
        echo json_encode($return);die;
    }
    public static function getCarGoods()
    {
        session_start();
        $sumprice = 0;
         if (!array_key_exists("car", $_SESSION)) {
            $goods = [];
        }else{
          $goods = $_SESSION['car'];  
            // dump($goods);
          foreach($goods as $k=>$v){
            // dump($goods);
            $sumprice += $v["cnt"]*$v["gprice"];
            // dump($sumprice);die;

          }
        }
        return $goods;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function car(Request $request)
    {
        // session_start();
        $sumprice = 0;
         if (!array_key_exists("car", $_SESSION)) {
            $goods = [];
        }else{
          $goods = $_SESSION['car'];  
            // dump($goods);
          foreach($goods as $k=>$v){
            // dump($goods);
            $sumprice += $v["cnt"]*$v["gprice"];
            // dump($sumprice);die;

          }
        }

         return view('home/goods/car',['goods'=>$goods,'sumprice'=>$sumprice]); 
    }
    public function goodsUpdate(Request $request)
    {
        // session_start();
        $gid = $request->input('gid');
        $cnt = $request->input('cnt');
        $gprice = $request->input('gprice');
        $_SESSION["car"][$gid]["cnt"] = $cnt;
        $sum = 0;
        
        foreach($_SESSION["car"] as $k=>$v){
            $sum += $v['cnt']*$v['gprice'];
        }
        $data['code'] = 200;
        $data['sum'] = $sum;
        $data['gprice'] = $gprice;

         return response()->json(['data'=>$data]);

    }
    // 删除指定id的商品
    public function destroy(Request $request)
    {

        // session_start();
        $id = $request->input('gid');
        if (array_key_exists($id,$_SESSION['car'])) {
            unset($_SESSION['car'][$id]);

            $data['code'] = 200;
            $data['message'] = '删除成功';
            return response()->json(['data'=>$data]);
        }else{
            $data['code'] = 300;
            $data['message'] = '商品不在购物车中';
            return response()->json(['data'=>$data]);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Reponse
     */
    public function orders()
    {
        // session_start();
        $goods = $_SESSION['car'];

        // $users =DB::table('Users')->get();
        $sum = 0;
        foreach($_SESSION["car"] as $k=>$v){
            $sum += $v['cnt']*$v['gprice'];
        }
        return view('home/goods/orders',['goods'=>$goods,'sum'=>$sum]);
    }

   
    public function qry(Request $request)
    {
         DB::beginTransaction();
        // session_start();
       $goods =  $_SESSION['car'];
       $orders = Orders::createOrder($goods);
       unset($_SESSION['car']);
       // dump($orders);die;
       return view('home/goods/qry',['orders'=>$orders]);
    }

}
