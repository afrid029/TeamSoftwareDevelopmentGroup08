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
        $p=DB::table('doc_available_times')->get();
        if($p==null){
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',"")->with('ro',"");
        }
        else{
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',"");
        }
    }

    //patients redirection

    public function pathome($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        return view('pat/patient',compact('c'))->with('msg',"");
    }

    public function symp($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        return view('pat/symptomps',compact('c'))->with('msg',"");
    }

    public function order($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        return view('pat/ordermedicine',compact('c'))->with('msg',"");
    }

    public function book($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        return view('pat/booking',compact('c'))->with('msg',"");
    }
}
