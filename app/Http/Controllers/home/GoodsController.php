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
        // 显示页面
            return view('home.goods.detail',['goods'=>$goods]);
    }

    //   public function car(Request $request,$id)
    // {
    //    //dump($request->all());die;
    //     dd($request->input('cnt'));
    //     $goods = Goods::find($id);
    //     //dump($goods);die;
    //     $goods->cnt = $request->input('cnt');
    //     dump($goods);die;
    //     return view('home.goods.car',['goods'=>$goods]);

        
        
    // }
          public function orders()
    {
        // $goods = Goods::where('gid',$id)->first();
        if(true){
            return view('home.goods.orders');
        }
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
