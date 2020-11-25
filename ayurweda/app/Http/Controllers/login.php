<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function log(Request $request){

        $password=DB::table('all_users')->where('id',$request->id)->value('password');
        $roll=DB::table('all_users')->where('id',$request->id)->value('roll');
        if($password==$request->password){
            if($roll=="patient"){
                $c=DB::table('patients')->where('Pat_id',$request->id)->first();
                return view('patient')->with('c',$c)->with('msg',"");
            }
            elseif($roll=="doctor"){
                $c=DB::table('doctors')->where('Doc_id',$request->id)->first();
                return view('doc/doctor')->with('c',$c)->with('msg',"");
            }
            elseif($roll=="pharmacist"){
                $c=DB::table('pharmacists')->where('Phar_id',$request->id)->first();
                return view('pharmacist')->with('c',$c)->with('msg',"");
            }
            elseif($roll=="producer"){
                $c=DB::table('medicine_producers')->where('Pro_id',$request->id)->first();
                return view('producer')->with('c',$c)->with('msg',"");
            }
            else{
                $c=DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->first();
                return view('supllier')->with('c',$c)->with('msg',"");
            }
        }
        else{
            return view('login')->with('msg','Wrong password or username');
        }
    }
}
