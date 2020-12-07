<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medproducer extends Controller
{
    public function mphome($t){
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        return view('medprod/producer',compact('c'))->with('msg',"");
    }
    public function issuemedicine($t){
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('medicine_orderings')->get();
        if($p==null){
            return view('medprod/Issuemed')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('medprod/Issuemed')->with('c',$c)->with('msg',"")->with('pres',$p);
        }     
    }
    public function Ingstock($t){
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('ingredient_stocks')->get();
        if($p==null){
            return view('medprod/ingstock')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('medprod/ingstock')->with('c',$c)->with('msg',"")->with('pres',$p);
        }
    }
    public function medstock($t){
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('new_med_stocks')->get();
        if($p==null){
            return view('medprod/medstock')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('medprod/medstock')->with('c',$c)->with('msg',"")->with('pres',$p);
        }
    }
    public function ordering($t){
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('ingredient_orderings')->get();
        if($p==null){
            return view('medprod/ordering')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('medprod/ordering')->with('c',$c)->with('msg',"")->with('pres',$p);
        }
    }

   
}
