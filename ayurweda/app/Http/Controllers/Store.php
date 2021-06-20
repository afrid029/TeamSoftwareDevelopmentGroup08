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
use App\Models\Ingredient_ordering;
use App\Models\medicines;
use App\Models\ingredients;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class Store extends Controller
{
    //doctor
    public function register(Request $request){

        //dd($request->all);
        $request->validate([
            'name'=>['required'],
            'dob'=>['required'],
            'gender'=>['required'],
            'address'=>['required'],
            'phone'=>'required|digits:10',
            'guardian'=>['required'],
            'email'=>['required'],
            'password'=>'required|min:6',
            'rpassword'=>['required'],
        ],
        [
            'name.required' => 'Name is Required',
            'dob.required' => 'Date Of Birth Is Required',
            'gender.required' => 'Gender Is Required',
            'address.required' => 'Address Is Required',
            'phone.required' => 'Phone Number Is Required',
            'guardian.required' => 'Guardian Is Required',
            'email.required' => 'Email Is Required',
            'password.required' => 'Password Is Required',
            'rpassword.required' => 'Password Retype Is Empty',
            
        ]);
        if(DB::table('all_users')->where('id',$request->id)->first()){
            return redirect()->back()->with('reg', 'Another Patient Is Registered In This Id. Try Again');
        }
        

        $p=DB::table('patients')->get();
        $np=count($p)+1;
        
        if($request->password==$request->rpassword){
            $patient=new Patient;
            $user=new AllUsers;
            $patient->Pat_id="pat".$np;
            $patient->Pat_name=$request->name;
            $patient->Pat_email=$request->email;
            $patient->Pat_addr=$request->address;
            $patient->Pat_pNum=$request->phone;
            $patient->dob=$request->dob;
            $patient->gender=$request->gender;
            $patient->guardian=$request->guardian;
            $patient->password= Hash::make($request->password);
            $patient->save();

            $user->id="pat".$np;
            $user->password=Hash::make($request->password);
            $user->roll="patient";
            $user->save();
            $s="Registered Successfully.";
        }
        else{
            $s="Password Retype Is Wrong.";
            return redirect()->back()->with('msg',$s);
        }
        $p=DB::table('patients')->get();
        $np1=count($p)+1;
        $id="Pat".$np1;
        return redirect()->route('login')->with('msg',$s);
        
    }

    public function prescript(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->docid){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'patientid'=>['required'],
            'diagnosis'=>['required'],
            'disease'=>['required'],
            'medic'=>['required'],
        ],
        [
            'patientid.required' => 'Patient ID Is Required',
            'diagnosis.required' => 'Diagnosis is Required',
            'disease.required' => 'Disease is Required',
            'medic.required' => 'Medicine is Required',
        ]);

        $name;
        $bill = 0;

        $a = implode($request->medic);
        $b = explode(',',$a);
        
        for($i = 0 ; $i < count($b) ; $i++){
            if($i%2 == 0){
                $name = $b[$i];
            }else{
                $cnt = $b[$i];
                $unit = DB::table('medicine_stocks')->where('Med_name',$name)->value('unitprice');
                DB::table('medicine_stocks')->where('Med_name',$name)->increment('orders',$cnt);
                $bill = $bill + ($cnt*$unit);
            }

        }

        $p=DB::table('medical_histories')->get();
        $np=count($p)+1;
        try{
            $pr=new Medical_history;
            $pr->Meeting_id="Pres".$np;
            $pr->Pat_id=$request->patientid;
            $pr->Doc_id=$request->docid;
            $pr->date=date('Y-m-d');
            $pr->diagnosis=$request->diagnosis;
            $pr->bill=$bill;
            $pr->disease=$request->disease;
            $pr->medicine=json_encode($request->medic);
            $pr->save();
        }
        catch(\Illuminate\Database\QueryException $exception){
            $s="The Patient Doesn't Exist.";
            
        
            return redirect()->back()->with('msg',$s);
        }
        $s="Prescription Added Successfully";
        
        

        return redirect()->back()->with('msg',$s);

       

        
        
    }
    public function admit(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->docid){
            return redirect()->route('login')->with('msg','Login First');
        }

        $request->validate([
            'patientid'=>['required'],
            'medicine'=>['required'],
            'condition'=>['required'],
        ],
        [
            'patientid.required' => 'Patient ID Is Required',
            'medicine.required' => 'Medicine Is Required',
            'condition.required' => 'Condition Is Required',
        ]);
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
            $s="The Patient Doesn't Exist.";
            return redirect()->back()->with('msg',$s);
        }
        $s="Inserted Successfully.";
        
        return redirect()->back()->with('msg',$s);
        
    }
        
    public function available(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->docid){
            return redirect()->route('login')->with('msg','Login First');
        }

        $request->validate([
            'date'=>['required'],
            'time'=>['required'],
        ],
        [
            'date.required' => 'Date is Required',
            'time.required' => 'Time is Required',
        ]);
        $x=DB::table('doc_available_times')->where('Doc_id',$request->docid)->where('availableDate',$request->date)->where('availableTime',$request->time)->get();
        if(count($x)>0){
            $s="The Particular Time Is Already Exist.";
        }
        else{
            $a=new Doc_available_time;
            $a->Doc_id=$request->docid;
            $a->availableDate=$request->date;
            $a->availableTime=$request->time;
            $a->save();
            $s="Inserted Successfully.";
        }
        
        
        return redirect()->back()->with('msg',$s);
        
    }

    public function patadmit(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->docid){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'patid'=>['required'],
            'disease'=>['required'],
            'bedno'=>['required'],
        ],
        [
            'patid.required' => 'Patient ID is Required',
            'disease.required' => 'Disease is Required',
            'bedno.required' => 'Bed No. is Required',
        ]);

        try{
            $a=new Add_pat;
            $a->Pat_id=$request->patid;
            $a->Doc_id=$request->docid;
            $a->disease=$request->disease;
            $a->ad_date=date("Y-m-d");
            $a->status="Admitted";
            $a->bedno=$request->bedno;
            $a->save();
        }
        catch(\Illuminate\Database\QueryException $exception){
            $s="The Patient Doesn't Exist.";
            return redirect()->back()->with('msg',$s);
        }
        $s="Patient Admitted Successfully.";
        return redirect()->back()->with('msg',$s);
        
    }

    //producer
    public function proaddmedicine(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->id){
            return redirect()->route('login')->with('msg','Login First');
        }
       $valid =  $req->validate([
            'medname'=>'required',
            'uprice' => 'required',
            'qty' => 'required',
            'mfd' => 'required|date',
            'exp' => 'required|date|after:mfd',

        ],[
            'medname.required' => 'Medicine Name is Required',
            'uprice.required' => 'Set A Unit Price',
            'qty.required' => 'Set A Quantity',
            'mfd.required'=> 'MFD Required',
            'exp.required' => 'EXP Required',
            'exp.after' => 'Logically Date Combination Is Wrong'
        ]);
        $id=DB::table('medicines')->where('Med_name',$req->medname)->value('Med_id');
        $d=DB::table('medicines')->where('Med_name',$req->medname)->value('description');
        $medi = new new_med_stock;
        
        $medi->Pro_id = $req->id;
        $medi->Med_id = $id;
        $medi->Med_name = $req->medname;
        $medi->unitprice = $req->uprice;
        $medi->stock_qty = $req->qty;
        $medi->manufactureDate = $req->mfd;
        $medi->expireDate = $req->exp;
        $medi->description = $d;

        $medi->save();

        return redirect()->back()->with('msg',"New Medicine Added");
       

    }

    public function proadding(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->id){
            return redirect()->route('login')->with('msg','Login First');
        }
       $valid =  $req->validate([
            'ingname'=>'required',
            'qty' => 'required',

        ],[
            'ingname.required' => 'Ingredient Name is Required',
            'qty.required' => 'Set A Quantity',
        ]);
        $id=DB::table('ingredients')->where('Ing_name',$req->ingname)->value('Ing_id');
        $ing = new Ingredient_stock;
        
        $ing->Pro_id = $req->id;
        $ing->Ing_id = $id;
        $ing->Ing_name = $req->ingname;
        $ing->Ing_qty = $req->qty;

        $ing->save();

        return redirect()->back()->with('msg',"New Ingredient Added");
       

    }

    public function proingorder(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->id){
            return redirect()->route('login')->with('msg','Login First');
        }
       $valid =  $req->validate([
            'order'=>'required',

        ],[
            'order.required' => 'Order Is Required',
        ]);
        $ord = new Ingredient_ordering;
        
        $ord->Ingredients = $req->order;
        $ord->Pro_id = $req->id;
        $ord->Sup_id = $req->supid;
        $ord->IngOrder_date=date('Y-m-d');
        
        $ord->save();

    

        return redirect()->back()->with('msg',"Your Order Is Placed");
       

    }
    public function newmedicine(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->id){
            return redirect()->route('login')->with('msg','Login First');
        }
       $valid =  $req->validate([
            'medname'=>'required',
            'descr'=>'required',

        ],[
            'medname.required' => 'Name Is Required',
            'descr.required' => 'Description Is Required',
        ]);
        $n=DB::table('medicines')->get();
        $no=count($n)+1;
        $med = new medicines;
        
        $med->Med_id = "med".$no;
        $med->Med_name = $req->medname;
        $med->description = $req->descr;
        $med->save();
        return redirect()->back()->with('msg',"New Medicine Added Successfully");
    }

    //supplier
    public function newingredient(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->id){
            return redirect()->route('login')->with('msg','Login First');
        }
       $valid =  $req->validate([
            'ingname'=>'required',
            'descr'=>'required',

        ],[
            'ingname.required' => 'Ingredient Name Is Required',
            'descr.required' => 'Description Is Required',
        ]);
        $n=DB::table('ingredients')->get();
        $no=count($n)+1;
        $ing = new ingredients;
        
        $ing->Ing_id = "ing".$no;
        $ing->Ing_name = $req->ingname;
        $ing->description = $req->descr;
        $ing->save();
        return redirect()->back()->with('msg',"New Ingredient Has Added Successfully");
    }
}
