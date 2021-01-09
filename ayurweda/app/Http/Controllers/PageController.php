<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function login(){
        if(session()->get('session') == session()->getId()){
            return redirect()->route('enter',session()->get('userid'));
        }

        session()->regenerate();
        //session(['status'=>false]);
        return view('login')->with('msg',"");
    }
    public function logout(){
       session()->flush();
        session()->regenerate();
        //session(['status'=>false]);
        return redirect()->route('login')->with('msg',"Logout Successfully!");
    }
  
    public function register(){
        $p=DB::table('patients')->get();
        $np=count($p)+1;
        $id="pat".$np;
        return view('register')->with('msg',"")->with('id',$id);
    }
}
