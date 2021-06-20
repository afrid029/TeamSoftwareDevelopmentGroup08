<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

use App\Models\Doctor;
use App\Models\Pharmacist;
use App\Models\Medicine_producer;
use App\Models\Ingredient_supplier;
use App\Models\AllUsers;

class AdminController extends Controller
{
    //
    public function adminhome($id){
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c =  DB::table('admins')->where('id', $id)->first();
        
        return view('admin/admin',compact('c',))->with('msg',"");
    }

    public function adminedit(Request $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'name'=>'required',
            'phone' => 'required|digits:10',
            'email'=>'required',
            'opassword'=> 'required',
            'npassword' => 'required'
        ],
        [
            'name.required' => 'Name field required',
            'email.required' => 'Email is required',
            'phone.required'=> 'Phone field required',
            'phone.digits'=>'Enter a valid phone number',
            'opassword.required'=>'Old password is must',
            'npassword.required' => 'New Password or Re-type Old Password is must'
        ]);
        $pw = DB::table('admins')->where('id',$request->id)->value('password');
        $msg;
        
        if(Hash::check($request->opassword,$pw)){
           DB::table('admins')->where('id',$request->id)->update([
                'username' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
           ]);

           if(!Hash::check($request->npassword,$pw)){
                DB::table('admins')->where('id',$request->id)->update([
                    'password' =>Hash::make($request->npassword),
                    
                ]);

                DB::table('all_users')->where('id' , $request->id)->update([
                    'password' => Hash::make($request->npassword),
                ]);
           }

           $msg = "Profile Successfully Updated";

        }else{
            $msg = "Old Password Is Wrong";
        }

        return redirect()->back()->with('msg', $msg);
    }


