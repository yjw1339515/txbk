<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Goods;
use App\Admin\Cates;
use App\Gz;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id = 0)
    {
        
        // 根据id获取信息
        $goods = Goods::where('cid','=',$id)->get();
        //获取商品名称
        $goods_gname = $goods[0]['gname'];
        
        //获取用户名称
        $data = session()->get('homeUsers');
        $uname = $data['uname'];
        // 根据商品名称和用户名回去数据
        $gz = Gz::where('gname','=',$goods_gname)->where('uname','=',$uname)->get();
        
        $count = $request->input('count',10);
        // 判断传值有就传到模板,没有就穿null
        if(!empty($gz[0])){
         // 显示模板,传送信息
            return view('/home/cates/index',['goods'=>$goods,'gz'=>$gz,'request'=>$request->all()]);
        }
        // 显示模板,传送信息
         return view('/home/cates/index',['goods'=>$goods,'gz'=>null,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $count = $request->input('count',10);
        $search = $request->input('search','');

        $data = Goods::where('gname','like','%'.$search.'%')->paginate($count);
        return view('/home/cates/index',['goods'=>$data,'request'=>$request->all()]);
        
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
