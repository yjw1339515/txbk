<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Art;
use DB;
use Hash;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $data = Art::orderBy('id','asc')->get();
         return view('admin.art.index',['data'=>$data]);
     }

     public function create()
     {
         return view('admin.art.create');
     }

     public function store(Request $request)
     {
         // 接受数据
         $data = $request->except('_token');
         //图片上传
         // 使用request 创建文件上传对象
         $pic = $request -> file('pic');
         // 获取文件后缀名
         $ext = $pic->getClientOriginalExtension();
         // 处理文件名称
         $temp_name = str_random(20);
         $filename =  $temp_name.'.'.$ext;
         // $dirname = date('Ymd',time());
         // 保存文件
         $res = $pic -> move('./art',$filename);

         $art = new Art;
         $art->title = $data['title'];
         $art->body = $data['body'];
         $art->pic = trim(trim($res->getpathName(),'.'),'\\');
         $result = $art->save();

         // $res = Art::create($data);
          if($result){
             return redirect('/admin/art')->with('success','添加成功'); //跳转 并且附带信息
         }else{
             return back()->with('errors','添加失败');
         }
     }

     public function show($id)
     {
         //
     }

     public function edit($id)
     {
         $art = DB::table('arts')->find($id);
         return view('admin/art/edit',['art'=>$art]);
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
         DB::beginTransaction();
         $art = DB::table('arts')->where('id',$id)->update($request->except('_method','_token'));
         if($art){
             DB::commit();
             return redirect('admin/art')->with('success','修改成功!');
         }else{
             return back()->with('error','修改失败!');
         }
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request,$id)
     {
         $res = DB::table('arts')->where('id','=',$id)->delete();
         if($res){
             return redirect('admin/art')->with('success','删除成功!');
         }else{
             return back()->with('error','删除失败!');
         }
     }

}
