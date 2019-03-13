<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Advices;


class AdvicesController extends Controller
{


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =  Advices::all();
      

       return view('admin.advices.index',['data'=>$data]);
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
        //cong数据库获取信息
        $data = Advices::find($id);

            //软删除数据
         $res=$data->forceDelete();
        if($res){
                return redirect('/admin/advices')->with('success','删除成功');
        }else{
                return back()->with('error','删除失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //获取软删除的数据
          $data = Advices::onlyTrashed()->get();
          return view('admin.advices.reback',['data'=>$data]);
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
        //回复软删除的数据
         $res = Advices::withTrashed()
            ->where('id', $id)
            ->restore();
            //执行恢复操作
          if($res){
                return redirect('/admin/advices')->with('success','恢复成功');
        }else{
                return back()->with('error','恢复失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        //永久删除数据
        $res = Advices::destroy([$id]);
        if($res){
                return redirect('/admin/advices')->with('success','已审核');
        }else{
                return back()->with('error','审核失败');
        }
    }

    //  public function forever($id)
    // {
    //      $data = Advices::find($id);


    //      $res=$data->forceDelete();
    //     if($res){
    //             return redirect('/admin/advices')->with('success','删除成功');
    //     }else{
    //             return back()->with('error','删除失败');
    //     }
    // }


   
}
