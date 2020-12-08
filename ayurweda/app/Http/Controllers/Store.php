<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\AllUsers;
use App\Models\Medical_history;
use App\Models\Add_pat_up;
use App\Models\Doc_available_time;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Store extends Controller
{
    public function register(Request $request){

        //dd($request->all);
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

        $p=DB::table('medical_histories')->get();
        $np=count($p)+1;
        $pr=new Medical_history;
        $pr->Meeting_id="Pres".$np;
        $pr->Pat_id=$request->patientid;
        $pr->Doc_id=$request->docid;
        $pr->diagnosis=$request->diagnosis;
        $pr->disease=$request->disease;
        $pr->medicine=$request->medicine;
        $pr->save();
        $s="Prescription added successfully";
        $p=DB::table('medical_histories')->get();
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        if($p==null){
            return view('doc/prescription')->with('c',$c)->with('msg',"")->with('pres',"");
        }
        else{
            return view('doc/prescription')->with('c',$c)->with('msg',$s)->with('pres',$p);
        }
        
        
    }
    public function admit(Request $request){

        
        $a=new Add_pat_up;
        $a->Pat_id=$request->patientid;
        $a->Doc_id=$request->docid;
        $a->medicines=$request->medicine;
        $a->condition=$request->condition;
        $a->date=date("Y-m-d");
        $a->save();
        $s="Inserted successfully.";
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $p=DB::table('add_pat_ups')->get();
        if($p==null){
            return view('doc/admitted')->with('c',$c)->with('msg',"")->with('ad',"");
        }
        else{
            return view('doc/admitted')->with('c',$c)->with('msg',$s)->with('ad',$p);
        }
    }
        
    public function available(Request $request){

    
        $a=new Doc_available_time;
        $a->Doc_id=$request->docid;
        $a->availableDate=$request->date;
        $a->availableTime=$request->time;
        $a->save();
        $s="Inserted successfully.";
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $p=DB::table('doc_available_times')->where('Doc_id',$request->docid)->get();
        if($p==null){
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',"")->with('ro',"");
        }
        else{
            return view('doc/available')->with('c',$c)->with('msg',$s)->with('av',$p)->with('ro',"");
        }
    }

    
}
