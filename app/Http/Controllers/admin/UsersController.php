<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use DB;
use Hash;
use App\Http\Requests\UsersStoreRequest;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $users = Users::where('uname','like','%'.$search.'%')->paginate($count);

        // dump($users);
        // 遍历显示表格
        return view('admin/users/index',['users'=>$users,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        // dump($request->all());die;
        DB::beginTransaction();
        // 接受数据
        $data = $request->except(['_token','reupwd']);

        $users = new Users;
        $users->uname = $data['uname']; 
        $users->auth = $data['auth']; 
        $users->sex = $data['sex']; 
        $users->upwd = Hash::make($data['upwd']); 
        $users->email = $data['email']; 
        $users->tel = $data['tel']; 
        $res = $users->save();

        if($res){
            return redirect('admin/users/index')->with('success','添加成功!');
        }else{
            DB::rollBack();
             return back()->with('error','添加失败!');
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

        $users = Users::where('uid',$id)->first();

        //显示模板 加载数据
        return view('admin.users.edit',['users'=>$users]);
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
        //
    }
}
