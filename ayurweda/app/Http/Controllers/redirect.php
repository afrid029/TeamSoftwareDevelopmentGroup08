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
        return view('doc/prescription')->with('c',$c)->with('msg',"");
    }
    public function admitted($t){
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        return view('doc/admitted')->with('c',$c)->with('msg',"");
    }
    public function available($t){
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        return view('doc/available')->with('c',$c)->with('msg',"");
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
