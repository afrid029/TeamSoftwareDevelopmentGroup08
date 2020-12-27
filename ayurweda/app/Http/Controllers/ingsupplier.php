<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ingsupplier extends Controller
{
    public function suphome($t){
        $c = DB::table('ingredient_suppliers')->where('Sup_id',$t)->first();
        return view('ingsup/supplier',compact('c'))->with('msg',"");
    }
    public function ingredientstock($t){
        $c = DB::table('ingredient_suppliers')->where('Sup_id',$t)->first();
        $p=DB::table('ingredients')->get();
        if($p==null){
            return view('ingsup/ingredients')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('ingsup/ingredients')->with('c',$c)->with('msg',"")->with('pres',$p);
        }     
    }
    public function ingordering($t){
        $c = DB::table('ingredient_suppliers')->where('Sup_id',$t)->first();
        $p=DB::table('ingredient_orderings')->get();
        if($p==null){
            return view('ingsup/ingorderings')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('ingsup/ingorderings')->with('c',$c)->with('msg',"")->with('pres',$p);
        }
    }
    
   
}
