<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Advices;
use Illuminate\Support\Facades\Storage;

class AdvicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// 显示模板
       return view('home/advices/index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// 获取数据
    	$data = $request->except('_token');
    	// 获取图片
    	$file = $request->file('gpic');
    	// 保存图片
        $file_name = $file->store('images');

        // 保存数据
        $advices = new Advices;
        $advices->type 		= $data['type'];
        $advices->content 	= $data['content'];
        $advices->reason 	= $data['reason'];
        $advices->gpic 		= $file_name;
        $res =  $advices->save();
        if($res){
                return redirect('/home/advices/index')->with('success','提交成功');
        }else{
                return back()->with('error','提交失败');
        }
    }
}
