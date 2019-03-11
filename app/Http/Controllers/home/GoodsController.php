<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Goods;
use App\Admin\Cart;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        // 接受数据
        $goods = Goods::where('id',$id)->first();
        // dump($goods);die;
        // 显示页面
            return view('home.goods.detail',['goods'=>$goods]);
    }
        


}
