<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Cates;
use App\Admin\Goods;
use App\Admin\Link;
use App\Admin\Lbts;
use App\Admin\Tjws;

class IndexController extends Controller
{
    public static function getPidCates($pid = 0)
    {
        // 获取一级分类
        $cates_data = Cates::where('pid',$pid)->get();
        $array = [];
        // 递归获取下级分类
        foreach ($cates_data as $k => $v ) {
            $v['sub'] = self::getPidCates($v->id);
            // 将获取的数据存入数组
            $array[] = $v;
        }
        // 返回数组
        return $array;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $link = Link::get();
        // dd($link);
        // 获取数据库信息
          $lbts = Lbts::all();
        $tjws = Tjws::all();
        return view('home.index.index',['show'=>true,'link'=>$link,'lbts'=>$lbts,'tjws'=>$tjws]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function lbts()
    // {
    //     $lbts = Lbts::all();
    //     $tjws = Tjws::all();
    //     return view('home.index.index',['lbts'=>$lbts,'tjws'=>$tjws]);
    // }



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
