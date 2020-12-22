<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\AllUsers;
use App\Models\Medical_history;
use App\Models\Add_pat_up;
use App\Models\Add_pat;
use App\Models\Doc_available_time;
use App\Models\new_med_stock;
use App\Models\Ingredient_stock;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Store extends Controller
{
    //doctor
    public function register(Request $request){

        //dd($request->all);
        $request->validate([
            'name'=>['required'],
            'age'=>['required'],
            'gender'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'guardian'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
            'rpassword'=>['required'],
        ],
        [
            'name.required' => 'Name is empty',
            'age.required' => 'Age is empty',
            'gender.required' => 'Gender is empty',
            'address.required' => 'Address is empty',
            'phone.required' => 'Phone is empty',
            'guardian.required' => 'Guardian is empty',
            'email.required' => 'Email is empty',
            'password.required' => 'Password is empty',
            'rpassword.required' => 'Password retype is empty'
        ]);

        $p=DB::table('patients')->get();
        $np=count($p)+1;
        $patient=new Patient;
        $user=new AllUsers;
        if($request->password==$request->rpassword){
            $patient->Pat_id="Pat".$np;
            $patient->Pat_name=$request->name;
            $patient->Pat_email=$request->email;
            $patient->Pat_addr=$request->address;
            $patient->Pat_pNum=$request->phone;
            $patient->age=$request->age;
            $patient->gender=$request->gender;
            $patient->guardian=$request->guardian;
            $patient->password=$request->password;
            $patient->save();

            $user->id="Pat".$np;
            $user->password=$request->password;
            $user->roll="patient";
            $user->save();
            $s="Registered successfully.";
        }
        else{
            $s="Password retype is wrong.";
        }
        $p=DB::table('patients')->get();
        $np1=count($p)+1;
        $id="Pat".$np1;
        return view('register')->with('msg',$s)->with('id',$id);
        
    }

    public function prescript(Request $request){

        $name;

        $a = implode($request->medic);
        $b = explode(',',$a);
        
        for($i = 0 ; $i < count($b) ; $i++){
            if($i%2 == 0){
                $name = $b[$i];
            }else{
                $cnt = $b[$i];
                DB::table('medicine_stocks')->where('Med_name',$name)->increment('orders',$cnt);
            }
        }

        $p=DB::table('medical_histories')->get();
        $np=count($p)+1;
        try{
            $pr=new Medical_history;
            $pr->Meeting_id="Pres".$np;
            $pr->Pat_id=$request->patientid;
            $pr->Doc_id=$request->docid;
            $pr->diagnosis=$request->diagnosis;
            $pr->disease=$request->disease;
            $pr->medicine=json_encode($request->medic);
            $pr->save();
        }
        catch(\Illuminate\Database\QueryException $exception){
            $s="The patient doesn't exist.";
            $p=DB::table('medical_histories')->get();
            $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
            $stocks = DB::table('medicine_stocks')->whereRaw('stock_qty - orders > 50')
                                              ->orderBy('Med_name','asc') 
                                            ->get();
        
            return view('doc/prescription')->with('c',$c)->with('msg',$s)->with('pres',$p)->with('stocks',$stocks);;
        }
        $s="Prescription added successfully";
        $p=DB::table('medical_histories')->get();
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $stocks = DB::table('medicine_stocks')->whereRaw('stock_qty - orders > 50')
                                              ->orderBy('Med_name','asc') 
                                            ->get();
        

        return redirect()->back()->with('c',$c)->with('msg',$s)->with('pres',$p)->with('stocks',$stocks);

       

        
        
    }
    public function admit(Request $request){

        try{
            $a=new Add_pat_up;
            $a->Pat_id=$request->patientid;
            $a->Doc_id=$request->docid;
            $a->medicines=$request->medicine;
            $a->condition=$request->condition;
            $a->date=date("Y-m-d");
            $a->save();
        }
        catch(\Illuminate\Database\QueryException $exception){
            $s="The patient doesn't exist.";
            $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
            $p=DB::table('add_pat_ups')->get();
            return view('doc/admitted')->with('c',$c)->with('msg',$s)->with('ad',$p);
        }
        $s="Inserted successfully.";
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $p=DB::table('add_pat_ups')->get();
        return view('doc/admitted')->with('c',$c)->with('msg',$s)->with('ad',$p);
        
    }
        
    public function available(Request $request){

        $x=DB::table('doc_available_times')->where('Doc_id',$request->docid)->where('availableDate',$request->date)->where('availableTime',$request->time)->get();
        if(count($x)>0){
            $s="The perticular time is already exist.";
        }
        else{
            $a=new Doc_available_time;
            $a->Doc_id=$request->docid;
            $a->availableDate=$request->date;
            $a->availableTime=$request->time;
            $a->save();
            $s="Inserted successfully.";
        }
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $p=DB::table('doc_available_times')->where('Doc_id',$request->docid)->get();
        
        
        return view('doc/available')->with('c',$c)->with('msg',$s)->with('av',$p)->with('ro',"");
        
    }

    public function patadmit(Request $request){

        try{
            $a=new Add_pat;
            $a->Pat_id=$request->patid;
            $a->Doc_id=$request->docid;
            $a->disease=$request->disease;
            $a->ad_date=date("Y-m-d");
            $a->disch_date=$request->ddate;
            $a->bedno=$request->bedno;
            $a->save();
        }
        catch(\Illuminate\Database\QueryException $exception){
            $s="The patient doesn't exist.";
            $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
            $p=DB::table('add_pats')->get();
            return view('doc/AddPatsdetails')->with('c',$c)->with('msg',$s)->with('ad',$p);
        }
        $s="Patient admitted successfully.";
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $p=DB::table('add_pats')->get();
        return view('doc/AddPatsdetails')->with('c',$c)->with('msg',$s)->with('ad',$p);
        
    }

    //producer
    public function proaddmedicine(Request $req)
    {
       $valid =  $req->validate([
            'medid'=>'required',
            'medname'=>'required',
            'uprice' => 'required',
            'qty' => 'required',
            'mfd' => 'required|date',
            'exp' => 'required|date|after:mfd',
            'descr' => 'required'

        ],[
            'medid.required' => 'Medicine ID missing',
            'medname.required' => 'Medicine Name is missing',
            'uprice.required' => 'Set a unit price',
            'qty.required' => 'Set a Quantity',
            'mfd.required'=> 'MFD required',
            'exp.required' => 'EXP required',
            'descr.required' => 'Decription required',
            'exp.after' => 'Logically date combination is wrong'
        ]);
        
        $medi = new new_med_stock;
        
        $medi->Pro_id = $req->id;
        $medi->Med_id = $req->medid;
        $medi->Med_name = $req->medname;
        $medi->unitprice = $req->uprice;
        $medi->stock_qty = $req->qty;
        $medi->manufactureDate = $req->mfd;
        $medi->expireDate = $req->exp;
        $medi->description = $req->descr;

        $medi->save();

        return redirect()->back()->with('msg',"New Medicine Added");
       

    }

    public function proadding(Request $req)
    {
       $valid =  $req->validate([
            'ingid'=>'required',
            'ingname'=>'required',
            'qty' => 'required',

        ],[
            'ingid.required' => 'Ingredient ID missing',
            'ingname.required' => 'Ingredient Name is missing',
            'qty.required' => 'Set a Quantity',
        ]);
        
        $ing = new Ingredient_stock;
        
        $ing->Pro_id = $req->id;
        $ing->Ing_id = $req->ingid;
        $ing->Ing_name = $req->ingname;
        $ing->Ing_qty = $req->qty;

        $ing->save();

        return redirect()->back()->with('msg',"New Ingredient Added");
       

    }
}
