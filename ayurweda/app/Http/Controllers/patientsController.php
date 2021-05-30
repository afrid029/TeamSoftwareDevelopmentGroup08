<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Patient;
use App\Models\AllUsers;
use App\Models\add_symptomps;
use App\Models\OnlineBooking;
use App\Models\pat_med_ordering;



class patientsController extends Controller
{
    //

    /*--------------Patient Home------------------*/
    public function pathome($id)
    {
       
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }

        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $today = date('Y-m-d');
        $dob = DB::table('patients')->where('Pat_id',$id)->value('dob');

        $diff = abs(strtotime($today)-strtotime($dob));
        $diff = floor($diff/(365*60*60*24));
       
      

       return view('pat/patient',compact('c','diff'))->with('msg','');
        
    }
    public function edit(Request $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }
        $request->validate([
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
            'opassword.required' => 'Old Password is empty',
           
        ]);
        
            $pw = DB::table('all_users')->where('id', $request->id)->value('password');
            if(Hash::check($request->opassword,$pw)){
                $details = DB::table('patients')->where('Pat_id',$request->id)->update([
                    'Pat_name' => $request->name,
                    'Pat_email' => $request->email,
                    'Pat_addr' => $request->address,
                    'Pat_pNum' => $request->phone,
                    'password' => Hash::make($request->npassword),
                 ]); 
                $allUser = DB::table('all_users')->where('id', $request->id)->update([
                    'password' => Hash::make($request->npassword)
                ]);
                $m="Profile Successfully Updated";
            }
            else
            {
                $m="Password is wrong";
            }
        
         
         return redirect()->back()->with('msg',$m);
    }

    public function changeprofile(Request $request,$id)
    {     
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }  
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

            return redirect()->back()->with('msg',"Profile Image is Successfully Updated");
    }

    /*-----------Symptomps-------------*/
    public function symp($id)
    {
         /*$st = session()->get('status');
        if(!$st){
            return redirect()->route('login');
        }*/
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            
            return redirect()->route('login')->with('msg','Login First');
        }

        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $d = DB::table('add_symptomps')->where('Pat_id',$id)->orderBy('created_at','desc')->get();
        $dr = DB::table('doctors')->orderBy('Doc_name','asc')->get();

        
        return view('pat/symptomps',compact('c','d','dr'))->with('msg',"");
    }

    public function Add_Symptomps(Request $request,$id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }

        $valid = $request->validate([
            'dr'=>'required' ],
            [
            'dr.required'=>'Select Doctor'
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

        if($request->hasFile('audio'))
        {
            $aud = time().rand(1,250).'.'.$request->audio->extension();
            $request->audio->move(public_path().'/upload/voicerecordings', $aud);
            
            $symp->audio = $aud;
        }
         $symp->save();
        return redirect()->back()->with('msg',"Symptomp note has sent");
    }

    /*--------Online Booking----------------*/

    public function book($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }

        $d = date('Y-m-d');
        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $t = DB::table('online_bookings')
                    ->join('doctors', 'doctors.Doc_id', '=' , 'online_bookings.Doc_id')
                    ->select('online_bookings.App_id', 'online_bookings.Pat_id','online_bookings.Doc_id','online_bookings.availableDate','online_bookings.availableTime','doctors.Doc_name','online_bookings.updated_at')
                    ->where([
                        ['Pat_id','=',$id],
                        ['availableDate', '>=', $d]
                        ])
                    ->orderBy('updated_at','desc')->get();
         $dr = DB::table('doctors')->orderBy('Doc_name','asc')->get();
        return view('pat/booking',compact('c','t','dr'))->with('msg');
    }
   
    public function showAvailable(Request  $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->patid){
            return redirect()->route('login')->with('msg','Login First');
        }
       
       if($request->date && $request->dr)
       {
            $t = DB::table('doc_available_times')->where('Doc_id',$request->dr)
                                                ->where('availableDate',$request->date)
                                                ->orderBy('availableDate','asc')->get();
       }else if($request->date){
           $t = DB::table('doc_available_times')
                                                ->where('availableDate',$request->date)
                                                ->orderBy('availableDate','asc')->get();
       }else if($request->dr)
       {
        $date = date('Y-m-d');
        $t = DB::table('doc_available_times')->where('Doc_id',$request->dr)
                                             ->where('availableDate','>=' , $date)
                                             ->orderBy('availableDate','asc')->get();

       }else{
        $date = date('Y-m-d');
        $t = DB::table('doc_available_times')
                                             ->where('availableDate','>=' , $date)
                                             ->orderBy('availableDate','asc')->get();
       }
      

        $c = DB::table('patients')->where('Pat_id',$request->patid)->first();
        $dr = DB::table('doctors')->orderBy('Doc_name','asc')->get();
        $doc = $request->dr;

        return view('pat/appoint',compact('c','t','dr','doc'));

    }

    public function appoint(Request $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->id){
            return redirect()->route('login')->with('msg','Login First');
        }

        $c = DB::table('patients')->where('Pat_id',$request->id)->first();
        $dr = DB::table('doctors')->orderBy('Doc_name','asc')->get(); 
        $date = date('Y-m-d');
        $t = DB::table('doc_available_times')
                                             ->where('availableDate','>=' , $date)
                                             ->orderBy('availableDate','asc')->get();
        return view('pat.appoint' ,compact('c','dr','t'));
    }

    public function confirmAppoinment(Request $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->pid){
            return redirect()->route('login')->with('msg','Login First');
        }

        $z = DB::table('online_bookings')->get();
        $dc = DB::table('doctors')->where('Doc_id',$request->get('did'))->value('Doc_name');
        $cnt = count($z)+1;

        $book = new OnlineBooking;


        $book->App_id="App".rand(1,250).rand(1,100);
        $book->Pat_id=$request->get('pid');
        $book->Doc_id=$request->get('did');
        $book->availableDate=$request->get('dt');
        $book->availableTime=$request->get('tm');
        $book->save();
        return redirect()->route('book',['c'=>$request->pid])->with('msg',"You Have Appointed DR ".$dc." on ".$request->get('dt')." By ".$request->get('tm'));
      
    }
    public function deleteAppointment(Request $request)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $request->ptid){
            return redirect()->route('login')->with('msg','Login First');
        }

        DB::table('online_bookings')->where('App_id',$request->appid)->delete();

        return redirect()->back()->with('msg',"Appoinment is cancelled");
    }

    /*--------------Order Medicine----------------*/

    public function order($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }

        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $stocks = DB::table('medicine_stocks')->whereRaw("stock_qty - orders > 100")
                                            ->orderBy('Med_name','asc') 
                                            ->get();
        $orders = DB::table('pat_med_orderings')->where('Pat_id',$id)
                                               ->orderBy('status','desc')
                                               ->orderBy('created_at','desc')
                                                ->get();
        $phr = DB::table('pharmacists')->get();
        return view('pat/ordermedicine',compact('c','stocks','orders','phr'))->with('msg',"");
    }
    public function ordermedicine(Request $req,$id){
        $q = session()->getId();
        if(session()->get('session') != $q || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }
        
        $name;

        $a = implode($req->orders);
        $b = explode(',',$a);

        $bill = 0;
        
        for($i = 0 ; $i < count($b) ; $i++){
            if($i%2 == 0){
                $name = $b[$i];
            }else{
                $cnt = $b[$i];
                $unit = DB::table('medicine_stocks')->where('Med_name',$name)->value('unitprice');
                DB::table('medicine_stocks')->where('Med_name',$name)->increment('orders',$cnt);
                $bill = $bill + ($cnt*$unit);
            }
        }
        $cnt = count(DB::table('pat_med_orderings')->get())+1;

        $ordering = new pat_med_ordering;
        $ordering->PatMedOrder_id = "Ord".($cnt).rand(1,50);
        $ordering->Pat_id = $id;
        $date = date('Y-m-d');
        $ordering->PatMedOrder_date = $date;
        $ordering->bill = $bill;
        $ordering->medicines = json_encode($req->orders);
        $ordering->save();

        return redirect()->back()->with('msg',"Your Order is placed");
      
    }



    /*---------------Medical History---------------*/
    
    public function history($id)
    {
        $a = session()->getId();
        if(session()->get('session') != $a || session()->get('userid') != $id){
            return redirect()->route('login')->with('msg','Login First');
        }

        $c = DB::table('patients')->where('Pat_id',$id)->first();
        $hist = DB::table('medical_histories')->where('medical_histories.Pat_id',$id)
                                            ->orderBy('created_at','desc')
                                            ->get();
        return view('pat/medicalHistory',compact('c','hist'));
    }
}
