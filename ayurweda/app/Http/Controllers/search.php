<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class search extends Controller
{
    public function pressearch(Request $request){
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        if($request->patid!=""&&$request->date!=""){
            $p=DB::table('medical_histories')->where('Pat_id',$request->patid)->whereDate('created_at',$request->date)->get();
        }
        elseif($request->patid==""&&$request->date!=""){
            $p=DB::table('medical_histories')->whereDate('created_at',$request->date)->get();
        }
        elseif($request->patid!=""&&$request->date==""){
            $p=DB::table('medical_histories')->where('Pat_id',$request->patid)->get();
        }
        else{
            $p=DB::table('medical_histories')->get();
        }
        if($p==null){
            return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',$p);
        }
        
    }

    public function adsearch(Request $request){
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        if($request->patid!=""&&$request->date!=""){
            $p=DB::table('add_pat_ups')->where('Pat_id',$request->patid)->whereDate('created_at',$request->date)->get();
        }
        elseif($request->patid==""&&$request->date!=""){
            $p=DB::table('add_pat_ups')->whereDate('created_at',$request->date)->get();
        }
        elseif($request->patid!=""&&$request->date==""){
            $p=DB::table('add_pat_ups')->where('Pat_id',$request->patid)->get();
        }
        else{
            $p=DB::table('add_pat_ups')->get();
        }
        if($p==null){
            return view('doc/admitted')->with('c',$c)->with('msg',"")->with('ad',"");
        }
        else{
            return view('doc/admitted')->with('c',$c)->with('msg',"")->with('ad',$p);
        }
        
    }

    public function admitsearch(Request $request){
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        if($request->patid!=""&&$request->date!=""){
            $p=DB::table('add_pats')->where('Pat_id',$request->patid)->whereDate('ad_date',$request->date)->get();
        }
        elseif($request->patid==""&&$request->date!=""){
            $p=DB::table('add_pats')->whereDate('ad_date',$request->date)->get();
        }
        elseif($request->patid!=""&&$request->date==""){
            $p=DB::table('add_pats')->where('Pat_id',$request->patid)->get();
        }
        else{
            $p=DB::table('add_pats')->get();
        }
        if($p==null){
            return view('doc/AddPatsdetails')->with('c',$c)->with('msg',"")->with('ad',"");
        }
        else{
            return view('doc/AddPatsdetails')->with('c',$c)->with('msg',"")->with('ad',$p);
        }
        
    }
}
