<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Concerns;
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
        // 接受数据
        $data = $request->except('_token');

        //图片上传
        // 使用request 创建文件上传对象
        $images = $request -> file('images');
        // 获取文件后缀名
        $ext = $images->getClientOriginalExtension();
        // 处理文件名称
        $temp_name = str_random(20);
        $filename =  $temp_name.'.'.$ext;
        $dirname = date('Ymd',time());
        // 保存文件
        $res = $images -> move('./uploads/'.$dirname,$filename);

        $link = new Link;
        $link->title = $data['title'];
        $link->url = $data['url'];
        $link->images = trim($res->getpathName(),'.');
        $result = $link->save();
        // dump($result);die;
        // $res = Link::create($data);
         if($result){
            return redirect('/admin/link/index')->with('success','添加成功'); //跳转 并且附带信息
        }else{
            return back()->with('errors','添加失败');
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
        DB::beginTransaction();
        // $link = DB::table('link')->where('id',$id)->first();
        $link = DB::table('link')->where('id',$id)->update($request->except('_token'));
        //创建文件上传对象
        if($request->hasFile('images') == true){
            $images = $request -> file('images');
            $temp_name = time()+rand(1000,9999);
            $hz = $images -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            $dirname = date('Ymd',time());
            //保存文件
            $as = $images -> move('./uploads/'.$dirname,$filename);
            $link = new Link;
            $link->title = $link['title'];
            $link->url = $link['url'];
            $link->images = trim($as->getpathName(),'.');
            dump($as->getpathName());die;
            $result = $link->save();
            if($result){
                        return redirect('/admin/link/index')->with('success','修改成功'); //跳转 并且附带信息
                    }else{
                        return back()->with('error','修改失败'); //跳转 并且附带信息
                    }

        }else{
                    //如果不修改头像 查出数据库原有的图片
                    $data = Link::find($id);
                    // $res = Link::find($id)->update('url'=>$link['url'],'images'=>$data['images']]);
                    if($link){
                         DB::commit();
                        return redirect('/admin/link/index')->with('success','修改成功'); //跳转 并且附带信息
                    }else{
                        DB::rollBack();
                        return back()->with('error','修改失败'); //跳转 并且附带信息
                    }
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
