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
    public function doc(Request $request){

        $request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'email'=>['required'],
            'opassword'=>['required'],
            'npassword'=>['required'],
            'image'=>['required'],
        ],
        [
            'name.required' => 'Name is empty',
            'address.required' => 'Address is empty',
            'phone.required' => 'Phone is empty',
            'email.required' => 'Email is empty',
            'opassword.required' => 'New password is empty',
            'npassword.required' => 'Old Password is empty',
            'image.required' => 'Image is empty'
        ]);

        $p=DB::table('doctors')->where('Doc_id',$request->id)->value('password');
        if($request->opassword==$p){
            
            if ($request->hasFile('image')) {
                    $image=$request->file('image');
                    $extension = $image->getClientOriginalExtension();
                    $image->storeAs('/public/docprof', $request->id.".".$extension);
                    $url = '/storage/docprof/'.$request->id.".".$extension;
            }
            else{
                $url="";
            }       

            DB::table('doctors')->where('Doc_id',$request->id)->update(['Doc_name'=>$request->name,
                                                                        'Doc_addr'=>$request->address,
                                                                        'Doc_email'=>$request->email,
                                                                        'Doc_pNum'=>$request->phone,
                                                                        'Doc_im'=>$url,
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
        $p=DB::table('doc_available_times')->where('Doc_id',$docid)->get();
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
        $p=DB::table('doc_available_times')->where('Doc_id',$docid)->get();
        if($p==null){
            return view('doc/available')->with('c',$c)->with('msg',"")->with('ad',"")->with('ro',"");
        }
        else{
            return view('doc/available')->with('c',$c)->with('msg',"")->with('av',$p)->with('ro',"");
        }
    }

    public function pro(Request $request){

        $request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'opassword'=>['required'],
            'npassword'=>['required'],
            'image'=>['required'],
        ],
        [
            'name.required' => 'Name is empty',
            'address.required' => 'Address is empty',
            'phone.required' => 'Phone is empty',
            'opassword.required' => 'New password is empty',
            'npassword.required' => 'Old Password is empty',
            'image.required' => 'Image is empty'
        ]);

        $p=DB::table('doctors')->where('Doc_id',$request->id)->value('password');
        if($request->opassword==$p){
            
            if ($request->hasFile('image')) {
                    $image=$request->file('image');
                    $extension = $image->getClientOriginalExtension();
                    $image->storeAs('/public/docprof', $request->id.".".$extension);
                    $url = '/storage/docprof/'.$request->id.".".$extension;
            }
            else{
                $url="";
            }       

            DB::table('doctors')->where('Doc_id',$request->id)->update(['Doc_name'=>$request->name,
                                                                        'Doc_addr'=>$request->address,
                                                                        'Doc_email'=>$request->email,
                                                                        'Doc_pNum'=>$request->phone,
                                                                        'Doc_im'=>$url,
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
    public function docreply(Request $request)
    {
        DB::table('add_symptomps')->where('id',$request->id)->update(['reply'=>$request->reply]);
        $c=DB::table('doctors')->where('Doc_id',$request->docid)->first();
        $d = DB::table('add_symptomps')->where('Doc_id',$request->docid)->orderBy('created_at','desc')->get();
        $pa = DB::table('patients')->get();
        return view('doc/docsymptoms',compact('c','d','pa'))->with('msg',"");
    }
}
