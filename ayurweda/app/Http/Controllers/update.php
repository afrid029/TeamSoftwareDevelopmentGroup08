<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\AllUsers;
use App\Models\add_symptomps;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class update extends Controller
{
    //doctor
    public function doc(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }

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

        $pw=DB::table('doctors')->where('Doc_id',$request->id)->value('password');
        if(Hash::check($request->opassword,$pw)){
            

            DB::table('doctors')->where('Doc_id',$request->id)->update(['Doc_name'=>$request->name,
                                                                        'Doc_addr'=>$request->address,
                                                                        'Doc_email'=>$request->email,
                                                                        'Doc_pNum'=>$request->phone,
                                                                        'password'=>Hash::make($request->npassword)]);
            DB::table('all_users')->where('id',$request->id)->update(['password'=>Hash::make($request->npassword)]);
            
            $s="Profile Successfully Updated";
        }
        else{
            $s="Old password is wrong";
        }
        return redirect()->back()->with('msg',$s);
        
    }

    public function avedit(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->docid){
            return redirect()->route('login')->with('msg','Login First');
        }
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        DB::table('doc_available_times')->where('id',$request->id)->update(['availableDate'=>$request->date,
                                                                        'availableTime'=>$request->time,]);
        
        return redirect()->back()->with('msg',"Updated Successfully");
        
    }
    public function avdelete($id,$docid){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $docid){
            return redirect()->route('login')->with('msg','Login First');
        }
        
        DB::table('doc_available_times')->where('id',$id)->delete();
        
        return redirect()->back()->with('msg',"");
        
    }

    
    public function docreply(Request $request)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->docid){
            return redirect()->route('login')->with('msg','Login First');
        }
    
        DB::table('add_symptomps')->where('id',$request->id)->update(['reply'=>$request->reply]);
        return redirect()->route('docsymp',['c'=>$request->docid]);
    }
    public function docpic(Request $request)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'image'=>'required|image'
        ],[
            'image.required' => 'You have not choose any file',
            'image.image'=>'Only Image is allowed'
        ]);

            $name = $request->id.'.'.$request->image->extension();
            $request->image->move(public_path().'/upload/profile', $name); 

            DB::table('doctors')->where('Doc_id',$request->id)->update([
                'Doc_im' => $name
            ]);
            $s="Profile picture changed";
        return redirect()->back()->with('msg',$s);
    }

    public function discharge($id,$id2){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id2){
            return redirect()->route('login')->with('msg','Login First');
        }
        DB::table('add_pats')->where('id',$id)->update([
            'status' => "Discharged",
            'disch_date'=>date("Y-m-d"),
        ]);
        
        return redirect()->back()->with('msg',"Patient was discharged");
        
    }

    //producer
    public function pro(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }

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

        $pw=DB::table('medicine_producers')->where('Pro_id',$request->id)->value('password');
        if(Hash::check($request->opassword,$pw)){
            
           

            DB::table('medicine_producers')->where('Pro_id',$request->id)->update(['Pro_name'=>$request->name,
                                                                        'Pro_addr'=>$request->address,
                                                                        'Pro_pNum'=>$request->phone,
                                                                        'Pro_email'=>$request->email,
                                                                        'password'=>Hash::make($request->npassword)]);
            DB::table('all_users')->where('id',$request->id)->update(['password'=>Hash::make($request->npassword)]);
            
            $s="Profile Successfully Updated";
        }
        else{
            $s="Old password is wrong";
        }
        return redirect()->back()->with('msg',$s);
        
    }

    public function proupdatemedicine(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->proid){
            return redirect()->route('login')->with('msg','Login First');
        }
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

    public function promeddelete($id,$id2)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id2){
            return redirect()->route('login')->with('msg','Login First');
        }
        DB::table('new_med_stocks')->where('id',$id)->delete();
        return redirect()->back()->with('msg',"Medicine deleted");
    }

    public function proupdateing(Request $req)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $req->proid){
            return redirect()->route('login')->with('msg','Login First');
        }
        DB::table('ingredient_stocks')->where('id',$req->id)->update([
            'Ing_qty'=> $req->qty,
        ]);
        return redirect()->back()->with('msg',"Ingredient details updated");

    }

    public function proingdelete($id,$id1)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id1){
            return redirect()->route('login')->with('msg','Login First');
        }
        DB::table('ingredient_stocks')->where('id',$id)->delete();
        return redirect()->back()->with('msg',"Ingredient deleted");
    }

    public function propic(Request $request)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'image'=>'required|image'
        ],[
            'image.required' => 'You have not choose any file',
            'image.image'=>'Only Image is allowed'
        ]);

            $name = $request->id.'.'.$request->image->extension();
            $request->image->move(public_path().'/upload/profile', $name); 

            DB::table('medicine_producers')->where('Pro_id',$request->id)->update([
                'Pro_im' => $name
            ]);
            
            return redirect()->back()->with('msg',"Profile Image is Successfully Updated");
    }
    public function reorder($id,$id2)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id2){
            return redirect()->route('login')->with('msg','Login First');
        }
        $m=DB::table('medicine_orderings')->where('MedOrder_id',$id)->value('medicines');
        $a=explode(",",$m);
        $a=preg_replace("/[^a-zA-Z 0-9]+/","",$a);
        $msg="";
        for($i=0;$i<sizeof($a);$i+=2){
            $n=$a[$i];
            $v=(int)$a[$i+1];
            $qty=DB::table('new_med_stocks')->where('Med_name',$n)->value('stock_qty');
            $qty=$qty-$v;
            if($qty<0){
                $msg="not enough";
            }
        }
        if($msg==""){   
            for($i=0;$i<sizeof($a);$i+=2){
                $n=$a[$i];
                $v=(int)$a[$i+1];
                $qty=DB::table('new_med_stocks')->where('Med_name',$n)->value('stock_qty');
                $qty=$qty-$v;
                DB::table('new_med_stocks')->where('Med_name',$n)->update([
                    'stock_qty' =>$qty,
                ]);
                echo nl2br($n." ".$v."\r\n");
            }
            DB::table('medicine_orderings')->where('MedOrder_id',$id)->update([
                'status' =>"Issued",
            ]);
        }   
        
            
            return redirect()->back()->with('msg',$msg);
    }

    //supplier
    public function sup(Request $request){
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }

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

        $pw=DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->value('password');
        if(Hash::check($request->opassword,$pw)){
            

            DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->update(['Sup_name'=>$request->name,
                                                                        'Sup_addr'=>$request->address,
                                                                        'Sup_pNum'=>$request->phone,
                                                                        'Sup_email'=>$request->email,
                                                                        'password'=>Hash::make($request->npassword)]);
            DB::table('all_users')->where('id',$request->id)->update(['password'=>Hash::make($request->npassword)]);
            
            $s="Profile Successfully Updated";
        }
        else{
            $s="Old password is wrong";
        }
        return redirect()->back()->with('msg',$s);
        
    }
    public function suppic(Request $request)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
            'image'=>'required|image'
        ],[
            'image.required' => 'You have not choose any file',
            'image.image'=>'Only Image is allowed'
        ]);

            $name = $request->id.'.'.$request->image->extension();
            $request->image->move(public_path().'/upload/profile', $name); 

            DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->update([
                'Sup_im' => $name
            ]);
            
            return redirect()->back()->with('msg',"Profile Image is Successfully Updated");
    }
    public function supreorder($id,$id2)
    {
          $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id2){
            return redirect()->route('login')->with('msg','Login First');
        }
            DB::table('ingredient_orderings')->where('id',$id)->update([
                'status' =>"Issued",
            ]);
            
            return redirect()->back();
    }

    //forget password
    public function forgotpass(Request $request)
    {
        $roll=DB::table('all_users')->where('id',$request->id)->value('roll');
        if($roll=="patient"){
            $email=DB::table('patients')->where('Pat_id',$request->id)->value('Pat_email');
            if($email==$request->email){
                $password=rand(100000,1000000);
                DB::table('patients')->where('Pat_id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                DB::table('all_users')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                $s="Password reset successful";
            }
            else{
                $s="Email is wrong";
            }
        }
        elseif($roll=="doctor"){
            $email=DB::table('doctors')->where('Doc_id',$request->id)->value('Doc_email');
            if($email==$request->email){
                $password=rand(100000,1000000);
                DB::table('doctors')->where('Doc_id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                DB::table('all_users')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                $s="Password reset successful";
            }
            else{
                $s="Email is wrong";
            }
        }
        elseif($roll=="pharmacist"){
            $email=DB::table('pharmacists')->where('Phar_id',$request->id)->value('Phar_email');
            if($email==$request->email){
                $password=rand(100000,1000000);
                DB::table('pharmacists')->where('Phar_id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                DB::table('all_users')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                $s="Password reset successful";
            }
            else{
                $s="Email is wrong";
            }
            
        }
        elseif($roll=="producer"){
            $email=DB::table('medicine_producers')->where('Pro_id',$request->id)->value('Pro_email');
            if($email==$request->email){
                $password=rand(100000,1000000);
                DB::table('medicine_producers')->where('Pro_id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                DB::table('all_users')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                $s="Password reset successful";
            }
            else{
                $s="Email is wrong";
            }

        }
        elseif($roll=="supplier"){
            $email=DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->value('Sup_email');
            if($email==$request->email){
                $password=rand(100000,1000000);
                DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                DB::table('all_users')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                $s="Password reset successful";
            }
            else{
                $s="Email is wrong";
            }

        }
        elseif($roll=="admin"){
            $email=DB::table('admins')->where('id',$request->id)->value('email');
            if($email==$request->email){
                $password=rand(100000,1000000);
                DB::table('admins')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                DB::table('all_users')->where('id',$request->id)->update([
                    'password' =>Hash::make($password),
                ]);
                $s="Password reset successful";
            }
            else{
                $s="Email is wrong";
            }
        }
        else{
            $s="User ID is wrong";
        }
        if($s=="Password reset successful"){
            $details=['title'=>'Your password has reset.',
                   'body'=>'Your new password : '.$password];
            Mail::to($email)->send(new TestMail($details));
            return redirect()->route('login')->with('msg',$s);
        }
        else{
            return redirect()->route('forgotp')->with('msg',$s);
        }
            
        
    }
}
