<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\AllUsers;

class patientsController extends Controller
{
    //
    public function edit(Request $request)
    {
        $pw = DB::table('all_users')->where('id', $request->id)->value('password');
        if($request->opassword==$pw){
            /*$details = DB::table('patients')->where('Pat_id',$request->id)->get();
            $details->Pat_name = $request->name;
            $details->Pat_email = $request->email;
            $details->Pat_addr = $request->address;
            $details->pNum = $request->phone;
            $details->password = $request->npassword;*/
            $details = DB::table('patients')->where('Pat_id',$request->id)->update([
                'Pat_name' => $request->name,
                'Pat_email' => $request->email,
                'Pat_addr' => $request->address,
                'Pat_pNum' => $request->phone,
                'password' => $request->npassword,
             ]); 
           
            
            $allUser = DB::table('all_users')->where('id', $request->id)->update([
                'password' => $request->npassword
            ]);
            

            $m="Profile Successfully Updated";
        }
        else
        {
            $m="Password is wrong";
        }
        session(['msg' => $m]);
        $c = DB::table('patients')->where('Pat_id',$request->id)->first();
        return view('pat/patient',compact('c'))->with('msg',$m);

    }
}
