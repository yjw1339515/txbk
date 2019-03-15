<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gz;
use DB;
use App\Admin\Goods;
use App\Admin\Advices;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 通过session获取用户名
        $data = session()->get('homeUsers');
        $uname = $data['uname'];
        // 通过用户名获取数据
        $gz = Gz::where('uname','=',$uname)->get();
        // 显示模板,传送数据
        return view('/home/concern/index',['gz_data'=>$gz]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //获取前一页面的地址
        $url = $_SERVER['HTTP_REFERER'];
        //添加事物
        DB::beginTransaction();
        // 根据id获取数据
        $goods = Goods::find($id);
        $data_id = $goods['cid'];
        // 判断用户是否登录
        if(empty(session()->get('homeUsers'))){
        
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','添加成功');
            }else{
        } 
        // 获取用户名
        $data = session()->get('homeUsers');
        $uname = $data['uname'];
        //查看数据是否存在
        $data_uname = Gz::where('uname','=',$uname)->where('gname','=',$goods['gname'])->get();
        
        // 判断数据是否存在,不存在添加,否则删除
        if(empty($data_uname[0])){
            //将数据存入数据库
            $data_gz = new Gz;
            $data_gz->uname             = $uname;
            $data_gz->gname             = $goods['gname'];
            $data_gz->gpic              = $goods['gpic'];
            $data_gz->gprice            = $goods['gprice'];
            $data_gz->gid               = $goods['id'];
            $data_gz->created_at        = time();
            $res = $data_gz->save();
            if($res){
                DB::commit();
                return redirect($_SERVER['HTTP_REFERER'])->with('success','添加成功');
            }else{
                DB::rollBack();
                return back($_SERVER['HTTP_REFERER'])->with('error','添加失败');
            }
        } else {
            // 通过id获取数据并且删除
            $res = DB::table('shop_gz')->where('gid', '=', $id)->delete();
            if($res){
                DB::commit();
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功!');
            }else{
                DB::rollBack();
                 return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败!');
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
        //获取前一页面的地址
        $url = $_SERVER['HTTP_REFERER'];
        // 添加事物
        DB::beginTransaction();
        // 通过id删除数据
        $res = DB::table('shop_gz')->where('zid', '=', $id)->delete();
        if($res){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功!');
        }else{
            DB::rollBack();
             return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败!');
        } 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complaint()
    {
        // 显示模板
        return view('/home/concern/complaint');
    }
}
