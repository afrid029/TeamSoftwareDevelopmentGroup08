<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class redirect extends Controller
{
    //doctor

    public function dochome($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        return view('doc/doctor')->with('c',$c)->with('msg',"");
    }
    public function prescription($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $p=DB::table('medical_histories')->get();
        $stocks = DB::table('medicine_stocks')->whereRaw('stock_qty - orders > 50')
                                            ->orderBy('Med_name','asc') 
                                            ->get();
        $pa = DB::table('patients')->orderBy('Pat_name','asc')->get();
        return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',$p)->with('stocks',$stocks)->with('pa',$pa);
        
    }
    public function admitted($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $medicines = DB::table('medicines')->get();
        $p=DB::table('add_pat_ups')->get();
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        return view('doc/admitted')->with('c',$c)->with('msg',"")->with('medicines',$medicines)->with('ad',$p);
        
    }
    public function available($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $p=DB::table('doc_available_times')->where('Doc_id',$t)->get();
        
        return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',"");
        
    }
    public function addpatdetails($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $p=DB::table('add_pats')->get();
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        
        return view('doc/AddPatsdetails')->with('c',$c)->with('msg',"")->with('ad',$p);
        
    }
    public function docsymp($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $d = DB::table('add_symptomps')->where('Doc_id',$t)->orderBy('created_at','desc')->get();
        $pa = DB::table('patients')->orderBy('Pat_name','asc')->get();
        return view('doc/docsymptoms',compact('c','d','pa'))->with('msg',"");
    }
    public function show($id,$id2)
    {
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('doctors')->where('Doc_id',$id2)->first();
        $e = DB::table('add_symptomps')->where('id',$id)->first();
        return view('doc/view',compact('c','e'));
    }

    public function appointment($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $td=DB::table('online_bookings')->where('Doc_id',$t)->where('availableDate',date("Y-m-d"))->get();
        $na=count($td);
        $p=DB::table('online_bookings')
                                        ->join('patients','patients.Pat_id','=','online_bookings.Pat_id')
                                        ->where('online_bookings.Doc_id',$t)->orderBy('online_bookings.created_at','desc')
                                        ->select('online_bookings.*','patients.Pat_name as name')
                                        ->get();
        $c=DB::table('doctors')->where('Doc_id',$t)->first();
        $pa = DB::table('patients')->orderBy('Pat_name','asc')->get();
        
        return view('doc/appointments')->with('c',$c)->with('msg',"")->with('ad',$p)->with('na',$na)->with('pa',$pa);
        
    }

    //producer

    public function mphome($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        return view('medprod/producer',compact('c'))->with('msg',"");
    }
    public function issuemedicine($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('medicine_orderings')->where('Pro_id',$t)->get();
        $phr = DB::table('pharmacists')->orderBy('Phar_name','asc')->get();
        return view('medprod/Issuemed')->with('c',$c)->with('msg',"")->with('p',$p)->with('phr',$phr);
            
    }
    public function Ingstock($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $ingredients = DB::table('ingredients')->get();
        $ing=DB::table('ingredient_stocks')->where('Pro_id',$t)->get();
        return view('medprod/ingstock')->with('c',$c)->with('msg',"")->with('ing',$ing)->with('ingredients',$ingredients);
        
    }
    public function medstock($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $medicines = DB::table('medicines')->get();
        $med = DB::table('new_med_stocks')->where('Pro_id',$t)->get();
        return view('medprod/medstock')->with('c',$c)->with('msg',"")->with('med',$med)->with('medicines',$medicines);
        
    }
    public function ordering($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $ingredients = DB::table('ingredients')->get();
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('ingredient_orderings')->where('Pro_id',$t)->get();
        $sup = DB::table('ingredient_suppliers')->orderBy('Sup_name','asc')->get();
        return view('medprod/ordering')->with('c',$c)->with('msg',"")->with('p',$p)->with('ingredients',$ingredients)->with('sup',$sup);
        
    }
    public function medicines($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('medicine_producers')->where('Pro_id',$t)->first();
        $p=DB::table('medicines')->get();
        return view('medprod/medicine')->with('c',$c)->with('msg',"")->with('p',$p);
            
    }

    //supplier
    public function suphome($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('ingredient_suppliers')->where('Sup_id',$t)->first();
        return view('sup/supplier',compact('c'))->with('msg',"");
    }
    public function issueing($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('ingredient_suppliers')->where('Sup_id',$t)->first();
        $p=DB::table('ingredient_orderings')
                                            ->join('medicine_producers','medicine_producers.Pro_id','=','ingredient_orderings.Pro_id')
                                            ->where('ingredient_orderings.Sup_id',$t)
                                            ->select('ingredient_orderings.*','medicine_producers.Pro_name as name')
                                            ->get();
        $prod = DB::table('medicine_producers')->orderBy('Pro_name','asc')->get();
        return view('sup/ingorderings')->with('c',$c)->with('msg',"")->with('p',$p)->with('prod',$prod);
            
    }
    public function newing($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('ingredient_suppliers')->where('Sup_id',$t)->first();
        $p=DB::table('ingredients')->get();
        return view('sup/ingredients')->with('c',$c)->with('msg',"")->with('p',$p);
            
    }

    public function adminhome($t){
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
        return view('admin/admin')->with('msg',"");
    }

    //forget password
    public function forgotp(){
        return view('forgot')->with('msg',"");
    }
}
