<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Cates;
use DB;


class CatesController extends Controller
{
    public static function getCates()
    {   
        //新建一个表path与id连接临时表查询排序
         $cates_data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
         //遍历每个数据中有几个,得知是几级分类
       foreach($cates_data as $key=>$value){
          $n = substr_count($value->path,',');
          //|----与类名连接起来 
          $cates_data[$key]->cname = str_repeat('|----',$n).$value->cname;
       }
       //返回改变后的分类名
       return $cates_data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $cates_data = Cates::all();
      //使用静态变量调用函数获取数据
      return view('admin.cates.index',['cates_data'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {       
        //获取所要添加类别默认为顶级分类
          $cates_data =Cates::all();
        return view('admin.cates.create',['id'=>$id,'cates_data'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
         
            //接受数据
            $data = $request->all();
            //处理分类路径
            //顶级分类
             if($data['pid']==0){
                $data['path'] = 0;
             }else{
                //获取父级分类
                $parent_data = Cates::find($data['pid']);
                //获取父级分类的信息 path ,id
                 $data['path'] = $parent_data->path.','.$parent_data->id;
             }


             //添加分类
            $cates = new Cates;
            $cates->cname = $data['cname'];
            $cates->pid =  $data['pid'];
            $cates->path = $data['path'];
            //执行添加
            if($cates->save()){
                    return redirect('/cates')->with('success','添加成功');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取当前的地址栏的地址
        $url = $_SERVER['HTTP_REFERER'];
        //查看该分类下面是否有子级分类
        $child_data = Cates::where('pid',$id)->first();
        //有的话不能删除
        if($child_data) {
            
            return redirect("$url")->with('error','当前下面有子分类,不能删除');
             
        }
        //没有子级执行删除分类操作
        if(Cates::destroy($id)){
            return redirect('/cates')->with('success','删除成功');
        }else{
            return back('$url')->with('error','删除失败');
        }
       
    }
}
