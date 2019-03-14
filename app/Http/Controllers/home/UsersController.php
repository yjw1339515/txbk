<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home\Users;
use DB;
use Hash;

class UsersController extends Controller
{
    public function index($id)
    {
        $users = users::where('uid',$id)->first();
        return view('home/users/index',['users'=>$users]);
    }

    public function update(Request $request, $id)
    {
        // $data = $request->all();
        $data = $request->except(['_token','x','y']);
        DB::beginTransaction();

           //创建文件对象
        $file = $request->file('photo');
        $file_name = $file->store('user');
           // 添加商品信息
        $goods = Users::find($id);
        $goods->ucall = $data['ucall'];
        $goods->photo = $file_name;
        $goods->sex = $data['sex'];
        $goods->birth = $data['birth'];
        $goods->email = $data['email'];
        $goods->tel = $data['tel'];
        $goods->addr = $data['addr'];
        $res =  $goods->save();

        if($res){
            DB::commit();
            return back();
        }else{
            DB::rollBack();
            return back();
        }
    }

}
