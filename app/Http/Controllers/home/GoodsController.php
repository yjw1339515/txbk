<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Goods;
<<<<<<< HEAD
use App\Admin\Cart;
=======
>>>>>>> origin/xiaoqi

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
<<<<<<< HEAD
        // 接受数据
        $goods = Goods::where('id',$id)->first();
        // dump($goods);die;
        // 显示页面
            return view('home.goods.detail',['goods'=>$goods]);
=======
        
        $goods = Goods::where('gid',$id)->first();
        if(true){
            return view('home.goods.detail');
        } 
>>>>>>> origin/xiaoqi
    }
        


}
