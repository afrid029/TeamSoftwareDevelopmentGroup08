<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class redirect extends Controller
{
    public function dochome($t){
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        return view('doc/doctor')->with('c',$c)->with('msg',"");
    }
    public function prescription($t){
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $p=DB::table('medical_histories')->get();
        if($p==null){
            return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',$p);
        }
        
    }
    public function admitted($t){
        $p=DB::table('add_pat_ups')->get();
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        if($p==null){
            return view('doc/admitted')->with('c',$c)->with('msg',"")->with('ad',"");
        }
        else{
            return view('doc/admitted')->with('c',$c)->with('msg',"")->with('ad',$p);
        }
    }
    public function available($t){
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $p=DB::table('doc_available_times')->where('Doc_id',$t)->get();
        if($p==null){
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',"")->with('ro',"");
        }
        else{
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',"");
        }
    }
    public function addpatdetails($t){
        $p=DB::table('add_pats')->get();
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        if($p==null){
            return view('doc/AddPatsdetails')->with('c',$c)->with('msg',"")->with('ad',"");
        }
        else{
            return view('doc/AddPatsdetails')->with('c',$c)->with('msg',"")->with('ad',$p);
        }
    }
    public function docsymp($t){
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $d = DB::table('add_symptomps')->where('Doc_id',$t)->orderBy('created_at','desc')->get();
        $pa = DB::table('patients')->get();
        return view('doc/docsymptoms',compact('c','d','pa'))->with('msg',"");
    }
    public function show($id,$id2)
    {
        $c = DB::table('doctors')->where('Doc_id',$id2)->first();
        $e = DB::table('add_symptomps')->where('id',$id)->first();
        return view('doc/view',compact('c','e'));
    }

    public function appointment($t){
        $td=DB::table('online_bookings')->where('Doc_id',$t)->where('availableDate',date("Y-m-d"))->get();
        $na=count($td);
        $p=DB::table('online_bookings')->where('Doc_id',$t)->orderBy('created_at','desc')->get();
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        if($p==null){
            return view('doc/appointments')->with('c',$c)->with('msg',"")->with('ad',"");
        }
        else{
            return view('doc/appointments')->with('c',$c)->with('msg',"")->with('ad',$p)->with('na',$na);
        }
    }
   
}
