<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Sets;
use Illuminate\Support\Facades\Storage;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有数据
        $data = Sets::all();
        return view('admin.sets.index',['data'=>$data]);
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
    {    $data = Sets::find($id);  
        return view('admin.sets.edit',['data'=>$data]); 
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
        //查找所在的数据
         $file =Sets::find($id);
        $data = $request->all();
        //创建文件对象
         if ($request->hasFile('logo')) {
           $file_name = $file->logo;
        //删除原有文件
         $res = Storage::delete($file_name);
         $new_file =  $request->file('logo')->store('images');
        //保存文件名
          $file->logo = $new_file;
        }
            //修改信息
          $file->xukezheng = $data['xukezheng'];
          $file->kefuphone = $data['kefuphone'];
          $file->weihu = $data['weihu'];
          $file->address = $data['address'];
          $file->beianhao = $data['beianhao'];
          $res2 = $file->save();

             if($res2){
            return redirect('/sets')->with('success','修改成功');
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
        //
    }
}
