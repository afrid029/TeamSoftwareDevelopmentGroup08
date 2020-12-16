<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AllUsers;
use App\Models\Pharmacist;
use App\Models\Medicine_stock;

class pharmacistController extends Controller
{

    /*-----------------Pharmacist Home------------------------*/
    public function phaHome($id)
    {
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        return view('pharmacist/pharmacist',compact('c'))->with('msg', "");
    }

    public function phaEdit(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address' => 'required',
            'phone' => 'required|digits:10',
            'opassword'=> 'required',
            'npassword' => 'required'
        ],
        [
            'name.required' => 'Name field required',
            'address.required' => 'Address field required',
            'phone.required'=> 'Phone field required',
            'opassword.required'=>'Old password is must',
            'npassword.required' => 'New Password or Re-type Old Password is must'
        ]);
        $pw = DB::table('pharmacists')->where('Phar_id',$request->id)->value('password');
        $msg;
        if($pw == $request->opassword){
           DB::table('pharmacists')->where('Phar_id',$request->id)->update([
                'Phar_name' => $request->name,
                'Phar_addr' => $request->address,
                'Phar_pNum' => $request->phone,
           ]);

           if($pw !== $request->npassword){
                DB::table('pharmacists')->where('Phar_id',$request->id)->update([
                    'password' => $request->npassword,
                    
                ]);

                DB::table('all_users')->where('id' , $request->id)->update([
                    'password' => $request->npassword,
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
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        $med = DB::table('medicine_stocks')
                                            ->orderBy('Med_id','asc')
                                            ->get();
        $d = date('Y-m-d');
        $date = date('Y-m-d',strtotime("$d+7 days"));
        
        $warn = DB::table('medicine_stocks')->where('expireDate', '<=', $date)->select('Med_name','expireDate')->get();
        $warn1 = DB::table('medicine_stocks')->where('stock_qty', '<', 50)->select('Med_name','stock_qty')->get();
        return view('pharmacist/MedicalStock',compact('c','med','warn','warn1'))->with('msg', "");
    }

    public function AddMedicine(Request $req)
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
        
        $medi = new Medicine_stock;

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

    public function Updatemedicine(Request $req,$id)
    {
        DB::table('medicine_stocks')->where('Med_id',$req->medid)->update([
            'unitprice' => $req->uprice,
            'stock_qty'=> $req->qty,
            'manufactureDate' => $req->mfd,
            'expireDate' => $req->exp
        ]);
        return redirect()->back()->with('msg',"Medicine details updated");

    }

    public function DeleteMedicine(Request $req, $id)
    {
        DB::table('medicine_stocks')->where('Med_id',$req->delid)->delete();
        return redirect()->back()->with('msg',"Medicine deleted");
    }

    /*---------------------Issue Medicine--------------------*/
    public function issueMedicine($id)
    {
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        return view('pharmacist/IssueMedicine',compact('c'))->with('msg', "");
    }

    /*---------------------Order Medicine-------------------*/
    public function ordermedicine($id)
    {
        $c = DB::table('pharmacists')->where('Phar_id',$id)->first();
        return view('pharmacist/OrderMed',compact('c'))->with('msg', "");
    }
}
