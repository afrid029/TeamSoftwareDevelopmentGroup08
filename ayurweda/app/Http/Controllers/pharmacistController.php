<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\AllUsers;
use App\Models\Pharmacist;
use App\Models\Medicine_stock;
use App\Models\Medicine_ordering;

class pharmacistController extends Controller
{

    /*-----------------Pharmacist Home------------------------*/
    public function phaHome($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        return view('pharmacist/pharmacist',compact('c'))->with('msg', "");
    }

    public function phaEdit(Request $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'name'=>'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required|digits:10',
            'opassword'=> 'required',
            'npassword' => 'required'
        ],
        [
            'name.required' => 'Name field required',
            'address.required' => 'Address field required',
            'phone.required'=> 'Phone field required',
            'phone.digits'=>'Enter a valid phone number',
            'opassword.required'=>'Old password is must',
            'npassword.required' => 'New Password or Re-type Old Password is must'
        ]);
        $pw = DB::table('pharmacists')->where('Phar_id',$request->id)->value('password');
        $msg;
        if(Hash::check($request->opassword,$pw)){
           DB::table('pharmacists')->where('Phar_id',$request->id)->update([
                'Phar_name' => $request->name,
                'Phar_addr' => $request->address,
                'Phar_pNum' => $request->phone,
                'Phar_email' => $request->email,
           ]);

           if(!Hash::check($request->npassword,$pw)){
                DB::table('pharmacists')->where('Phar_id',$request->id)->update([
                    'password' => Hash::make($request->npassword)
                    
                ]);

                DB::table('all_users')->where('id' , $request->id)->update([
                    'password' =>Hash::make( $request->npassword)
                ]);
           }

           $msg = "Profile Successfully Updated";

        }else{
            $msg = "Old password is wrong";
        }

        return redirect()->back()->with('msg', $msg);
    }

    public function pharprofilepicture(Request $request, $id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'profile'=>'required|image'
        ],[
            'profile.required' => 'You have not choose any file',
            'profile.image'=>'Only Image is allowed'
        ]);

            $name = time().rand(1,100).'.'.$request->profile->extension();
            $request->profile->move(public_path().'/upload/profile', $name); 

            DB::table('pharmacists')->where('Phar_id',$id)->update([
                'PImage' => $name
            ]);

            return redirect()->back()->with('msg',"Profile Image is Successfully Updated");
    }

    /*----------------------Maintain Medical Stock-----------------*/
    public function medicalstock($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        $med = DB::table('medicine_stocks')
                                            ->orderBy('Med_name','asc')
                                            ->get();
        $d = date('Y-m-d');
        $date = date('Y-m-d',strtotime("$d+7 days"));
        
        $warn = DB::table('medicine_stocks')->where('expireDate', '<=', $date)->select('Med_name','expireDate')->get();
        $warn1 = DB::table('medicine_stocks')->whereRaw('stock_qty - orders < Wlimit')->select('Med_name','stock_qty')->get();

        $allmedi = DB::table('medicines')->orderBy('Med_name','asc')->get();
        return view('pharmacist/MedicalStock',compact('c','med','warn','warn1','allmedi'))->with('msg', "");
    }

    public function AddMedicine(Request $req)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->usid){
            return redirect()->route('login')->with('msg','Login First');
        }
       $valid =  $req->validate([
            'medid'=>'required',
            'medname'=>'required',
            'uprice' => 'required|gt:0',
            'qty' => 'required|gt:0',
            'mfd' => 'required|date',
            'exp' => 'required|date|after:mfd',
            'descr' => 'required',
            'warn'=> 'required'

        ],[
            'medid.required' => 'Medicine ID missing',
            'medname.required' => 'Medicine Name is missing',
            'uprice.required' => 'Set a unit price',
            'uprice.gt'=> 'Price should be in positive',
            'qty.gt'=> 'Quantity should be in positive',
            'qty.required' => 'Set a Quantity',
            'mfd.required'=> 'MFD required',
            'exp.required' => 'EXP required',
            'descr.required' => 'Decription required',
            'exp.after' => 'Logically date combination is wrong',
            'warn.required'=>'Set Warning Limit'
        ]);

        $check = count(DB::table('medicine_stocks')->where('Med_id',$req->medid)->get());
        if($check == 1){
             return redirect()->back()->with('msg1',$req->medname." Is Already In Your Stock. You May Update It Or Delete It Before Add");
        }else{

        
        
        $medi = new Medicine_stock;

        $medi->Med_id = $req->medid;
        $medi->Med_name = $req->medname;
        $medi->unitprice = $req->uprice;
        $medi->stock_qty = $req->qty;
        $medi->manufactureDate = $req->mfd;
        $medi->expireDate = $req->exp;
        $medi->description = $req->descr;
        $medi->Wlimit = $req->warn;

        $medi->save();

        return redirect()->back()->with('msg',"New Medicine Added");
        }
       

    }

    public function Updatemedicine(Request $req,$id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $valid =  $req->validate([
            
            
            'uprice' => 'required|gt:0',
            'qty' => 'required|gt:0',
            'mfd' => 'required|date',
            'exp' => 'required|date|after:mfd',
            'warn'=> 'required'
            

        ],[
            
           
            'uprice.required' => 'Set a unit price',
            'uprice.gt'=> 'Price should be in positive',
            'qty.gt'=> 'Quantity should be in positive',
            'qty.required' => 'Set a Quantity',
            'mfd.required'=> 'MFD required',
            'exp.required' => 'EXP required',
            'warn.required'=>'Set Warning Limit',
            'exp.after' => 'Logically date combination is wrong'
        ]);
        DB::table('medicine_stocks')->where('Med_id',$req->medid)->update([
            'unitprice' => $req->uprice,
            'stock_qty'=> $req->qty,
            'manufactureDate' => $req->mfd,
            'expireDate' => $req->exp,
            'Wlimit'=>$req->warn
        ]);
        return redirect()->back()->with('msg',"Medicine details updated");

    }

    public function DeleteMedicine(Request $req, $id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        DB::table('medicine_stocks')->where('Med_id',$req->delid)->delete();
        return redirect()->back()->with('msg',"Medicine deleted");
    }

    /*---------------------Issue Medicine--------------------*/
    public function issueMedicine($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        $pat = DB::table('pat_med_orderings')->orderBy('status','desc')->orderBy('created_at','desc')->get();
        $doc = DB::table('medical_histories')->orderBy('issued','desc')->orderBy('created_at','desc')->get();
        $pa = DB::table('patients')->orderBy('Pat_name','asc')->get();

      
       
       
        return view('pharmacist/IssueMedicine',compact('c','pat','doc','pa'))->with('orbill','ok')->with('msg', "");
    }

    public function issuepatorder(Request $req,$id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $count = $req->count;
        $name;
        
        
        for($i = 0 ; $i < $count ; $i++){
            if($i%2 == 0){
                $name = $req->get('medi'.$i);
            }else{
                $cnt = $req->get('qt'.$i);
                
                DB::table('medicine_stocks')->where('Med_name',$name)->decrement('stock_qty',$cnt);
                DB::table('medicine_stocks')->where('Med_name',$name)->decrement('orders',$cnt);

                

            }
        }

        DB::table('pat_med_orderings')->where('PatMedOrder_id', $req->orid)->update([ 'status'=>'Issued']);
        return redirect()->back()->with('msg','Order Issued');
    }

    public function issuedocorder(Request $req,$id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $count = $req->countdr;
        $name;
        
        for($i = 0 ; $i < $count ; $i++){
            if($i%2 == 0){
                $name = $req->get('drmedic'.$i);
            }else{
                $cnt = $req->get('drqt'.$i);
             
                DB::table('medicine_stocks')->where('Med_name',$name)->decrement('stock_qty',$cnt);
                DB::table('medicine_stocks')->where('Med_name',$name)->decrement('orders',$cnt);

                
            }
        }

        DB::table('medical_histories')->where('Meeting_id', $req->drmid)->update([ 'issued'=>'Issued']);
        return redirect()->back()->with('msg','Order Issued');
    }
    

    /*---------------------Order Medicine-------------------*/
    public function ordermedicine($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        $stocks = DB::table('medicines')->orderBy('Med_name','asc') 
                                              ->get();
        $orders = DB::table('medicine_orderings')->where('Phar_id',$id)
                                                ->orderBy('status','desc')
                                                ->orderBy('created_at','desc')
                                                ->get();

        $prod = DB::table('medicine_producers')->get();
        return view('pharmacist/OrderMed',compact('c','orders','stocks','prod'))->with('msg', "");
    }

    public function oredertopro(Request $req, $id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
       $ord = new Medicine_ordering;
       $cnt = count(DB::table('medicine_orderings')->get());

       $ord->MedOrder_id ="M_Ord".($cnt+1).rand(1,50);
       $ord->medicines = json_encode($req->orders);
       $ord->Pro_id = $req->ptid;
       $ord->Phar_id = $id;
       $ord->MedOrder_date = date('Y-m-d');

       $ord->save();

       return redirect()->back()->with('msg','Your Order Is sent To '.$req->ptnm);
    }
}
