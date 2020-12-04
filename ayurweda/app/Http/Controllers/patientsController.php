<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Patient;
use App\Models\AllUsers;
use App\Models\add_symptomps;


class patientsController extends Controller
{
    //
    public function edit(Request $request)
    {
        $valid = $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|max:10',
            'npassword'=>'required|min:6',
            'opassword'=>'required'
        ]);
        if($valid){
            $pw = DB::table('all_users')->where('id', $request->id)->value('password');
            if($request->opassword==$pw){
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
        }
         $c = DB::table('patients')->where('Pat_id',$request->id)->first();
        return view('pat/patient',compact('c'))->with('msg',$m);
    }

    public function Add_Symptomps(Request $request,$id)
    {
        $valid = $request->validate([
            'dr'=>'required'
        ]);
        $symp = new add_symptomps;
        $symp->Doc_id = $request->get('dr');
        $symp->text = $request->get('text');
        $symp->Pat_id = $id;
        $d = date('Y-m-d');
        $t = date('h:i:s');
        $symp->date = $d;
        $symp->time = $t;
        $imagedata;
       if($request->hasfile('image'))
        {
           foreach($request->file('image') as $file)
           {
               $name = time().rand(1,100).'.'.$file->extension();
               $file->move(public_path().'/upload/images', $name); 
               $imagedata[] = $name;
           }
           $symp->img = json_encode($imagedata);
        }
         $symp->save();
        return redirect()->route('symp',$id);
    }
    public function show($id,$id2)
    {
        $c = DB::table('patients')->where('Pat_id',$id2)->first();
        $e = DB::table('add_symptomps')->where('id',$id)->first();
        return view('pat/view',compact('c','e'));
    }
   
}
