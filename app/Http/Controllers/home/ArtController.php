<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Art;
use DB;
use Hash;

class ArtController extends Controller
{
    public function index()
    {
        $data = Art::orderBy('id','asc')->get();
        return view('home\Art\index',['data'=>$data]);
    }

}
