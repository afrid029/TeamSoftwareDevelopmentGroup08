<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function log(Request $request){

        $password=DB::table('all_users')->where('id',$request->id)->value('password');
        $roll=DB::table('all_users')->where('id',$request->id)->value('roll');
        if($password==$request->password){
            if($roll=="patient"){
                return redirect()->route('pathome',['c'=>$request->id]);
            }
            elseif($roll=="doctor"){
                return redirect()->route('dochome',['c'=>$request->id]);
            }
            elseif($roll=="pharmacist"){
                return redirect()->route('phahome',['c'=>$request->id]);
                
            }
            elseif($roll=="producer"){
                return redirect()->route('mphome',['c'=>$request->id]);

            }
            elseif($roll=="supplier"){
                return redirect()->route('suphome',['c'=>$request->id]);

            }
            elseif($roll=="admin"){

                return redirect()->route('adminpage',['c'=>$request->id]);
            }
            else{
                return redirect()->route('suphome',['c'=>$request->id]);

            }
        }
        else{
            return redirect()->back()->with('msg','Wrong password or username');
        }
    }
}
