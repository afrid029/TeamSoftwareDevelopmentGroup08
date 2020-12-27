<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function log(Request $request){

        $password=DB::table('all_users')->where('id',$request->id)->value('password');
        $roll=DB::table('all_users')->where('id',$request->id)->value('roll');
        if($password==$request->password){
            if($roll=="patient"){
                return redirect()->route('pathome',['c'=>$request->id]);
            }
            elseif($roll=="doctor"){
                return redirect()->route('dochome',['c'=>$request->id]);
            }
            elseif($roll=="pharmacist"){
                return redirect()->route('phahome',['c'=>$request->id]);
                
            }
            elseif($roll=="producer"){
<<<<<<< HEAD
                $c=DB::table('medicine_producers')->where('Pro_id',$request->id)->first();
                return view('producer/producer')->with('c',$c)->with('msg',"");

            }elseif($roll=="admin"){
                $c=DB::table('admins')->where('id',$request->id)->first();
                return view('admin/admin')->with('c',$c)->with('msg',"");

            }else{
                $c=DB::table('ingredient_suppliers')->where('Sup_id',$request->id)->first();
                return view('supllier/supllier')->with('c',$c)->with('msg',"");
=======
                return redirect()->route('mphome',['c'=>$request->id]);

            }
            elseif($roll=="supplier"){
                return redirect()->route('suphome',['c'=>$request->id]);

            }
            elseif($roll=="admin"){

                return("Route to admin page in Login.php conroller");
            }
            else{
                return redirect()->route('suphome',['c'=>$request->id]);
>>>>>>> dcbd058e97bf58e400b1d06087d09babcd88888b
            }
        }
        else{
            return redirect()->back()->with('msg','Wrong password or username');
        }
    }
}
