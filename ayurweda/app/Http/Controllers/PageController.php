<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function login(){
        return view('login')->with('msg',"");
    }
    public function register(){
        $p=DB::table('patients')->get();
        $np=count($p)+1;
        $id="Pat".$np;
        return view('register')->with('msg',"")->with('id',$id);
    }
}
