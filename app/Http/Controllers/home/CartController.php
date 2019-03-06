<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Goods;
use App\Admin\Cart;
use App\Admin\Users;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function car(Request $request,$id)
    {
        // $data->$cnt = $request->input('_token');
        $data = Goods::find($id);
        $user = Users::find($id);
        $cart = new Cart;
        // $users->uname = $data['uname']; 
        $cart->gname = $data['gname'];
        $cart->cid = $data['id'];
        $cart->gprice = $data['gprice'];
        $cart->cnt = $request->input('cnt');
        $cart->gid = $user['uid'];
        dump($cart);die;

        $res = $cart->save();
        // $goods = Goods::find($id);
        // //dump($goods);die;
        // $goods->cnt = $request->input('cnt');
        // dump($goods);die;
        // return view('home.goods.car',['goods'=>$goods]);

        
        
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
