<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class search extends Controller
{
    //doctor
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
        $stocks = DB::table('medicine_stocks')->whereRaw('stock_qty - orders > 50')
        ->orderBy('Med_name','asc') 
      ->get();
        
        return redirect()->back()->with('pres1',$p);
        
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
       
        return redirect()->back()->with('ad1',$p);
        
        
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
        
        return redirect()->back()->with('ad1',$p);
       
        
    }
    public function appsearch(Request $request){
        $td=DB::table('online_bookings')->where('Doc_id',$request->docid)->where('availableDate',date("Y-m-d"))->get();
        $na=count($td);
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        if($request->date!=""){
            $p=DB::table('online_bookings')->where('Doc_id',$request->docid)->whereDate('availableDate',$request->date)->get();
        }
        else{
            $p=DB::table('online_bookings')->where('Doc_id',$request->docid)->get();
        }
        return redirect()->back()->with('ad1',$p);
        
        
    }

    //producer
    public function ordersearch(Request $request){
        if($request->supid!=""&&$request->date!=""){
            $p1=DB::table('ingredient_orderings')->where('Pro_id',$request->id)->where('Sup_id',$request->patid)->whereDate('created_at',$request->date)->get();
        }
        elseif($request->supid==""&&$request->date!=""){
            $p1=DB::table('ingredient_orderings')->where('Pro_id',$request->id)->whereDate('created_at',$request->date)->get();
        }
        elseif($request->supid!=""&&$request->date==""){
            $p1=DB::table('ingredient_orderings')->where('Pro_id',$request->id)->where('Sup_id',$request->supid)->get();
        }
        else{
            $p1=DB::table('ingredient_orderings')->where('Pro_id',$request->id)->get();
        }
        
        return redirect()->back()->with('p1',$p1);
        
        
    }

    public function issusearch(Request $request){
        if($request->pharid!=""&&$request->date!=""){
            $p1=DB::table('medicine_orderings')->where('Pro_id',$request->id)->where('Phar_id',$request->pharid)->whereDate('MedOrder_date',$request->date)->get();
        }
        elseif($request->pharid==""&&$request->date!=""){
            $p1=DB::table('medicine_orderings')->where('Pro_id',$request->id)->whereDate('MedOrder_date',$request->date)->get();
        }
        elseif($request->pharid!=""&&$request->date==""){
            $p1=DB::table('medicine_orderings')->where('Pro_id',$request->id)->where('Phar_id',$request->pharid)->get();
        }
        else{
            $p1=DB::table('medicine_orderings')->where('Pro_id',$request->id)->get();
        }
        
        return redirect()->back()->with('p1',$p1);
        
        
    }
}
