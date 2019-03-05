<?php

namespace App\Http\Controllers\home;

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
        // 显示模板
        return view('home.login.login');
    }

    /**
     *登录验证
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
        
        // 添加到session
       if($users){
            session('homeFlag',true);
            
            session('homeUsers',$users[0]);
            // $data = $request->session()->all();
            // dd($data);die;
            return redirect('/home/index/index')->with('success','添加成功!');
        }
        
    }
     /**
     *登录验证
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regist()
    {
        // 显示模板
        return view('home.login.regist');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}