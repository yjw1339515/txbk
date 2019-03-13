<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lbts;
use App\Admin\Tjws;

class HomeController extends Controller
{
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lbts()
    {
    	$lbts = Lbts::all();
    	$tjws = Tjws::all();
        return view('home.index.index',['lbts'=>$lbts,'tjws'=>$tjws]);
    }



}
