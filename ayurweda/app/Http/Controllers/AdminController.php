<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $c =  DB::table('admins')->where('username', $id)->first();
        
        return view('admin/admin',compact('c',))->with('msg',"");
    }

    public function adminedit(Request $request)
    {
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
        $pw = DB::table('admins')->where('username',$request->id)->value('password');
        $msg;
        if($pw == $request->opassword){
           DB::table('admins')->where('username',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
           ]);

           if($pw !== $request->npassword){
                DB::table('admins')->where('username',$request->id)->update([
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


////////////////////////////////////////////////////////////

    public function register($id){
        $c =  DB::table('admins')->where('username', $id)->first();
        $users = DB::table('all_users')->orderBy('id','asc')->get();

        $doct = count(DB::table('doctors')->get())+1;
        $phar = count(DB::table('pharmacists')->get())+1;
        $prod = count(DB::table('medicine_producers')->get())+1;
        $supp = count(DB::table('ingredient_suppliers')->get())+1;

        return view('admin/reg',compact('c','users','doct','phar','prod','supp'));
    }

    public function addnew(Request $req)
    {
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
             $to_name = 'Afrid';
        $to_email = $req->email;
        $data = array('ID'=>$req->id, "password"=>$req->password);
        try{
        new sendMail($data);
  
        Mail::send('email', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('User Name Password');
            $message->from('contact.helaweda@gmail.com','Hospital');


           
        });
        }catch(\Exception $ex){
            return redirect()->back()->with('msg','Check your network connection');
        }
         if($req->roll=="Doctor"){
            $user = new Doctor;

            $user->Doc_id = $req->id;
            $user->Doc_name = $req->name;
            $user->Doc_password = $req->password;
            $user->Doc_email = $req->email;

            $user->save();

            $user = new AllUsers;
            $user->id = $req->id;
            $user->password = $req->password;
            $user->roll = "doctor" ;

            $user->save();  
           
        }

        return redirect()->back()->with('msg','User added and send user details to '.$req->email);


        }
        else{
            return redirect()->back()->with('msg','Double check your email');
        }
    
       
    

        
    }
}
