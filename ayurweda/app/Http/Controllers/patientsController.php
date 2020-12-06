<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Patient;
use App\Models\AllUsers;
use App\Models\add_symptomps;
use App\Models\OnlineBooking;


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
        ],
        [
            'name.required' => 'Name is empty',
            'address.required' => 'Address is empty',
            'phone.required' => 'Phone is empty',
            'npassword.required' => 'New password is empty',
            'opassword.required' => 'Old Password is empty'
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
        return redirect()->route('pathome',['c'=>$request->id])->with('msg',$m);
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
       
        $t = date('H:i');

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
   
    public function showAvailable(Request  $request)
    {
       // return "okkkk";
       if($request->date)
       {
            $t = DB::table('doc_available_times')->where('Doc_id',$request->dr)
                                                ->where('availableDate',$request->date)->get();
                                                
       }else
       {
        $date = date('Y-m-d');
        $t = DB::table('doc_available_times')->where('Doc_id',$request->dr)
                                             ->where('availableDate','>=' , $date)
                                             ->orderBy('availableDate','asc')->get();
                                             
       }
      

        $c = DB::table('patients')->where('Pat_id',$request->patid)->first();
        $dr = DB::table('doctors')->get();
        $doc = $request->dr;

        return view('pat/appoint',compact('c','t','dr','doc'));

    }

    public function appoint(Request $request)
    {
        $c = DB::table('patients')->where('Pat_id',$request->id)->first();
        $dr = DB::table('doctors')->get(); 
        $t =[];
        return view('pat\appoint' ,compact('c','dr','t'));
    }

    public function confirmAppoinment(Request $request)
    {
        $z = DB::table('online_bookings')->get();
        $dc = DB::table('doctors')->where('Doc_id',$request->get('did'))->value('Doc_name');
        $cnt = count($z)+1;

        $book = new OnlineBooking;


        $book->App_id="App".time().rand(1,100);
        $book->Pat_id=$request->get('pid');
        $book->Doc_id=$request->get('did');
        $book->availableDate=$request->get('dt');
        $book->availableTime=$request->get('tm');
        $book->save();
        return redirect()->route('book',['c'=>$request->pid])->with('msg',"You Have Appointed DR ".$dc." on ".$request->get('dt')." By ".$request->get('tm'));
      
    }
    public function deleteAppointment(Request $request)
    {
        DB::table('online_bookings')->where('App_id',$request->appid)->delete();

        return redirect()->route('book',['c'=>$request->ptid])->with('msg',"Appoinment is cancelled");
    }
    public function changeprofile(Request $request,$id)
    {       
        $request->validate([
            'profile'=>'required|image'
        ],[
            'profile.required' => 'You have not choose any file',
            'profile.image'=>'Only Image is allowed'
        ]);

            $name = time().rand(1,100).'.'.$request->profile->extension();
            $request->profile->move(public_path().'/upload/profile', $name); 
           
            DB::table('patients')->where('Pat_id',$id)->update([
                'Pimage' => $name
            ]);
            
            return redirect()->route('pathome',$id)->with('msg',"Profile Image is Successfully Updated");
    }


    //Patient Redirection
    public function pathome($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        return view('pat/patient',compact('c'))->with('msg',"");
    }

    public function symp($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $d = DB::table('add_symptomps')->where('Pat_id',$id)->orderBy('created_at','desc')->take(5)->get();
        $dr = DB::table('doctors')->get();
        return view('pat/symptomps',compact('c','d','dr'))->with('msg',"");
    }

    public function order($id)
    {
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        return view('pat/ordermedicine',compact('c'))->with('msg',"");
    }

    public function book($id)
    {
        $d = date('Y-m-d');
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $t = DB::table('online_bookings')
                    ->join('doctors', 'doctors.Doc_id', '=' , 'online_bookings.Doc_id')
                    ->select('online_bookings.App_id', 'online_bookings.Pat_id','online_bookings.Doc_id','online_bookings.availableDate','online_bookings.availableTime','doctors.Doc_name','online_bookings.updated_at')
                    ->where([
                        ['Pat_id','=',$id],
                        ['availableDate', '>=', $d]
                        ])
                    ->orderBy('updated_at','desc')->paginate(5);
        return view('pat/booking',compact('c','t'))->with('msg');
    }
}
