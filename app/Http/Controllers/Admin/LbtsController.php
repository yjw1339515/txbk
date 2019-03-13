<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lbts;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\lbtxianding;

class LbtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据信息
        $data = Lbts::all(); 
        return view('admin.lbts.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.Lbts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(lbtxianding $request)
    {
        //创建文件对象
        $file = $request->file('logoname');
        //保存文件对象
        $file_name = $file->store('images');
        $data = $request->all();
        //保存信息
        $lbts = new Lbts;
        $lbts->title = $data['title'];
        $lbts->status = $data['status'];
        $lbts->link = $data['link'];
        $lbts->logoname = $file_name;
        $res = $lbts->save();
        //判断轮播图保存是否成功
        if($res){
            return redirect('/lbts')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
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
        //获取修改的信息
        $data = Lbts::find($id);
        return view('admin.lbts.edit',['data'=>$data]);
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
        //获取修改信息的数据
        $file = Lbts::find($id);
            //判断有没有文件上传
         if ($request->hasFile('logoname')) {
            //获取文件名
           $file_name = $file->logoname;
           //删除原来的图片
        $res = Storage::delete($file_name);
        //将新图片保存
        $new_file =  $request->file('logoname')->store('images');
        }else{
            $new_file = $file->logoname;
        }
        //保存其他信息
          $lbts = $request->all();
          $file->title = $lbts['title'];
          $file->status = $lbts['status'];
         
          $file->logoname = $new_file;
          $res2 = $file->save();
            //保存是否成功
             if($res2){
            return redirect('/lbts')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //删除信息
        $res = Lbts::destroy([$id]);
        //删除是否成功
          if($res){
            return redirect('/sets')->with('success','保存成功');
        }else{
            return back()->with('error','保存失败');
        }
    }
}
