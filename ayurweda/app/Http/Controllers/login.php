<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class login extends Controller
{
    public function log(Request $request){

      
            $password=DB::table('all_users')->where('id',$request->id)->value('password');
        $roll=DB::table('all_users')->where('id',$request->id)->value('roll');
   
        
        if(Hash::check($request->password, $password)){
            if($roll=="patient"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('pathome',['c'=>$request->id]);
            }
            elseif($roll=="doctor"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('dochome',['c'=>$request->id]);
            }
            elseif($roll=="pharmacist"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('phahome',['c'=>$request->id]);
                
            }
            elseif($roll=="producer"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('mphome',['c'=>$request->id]);

            }
            elseif($roll=="supplier"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('suphome',['c'=>$request->id]);

            }
            elseif($roll=="admin"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('adminpage',['c'=>$request->id]);
            }
            else{
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$request->id]);
                return redirect()->route('suphome',['c'=>$request->id]);

            }
        }
            else{
                return redirect()->back()->with('msg','Wrong password or username');
            }
    

        
    }

    public function enter($id){

      
          
        $roll=DB::table('all_users')->where('id',$id)->value('roll');
   
        
     
            if($roll=="patient"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('pathome',['c'=>$id]);
            }
            elseif($roll=="doctor"){
               session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('dochome',['c'=>$id]);
            }
            elseif($roll=="pharmacist"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('phahome',['c'=>$id]);
                
            }
            elseif($roll=="producer"){
               session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('mphome',['c'=>$id]);

            }
            elseif($roll=="supplier"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('suphome',['c'=>$id]);

            }
            elseif($roll=="admin"){
                session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('adminpage',['c'=>$id]);
            }
            else{
               session()->regenerate();
                $sid = session()->getId();
                session(['session'=>$sid]);
                session(['userid'=>$id]);
                return redirect()->route('suphome',['c'=>$id]);

            }
        
    

        
    }
}
