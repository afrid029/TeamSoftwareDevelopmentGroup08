<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\AllUsers;
use Illuminate\Support\Facades\DB;

class update extends Controller
{
    public function doc(Request $request){

        $p=DB::table('doctors')->where('Doc_id',$request->id)->value('password');
        if($request->opassword==$p){
            
            DB::table('doctors')->where('Doc_id',$request->id)->update(['Doc_name'=>$request->name,
                                                                        'Doc_addr'=>$request->address,
                                                                        'Doc_email'=>$request->email,
                                                                        'Doc_pNum'=>$request->phone,
                                                                        'password'=>$request->npassword]);
            DB::table('all_users')->where('id',$request->id)->update(['password'=>$request->npassword]);
            
            $s="Updated successfully.";
        }
        else{
            $s="Old password is wrong.";
        }
        $c=DB::table('doctors')->where('Doc_id',$request->id)->first();
        return view('doc/doctor')->with('c',$c)->with('msg',$s);
        
    }
    public function avedit($id,$docid){
        $c=DB::table('doctors')->where('Doc_id',$docid)->first();
        $ro=DB::table('doc_available_times')->where('id',$id)->first();
        DB::table('doc_available_times')->where('id',$id)->delete();
        $p=DB::table('doc_available_times')->get();
        if($p==null){
            return view('doc/available')->with('c',$c)->with('msg',"")->with('ad',"")->with('ro',$ro);
        }
        else{
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',$ro);
        }
    }
    public function avdelete($id,$docid){
        $c=DB::table('doctors')->where('Doc_id',$docid)->first();
        DB::table('doc_available_times')->where('id',$id)->delete();
        $p=DB::table('doc_available_times')->get();
        if($p==null){
            return view('doc/available')->with('c',$c)->with('msg',"")->with('ad',"")->with('ro',"");
        }
        else{
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',"");
        }
    }
}
