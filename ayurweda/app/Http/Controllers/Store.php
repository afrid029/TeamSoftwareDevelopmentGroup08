<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\AllUsers;
use Illuminate\Support\Facades\DB;

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
            
            $user->email=$request->email;
            $user->password=$request->password;
            $user->roll="patient";
            $user->save();
            $s="Registered successfully.";
        }
        else{
            $s="Password retype is wrong.";
        }
        return view('register')->with('msg',$s);
        
    }
}
