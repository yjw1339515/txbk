<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Art;
use Illuminate\Support\Facades\Storage;
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
         //接受传递的数据并保存
          $data = $request->all();
          //创建文件对象
          $file_name = $request->file('pic')->store('public');
          $create = new Art;
          $create->title = $data['title'];
          $create->body = $data['body'];
          $create->pic = $file_name;
          //保存数据
          $res = $create->save();
         if($res){
             return redirect('/admin/art')->with('success','添加成功');
         }else{
             return back()->with('error','添加失败');
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
         $file = Art::find($id);
         //判断是否有文件上传
         if ($request->hasFile('pic')){
           $file_name = $file->pic;
           //删除原来的文件图片
        $res = Storage::delete($file_name);
        //将图片保存在public中
        $new_file =  $request->file('pic')->store('public');
        }else{
            $new_file = $file->pic;
        }
       //修改数据
          $art = $request->all();
          //这是一条木有灵魂的注释
          $file->title = $art['title'];
          $file->body = $art['body'];
          $file->pic = $new_file;
          $res2 = $file->save();

             if($res2){
            return redirect('/admin/art')->with('success','修改成功');
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