///////////////////Registering a user/////////////////////////////////////////

    public function register($id){
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c =  DB::table('admins')->where('id', $id)->first();
        $users = DB::table('all_users')->orderBy('id','asc')->get();

        $doct = count(DB::table('doctors')->get())+1;
        $phar = count(DB::table('pharmacists')->get())+1;
        $prod = count(DB::table('medicine_producers')->get())+1;
        $supp = count(DB::table('ingredient_suppliers')->get())+1;

        return view('admin/reg',compact('c','users','doct','phar','prod','supp'));
    }

    public function addnew(Request $req)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->usid){
            return redirect()->route('login')->with('msg','Login First');
        }
        $req->validate([
            'roll' => 'required',
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'reemail'=>'required'
        ],[
            'roll.require'=>'Specify Aa roll',
            'password.required'=>'Password required',
            'name.required'=>'Name required',
            'email.required'=>'Email required'
        ]);
        if($req->email == $req->reemail){
             
        try{
        $to_name = $req->name;
        $to_email =$req->email ;
        $data = array('ID'=>$req->id, "password"=>$req->password);
        new sendMail($data);
  
        Mail::send('userdetails', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('User Name Password');
            $message->from('contact.helaweda@gmail.com','HelaWedaPiyasa Registration Details');


           
        });
        }catch(\Exception $ex){
            return redirect()->back()->with('msg','Check Your Network Connection');
        }
         if($req->roll=="Doctor"){
            $user = new Doctor;

            $user->Doc_id = $req->id;
            $user->Doc_name = $req->name;
            $user->password = Hash::make($req->password);
            $user->Doc_email = $req->email;

            $user->save();

            $user = new AllUsers;
            $user->id = $req->id;
            $user->password = Hash::make($req->password);
            $user->roll = "doctor" ;

            $user->save();  
           
        }else if($req->roll=="Pharmacist"){
            $user = new Pharmacist;

            $user->Phar_id = $req->id;
            $user->Phar_name = $req->name;
            $user->password = Hash::make($req->password);
            $user->Phar_email = $req->email;

            $user->save();

            $user = new AllUsers;
            $user->id = $req->id;
            $user->password = Hash::make($req->password);
            $user->roll = "pharmacist" ;

            $user->save();  
           
        }else if($req->roll=="Medicine Producer"){
            $user = new Medicine_producer;

            $user->Pro_id = $req->id;
            $user->Pro_name = $req->name;
            $user->password = Hash::make($req->password);
            $user->Pro_email = $req->email;

            $user->save();

            $user = new AllUsers;
            $user->id = $req->id;
            $user->password = Hash::make($req->password);
            $user->roll = "producer" ;

            $user->save();  
           
        }else if($req->roll=="Supplier"){
            $user = new Ingredient_supplier;

            $user->Sup_id = $req->id;
            $user->Sup_name = $req->name;
            $user->password =Hash::make($req->password);
            $user->Sup_email = $req->email;

            $user->save();

            $user = new AllUsers;
            $user->id = $req->id;
            $user->password = Hash::make($req->password);
            $user->roll = "supplier" ;

            $user->save();  
           
        }

        return redirect()->back()->with('msg','User Has Added and Sent User Details To '.$req->email.' For '.$req->roll);


        }
        else{
            return redirect()->back()->with('msg','Double Check Your Email');
        }
    
    }

    public function profit($id){
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c =  DB::table('admins')->where('id', $id)->first();
        $access = DB::table('pat_med_orderings')->where('status', 'Issued')->orderBy('created_at','desc');
       $access2 = DB::table('medical_histories')->where('issued','Issued');
        
        $patbill = $access->get();
        $patsum = $access->sum('bill');

        $drbill = $access2->get();
        $drsum = $access2->sum('bill');
        return view('admin/profit',compact('c','patbill','drbill','patsum','drsum'))->with( 'msg',"");
       
    }

    public function patbill(Request $req)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->aid){
            return redirect()->route('login')->with('msg','Login First');
        }
      
        $from = $req->from;
        $to = $req->to;

        $access;
        $patbil;
        $patsum;
    
        if($from && $to){
           $req->validate([
               'from'=>'required|date',
                'to' => 'required|date|after:from'
           ],[
               'to.after'=>'FROM and TO date combination is logically wrong'
           ]);
            $access = DB::table('pat_med_orderings')->where('status', 'Issued')->whereBetween('PatMedOrder_date',[$from, $to])->orderBy('created_at','desc');
            $patbill = $access->get();
            $patsum = $access->sum('bill');

        }else if($from){
            
            $access = DB::table('pat_med_orderings')->where('status', 'Issued')->where('PatMedOrder_date','>',$from)->orderBy('created_at','desc');
            $patbill = $access->get();
            $patsum = $access->sum('bill');
        }else if($to){
            $access = DB::table('pat_med_orderings')->where('status', 'Issued')->where('PatMedOrder_date','<',$to)->orderBy('created_at','desc');
            $patbill = $access->get();
            $patsum = $access->sum('bill');
        }else{
            
            return redirect()->back();
        }
        $c =  DB::table('admins')->where('id',$req->aid)->first();
        
       $access2 = DB::table('medical_histories')->where('issued','Issued');
            
        $drbill = $access2->get();
        $drsum = $access2->sum('bill');
        return view('admin/profit',compact('c','patbill','drbill','patsum','drsum'))->with( 'msg',"");

       
    }

    public function docbill(Request $req){
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->aid){
            return redirect()->route('login')->with('msg','Login First');
        }
        $from = ($req->from);
        $to = $req->to;

        $access2;
        $drbil;
        $drsum;

        if($from && $to){
           $req->validate([
               'from'=>'required|date',
                'to' => 'required|date|after:from'
                ],[
               'to.after'=>'FROM and TO date combination is logically wrong'
           ]);
            $access2 = DB::table('medical_histories')->where('issued', 'Issued')->whereBetween('date',[$from, $to])->orderBy('created_at','desc');
            $drbill = $access2->get();
            $drsum = $access2->sum('bill');
          

        }else if($from){
            
            $access2 = DB::table('medical_histories')->where('issued', 'Issued')->where('date','>',$from)->orderBy('created_at','desc');
            $drbill = $access2->get();
            $drsum = $access2->sum('bill');
            
            
        }else if($to){
            $access2 = DB::table('medical_histories')->where('issued', 'Issued')->where('date','<',$to)->orderBy('created_at','desc');
            $drbill = $access2->get();
            $drsum = $access2->sum('bill');
        }else{
           

            return redirect()->back();
            
        }
        $c =  DB::table('admins')->where('id', $req->aid)->first();
        $access = DB::table('pat_med_orderings')->where('status', 'Issued')->orderBy('created_at','desc');
      
        
        $patbill = $access->get();
        $patsum = $access->sum('bill');

       
        return view('admin/profit',compact('c','patbill','drbill','patsum','drsum'))->with( 'msg',"");

        
    }

    public function profview($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a){
            return redirect()->route('login')->with('msg','Login First');
        }
       
        $role  = DB::table('all_users')->where('id',$id)->value('roll');
        $d;
        $rl;
        $age = "";
        if($role == "doctor"){
            $d = DB::table('doctors')->where('Doc_id',$id)
                                    ->select('Doc_id as id','Doc_name as name','Doc_email as email','Doc_addr as address','Doc_pNum as phone','Doc_im as image')->first();
               $rl = "Doctor";
        }else if($role == "producer"){
            $d = DB::table('medicine_producers')->where('Pro_id',$id)
                                    ->select('Pro_id as id','Pro_name as name','Pro_email as email','Pro_addr as address','Pro_pNum as phone','Pro_im as image')->first();
            $rl = "Medicine Producer";
        }else if($role == "patient"){

            $today = date('Y-m-d');
            $dob = DB::table('patients')->where('Pat_id',$id)->value('dob');

            $age = abs(strtotime($today)-strtotime($dob));
            $age = floor($age/(365*60*60*24));

             $d = DB::table('patients')->where('Pat_id',$id)
                                    ->select('Pat_id as id','Pat_name as name','Pat_email as email','Pat_addr as address','Pat_pNum as phone','Pimage as image')->first();
            
            $rl = "Patient";
        }else if($role == "pharmacist"){
             $d = DB::table('pharmacists')->where('Phar_id',$id)
                                    ->select('Phar_id as id','Phar_name as name','Phar_email as email','Phar_addr as address','Phar_pNum as phone','PImage as image')->first();
            $rl = "Pharmacist";
        }
        else if($role == "admin"){
            return redirect()->route('adminpage',$id);
        }else{
            $d = DB::table('ingredient_suppliers')->where('Sup_id',$id)
                                    ->select('Sup_id as id','Sup_name as name','Sup_email as email','Sup_addr as address','Sup_pNum as phone','Sup_im as image')->first();   
            $rl = "Ingredient Supplier";
        }
        return view('admin/viewprofile',compact('d','rl','age'));
    }

    
}
