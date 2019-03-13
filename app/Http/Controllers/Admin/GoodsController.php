<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Goods;
use DB;
use Illuminate\Support\Facades\Storage;
use  App\Http\Requests\StoreBlogPost;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        //获取显示的条数默认5
        $count = $request->input('count',5);
        //获取搜素框的文字
        $search = $request->input('search','');
        //根据内容搜索商品
        $data = Goods::where('gname','like','%'.$search.'%')->paginate($count);
            //返回数据
        return view('admin.goods.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {   
        //将商品信息压入闪存
         $request->flash(); 
            //接受数据
             $data = $request->except('_token');
           //创建文件对象
            $file = $request->file('gpic');
           $file_name = $file->store('images');
           // 添加商品信息
             $goods = new Goods;

            $goods->gname = $data['gname'];
            $goods->gprice = $data['gprice'];
            $goods->gpic = $file_name;
            $goods->status = $data['status'];
            $goods->stock = $data['stock'];
            $goods->gdesc = $data['gdesc'];
            $goods->cid = $data['cid'];
           $res =  $goods->save();
           //判断添加是否成功
        if($res){
                    return redirect('/goods')->with('success','添加成功');
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
        //获取修改的商品信息
        $data = Goods::find($id);
        return view('admin.goods.edit',['data'=>$data]);
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
       //接收传来的数据
       $data=$request->all();
        $goods = Goods::find($id);
       //判断是否有文件上传
         if ($request->hasFile('gpic')){
           $file_name = $goods->gpic;
           //删除原有的文件
        $res = Storage::delete($file_name);
        //将新图片保存
        $new_file =  $request->file('gpic')->store('images');
        $goods->gpic = $new_file;
        }
        //保存修改的其他信息
        $goods->gname = $data['gname'];
        $goods->gprice = $data['gprice'];
        $goods->status = $data['status'];
        $goods->stock = $data['stock'];
        $goods->gdesc = $data['gdesc'];
        $goods->cid = $data['cid'];
        $res = $goods->save();
        //判断是否修改成功
        if($res){
                    return redirect('/goods')->with('success','修改成功');
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
        //删除商品信息
            $res=Goods::destroy([$id]);

             if($res){
                    return redirect('/goods')->with('success','删除成功');
            }else{
                    return back()->with('error','删除失败');
            }
    }
}
