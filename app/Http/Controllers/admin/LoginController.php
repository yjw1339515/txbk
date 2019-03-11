<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use Hash;
use App\Http\Requests\LoginStoreRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //显示模板
        return view('admin.login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(LoginStoreRequest $request)
    {
       // 获取用户名
        $uname = $request->input('uname');
        // 获取密码
        $upwd = $request->input('upwd');
        
        // 通过用户名获取数据
        $users = Users::where('uname','=', $uname)->get();


        // 密码对比
        if (!Hash::check($upwd, $users[0]->upwd)) {
            // 密码对比...
            return back()->with('error','密码错误!');
        }
        
        // 判断users是否有数据
        if($users){
            $data = $users[0];
            //把数据存入session
            session(['homeUsers'=> $data]); 
            // 成功后跳转
            return redirect('/admin')->with('success','登录成功!');
        } 
      
    }
    /**
     *登录验证
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
       
       session()->flush();

        return redirect('/admin/login')->with('success','退出成功!');
    }
}
