<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function log(Request $request){

        $password=DB::table('all_users')->where('email',$request->email)->value('password');
        $roll=DB::table('all_users')->where('email',$request->email)->value('roll');
        if($password==$request->password){
            if($roll=="patient"){
                return view('patient');
            }
            elseif($roll=="doctor"){
                return view('doctor');
            }
            elseif($roll=="pharmacist"){
                return view('pharmacist');
            }
            elseif($roll=="producer"){
                return view('producer');
            }
            else{
                return view('supllier');
            }
        }
        else{
            return view('login')->with('msg','Wrong password or username');
        }
    }
}
