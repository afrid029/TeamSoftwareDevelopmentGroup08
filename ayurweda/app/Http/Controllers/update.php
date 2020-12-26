<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\AllUsers;
use App\Models\add_symptomps;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class update extends Controller
{
    //doctor
    public function doc(Request $request){

        $request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'email'=>['required'],
            'opassword'=>['required'],
            'npassword'=>['required'],
        ],
        [
            'name.required' => 'Name is empty',
            'address.required' => 'Address is empty',
            'phone.required' => 'Phone is empty',
            'email.required' => 'Email is empty',
            'opassword.required' => 'New password is empty',
            'npassword.required' => 'Old Password is empty',
        ]);

        $p=DB::table('doctors')->where('Doc_id',$request->id)->value('password');
        if($request->opassword==$p){
            

            DB::table('doctors')->where('Doc_id',$request->id)->update(['Doc_name'=>$request->name,
                                                                        'Doc_addr'=>$request->address,
                                                                        'Doc_email'=>$request->email,
                                                                        'Doc_pNum'=>$request->phone,
                                                                        'password'=>$request->npassword]);
            DB::table('all_users')->where('id',$request->id)->update(['password'=>$request->npassword]);
            
            $s="Profile Successfully Updated";
        }
        else{
            $s="Old password is wrong";
        }
        return redirect()->back()->with('msg',$s);
        
    }

    public function avedit($id,$docid){
        $c=DB::table('doctors')->where('Doc_id',$docid)->first();
        $ro=DB::table('doc_available_times')->where('id',$id)->first();
        DB::table('doc_available_times')->where('id',$id)->delete();
        $p=DB::table('doc_available_times')->where('Doc_id',$docid)->get();
        
        return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',$ro);
        
    }
    public function avdelete($id,$docid){
        
        DB::table('doc_available_times')->where('id',$id)->delete();
        
        return redirect()->back()->with('msg',"");
        
    }

    
    public function docreply(Request $request)
    {
    
        DB::table('add_symptomps')->where('id',$request->id)->update(['reply'=>$request->reply]);
        return redirect()->route('docsymp',['c'=>$request->docid]);
    }
    public function docpic(Request $request)
    {
        $request->validate([
            'image'=>'required|image'
        ],[
            'image.required' => 'You have not choose any file',
            'image.image'=>'Only Image is allowed'
        ]);

            $name = time().rand(1,100).'.'.$request->image->extension();
            $request->image->move(public_path().'/upload/docprof', $name); 

            DB::table('doctors')->where('Doc_id',$request->id)->update([
                'Doc_im' => $name
            ]);
            $s="Profile picture changed";
        return redirect()->back()->with('msg',$s);
    }

    //producer
    public function pro(Request $request){

        $request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'opassword'=>['required'],
            'npassword'=>['required'],
        ],
        [
            'name.required' => 'Name is empty',
            'address.required' => 'Address is empty',
            'phone.required' => 'Phone is empty',
            'opassword.required' => 'New password is empty',
            'npassword.required' => 'Old Password is empty',
        ]);

        $p=DB::table('medicine_producers')->where('Pro_id',$request->id)->value('password');
        if($request->opassword==$p){
            
           

            DB::table('medicine_producers')->where('Pro_id',$request->id)->update(['Pro_name'=>$request->name,
                                                                        'Pro_addr'=>$request->address,
                                                                        'Pro_pNum'=>$request->phone,
                                                                        'password'=>$request->npassword]);
            DB::table('all_users')->where('id',$request->id)->update(['password'=>$request->npassword]);
            
            $s="Profile Successfully Updated";
        }
        else{
            $s="Old password is wrong";
        }
        return redirect()->back()->with('msg',$s);
        
    }

    public function proupdatemedicine(Request $req)
    {
        $req->validate([
            'uprice'=>['required'],
            'qty'=>['required'],
            'mfd'=>['required'],
            'exp'=>['required'],
        ],
        [
            'uprice.required' => 'Unit price is empty',
            'qty.required' => 'Quantity is empty',
            'mfd.required' => 'Manufacture date is empty',
            'exp.required' => 'Expire date is empty',
        ]);
        DB::table('new_med_stocks')->where('id',$req->id)->update([
            'unitprice' => $req->uprice,
            'stock_qty'=> $req->qty,
            'manufactureDate' => $req->mfd,
            'expireDate' => $req->exp
        ]);
        return redirect()->back()->with('msg',"Medicine details updated");

    }

    public function promeddelete($id)
    {
        DB::table('new_med_stocks')->where('id',$id)->delete();
        return redirect()->back()->with('msg',"Medicine deleted");
    }

    public function proupdateing(Request $req)
    {
        DB::table('ingredient_stocks')->where('id',$req->id)->update([
            'Ing_qty'=> $req->qty,
        ]);
        return redirect()->back()->with('msg',"Ingredient details updated");

    }

    public function proingdelete($id)
    {
        DB::table('ingredient_stocks')->where('id',$id)->delete();
        return redirect()->back()->with('msg',"Ingredient deleted");
    }

    public function propic(Request $request)
    {
        $request->validate([
            'image'=>'required|image'
        ],[
            'image.required' => 'You have not choose any file',
            'image.image'=>'Only Image is allowed'
        ]);

            $name = time().rand(1,100).'.'.$request->image->extension();
            $request->image->move(public_path().'/upload/proprof', $name); 

            DB::table('medicine_producers')->where('Pro_id',$request->id)->update([
                'Pro_im' => $name
            ]);
            
            return redirect()->back()->with('msg',"Profile Image is Successfully Updated");
    }
    public function reorder($id)
    {
            DB::table('medicine_orderings')->where('MedOrder_id',$id)->update([
                'status' =>"Recieved",
            ]);
            
            return redirect()->back();
    }
}
