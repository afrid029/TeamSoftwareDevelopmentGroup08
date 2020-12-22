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
                $c=DB::table('doctors')->where('Doc_id',$request->id)->first();
                return view('doc/doctor')->with('c',$c)->with('msg',"");
            }
            elseif($roll=="pharmacist"){
                return redirect()->route('phahome',['c'=>$request->id]);
                
            }
            elseif($roll=="producer"){
                $c=DB::table('medicine_producers')->where('Pro_id',$request->id)->first();
                return view('medprod/producer')->with('c',$c)->with('msg',"");
            }
            else{
                $c=DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->first();
                return view('supllier/supllier')->with('c',$c)->with('msg',"");
            }
        }
        else{
            return redirect()->back()->with('msg','Wrong password or username');
        }
    }
}
