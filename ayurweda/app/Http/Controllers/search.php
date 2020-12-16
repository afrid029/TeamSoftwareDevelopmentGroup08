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
        
        return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',$p);
        
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
        return view('doc/admitted')->with('c',$c)->with('msg',"")->with('ad',$p);
        
        
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
        
        return view('doc/AddPatsdetails')->with('c',$c)->with('msg',"")->with('ad',$p);
       
        
    }
    public function appsearch(Request $request){
        $td=DB::table('online_bookings')->where('Doc_id',$request->docid)->where('availableDate',date("Y-m-d"))->get();
        $na=count($td);
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        if($request->date!=""){
            $p=DB::table('online_bookings')->whereDate('availableDate',$request->date)->get();
        }
        else{
            $p=DB::table('online_bookings')->get();
        }
        return view('doc/appointments')->with('c',$c)->with('msg',"")->with('ad',$p)->with('na',$na);
        
        
    }
}
