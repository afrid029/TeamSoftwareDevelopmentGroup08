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
        return redirect()->back()->with('msg',$s)->with('id',$id);
        
    }

    public function prescript(Request $request){
        $request->validate([
            'patientid'=>['required'],
            'diagnosis'=>['required'],
            'disease'=>['required'],
            'medic'=>['required'],
        ],
        [
            'patientid.required' => 'Patient ID is empty',
            'diagnosis.required' => 'Diagnosis is empty',
            'disease.required' => 'Disease is empty',
            'medic.required' => 'Medicine is empty',
        ]);

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
            
        
            return redirect()->back()->with('msg',$s);
        }
        $s="Prescription added successfully";
        
        

        return redirect()->back()->with('msg',$s);

       

        
        
    }
    public function admit(Request $request){

        $request->validate([
            'patientid'=>['required'],
            'medicine'=>['required'],
            'condition'=>['required'],
        ],
        [
            'patientid.required' => 'Patient ID is empty',
            'medicine.required' => 'Medicine is empty',
            'condition.required' => 'Condition is empty',
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
            $s="The patient doesn't exist.";
            return redirect()->back()>with('msg',$s);
        }
        $s="Inserted successfully.";
        
        return redirect()->back()->with('msg',$s);
        
    }
        
    public function available(Request $request){

        $request->validate([
            'date'=>['required'],
            'time'=>['required'],
        ],
        [
            'date.required' => 'Date is empty',
            'time.required' => 'Time is empty',
        ]);
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
        
        
        return redirect()->back()->with('msg',$s);
        
    }

    public function patadmit(Request $request){
        $request->validate([
            'patid'=>['required'],
            'disease'=>['required'],
            'bedno'=>['required'],
        ],
        [
            'patid.required' => 'Patient ID is empty',
            'disease.required' => 'Disease is empty',
            'bedno.required' => 'Bed no. is empty',
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
            $s="The patient doesn't exist.";
            return redirect()->back()->with('msg',$s);
        }
        $s="Patient admitted successfully.";
        return redirect()->back()->with('msg',$s);
        
    }

    //producer
    public function proaddmedicine(Request $req)
    {
       $valid =  $req->validate([
            'medname'=>'required',
            'uprice' => 'required',
            'qty' => 'required',
            'mfd' => 'required|date',
            'exp' => 'required|date|after:mfd',

        ],[
            'medname.required' => 'Medicine Name is missing',
            'uprice.required' => 'Set a unit price',
            'qty.required' => 'Set a Quantity',
            'mfd.required'=> 'MFD required',
            'exp.required' => 'EXP required',
            'exp.after' => 'Logically date combination is wrong'
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
       $valid =  $req->validate([
            'ingname'=>'required',
            'qty' => 'required',

        ],[
            'ingname.required' => 'Ingredient Name is missing',
            'qty.required' => 'Set a Quantity',
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
       $valid =  $req->validate([
            'order'=>'required',

        ],[
            'order.required' => 'Order is empty',
        ]);
        $ord = new Ingredient_ordering;
        
        $ord->Ingredients = $req->order;
        $ord->Pro_id = $req->id;
        $ord->Sup_id = $req->supid;
        $ord->IngOrder_date=date('Y-m-d');
        
        $ord->save();

    

        return redirect()->back()->with('msg',"Your Order is placed");
       

    }
    public function newmedicine(Request $req)
    {
       $valid =  $req->validate([
            'medname'=>'required',
            'descr'=>'required',

        ],[
            'medname.required' => 'Name is empty',
            'descr.required' => 'Description is empty',
        ]);
        $n=DB::table('medicines')->get();
        $no=count($n)+1;
        $med = new medicines;
        
        $med->Med_id = "med".$no;
        $med->Med_name = $req->medname;
        $med->description = $req->descr;
        $med->save();
        return redirect()->back()->with('msg',"New medicine added successfully");
    }

    //supplier
    public function newingredient(Request $req)
    {
       $valid =  $req->validate([
            'ingname'=>'required',
            'descr'=>'required',

        ],[
            'ingname.required' => 'Name is empty',
            'descr.required' => 'Description is empty',
        ]);
        $n=DB::table('ingredients')->get();
        $no=count($n)+1;
        $ing = new ingredients;
        
        $ing->Ing_id = "ing".$no;
        $ing->Ing_name = $req->ingname;
        $ing->description = $req->descr;
        $ing->save();
        return redirect()->back()->with('msg',"New ingredient added successfully");
    }
}
