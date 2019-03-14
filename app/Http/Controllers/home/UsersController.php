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
        $data2 = $request->except(['_token','x','y']);
        DB::beginTransaction();
        $users = DB::table('users')->where('uid',$id)->update($data2);
        if($users){
            DB::commit();
            return back();
        }else{
            DB::rollBack();
            return back();
        }
    }
}
