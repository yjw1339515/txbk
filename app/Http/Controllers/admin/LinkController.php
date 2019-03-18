<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Concerns;
use Illuminate\Support\Facades\Storage;
use App\Admin\Link;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = DB::table('link')->get();
        // dump($link);die;
        return view('admin.link.index',['link'=>$link]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request)
     {
         //接受传递的数据并保存
          $data = $request->all();
          //创建文件对象
          $file_name = $request->file('images')->store('link');
          $create = new Link;
          $create->title = $data['title'];
          $create->url = $data['url'];
          $create->images = $file_name;
          //保存数据
          $res = $create->save();
         if($res){
             return redirect('/admin/link/index')->with('success','添加成功');
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
        $link = DB::table('link')->first();
        // $data = $request->except('_token');
        // dump($link);
        return view('admin/link/edit',['link'=>$link]);
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
         $file = Link::find($id);
         //判断是否有文件上传
         if ($request->hasFile('images')){
           $file_name = $file->images;
           //删除原来的文件图片
        $res = Storage::delete($file_name);
        //将图片保存在public中
        $new_file =  $request->file('images')->store('link');
        }else{
            $new_file = $file->images;
        }
       //修改数据
          $link = $request->all();
          //这是一条木有灵魂的注释
          $file->title=$link['title'];
          $file->url=$link['url'];
          $file->images = $new_file;
          $res2 = $file->save();

             if($res2){
            return redirect('/admin/link/index')->with('success','修改成功');
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
        $res = DB::table('link')->where('id','=',$id)->delete();
        // dump($res);
        if($res){
            return redirect('admin/link/index')->with('success','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }
}
