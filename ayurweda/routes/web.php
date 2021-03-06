<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\patientsController;
use App\Http\Controllers\medproducer;
use App\Http\Controllers\pharmacistController;
use App\Http\Controllers\ingsupplier;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', 'PageController@login')->name('login');

Route::get('/register', 'PageController@register');

Route::post('/saveuser', 'Store@register');
Route::post('/log', 'login@log');
Route::get('enter/{c}', 'login@enter')->name('enter');
Route::get('logout/', 'PageController@logout');

//doctor routings

Route::post('/docedit', 'update@doc');
Route::get('dochome/{c}/', 'redirect@dochome')->name('dochome');
Route::get('prescription/{c}/', 'redirect@prescription')->name('prescription');
Route::get('admitted/{c}/', 'redirect@admitted')->name('admitted');
Route::get('available/{c}/', 'redirect@available')->name('available');
Route::get('addpatdetails/{c}/', 'redirect@addpatdetails')->name('addpatdetails');
Route::post('/savepres', 'Store@prescript');
Route::post('/saveadmit', 'Store@admit');
Route::post('/pressearch', 'search@pressearch');
Route::post('/adsearch', 'search@adsearch');
Route::post('/saveavailable', 'Store@available');
Route::post('/avedit', 'update@avedit');
Route::get('/avdelete/{id}/{docid}', 'update@avdelete')->name('avdelete');
Route::post('/patadmit', 'Store@patadmit');
Route::post('/admitsearch', 'search@admitsearch');

Route::get('docsymp/{c}/', 'redirect@docsymp')->name('docsymp');
Route::get('docviewSymp/{i}/{j}/','redirect@show')->name('docviewSymp');
Route::post('/docreply', 'update@docreply');
Route::get('appointment/{c}/', 'redirect@appointment')->name('appointment');
Route::post('/appsearch', 'search@appsearch');
Route::post('/docpic', 'update@docpic');
Route::get('discharge/{c}/{d}', 'update@discharge')->name('discharge');


//Patients Routings
Route::patch('/patedit',[patientsController::class,'edit']);
Route::get('pathome/{c}/',[patientsController::class,'pathome'])->name('pathome');
Route::get('symp/{c}/',[patientsController::class,'symp'])->name('symp');
Route::get('order/{c}/',[patientsController::class,'order'])->name('order');
Route::get('book/{c}/',[patientsController::class,'book'])->name('book');
Route::post('addsymptomps/{c}',[patientsController::class, 'Add_Symptomps'])->name('addsymptomps');
Route::get('showAvail/',[patientsController::class , 'showAvailable']);
Route::get('appoint',[patientsController::class, 'appoint']);
Route::post('/confirmAppoinment',[patientsController::class, 'confirmAppoinment']);
Route::get('/deleteAppoint',[patientsController::class, 'deleteAppointment']);
Route::patch('changeprofile/{c}/',[patientsController::class, 'changeprofile'])->name('changeprofile');
Route::post('ordermedicine/{id}/', [patientsController::class , 'ordermedicine'])->name('ordermedicine');
Route::get('/history/{c}',[patientsController::class, 'history'])->name('history');



//Medicine Producer Routings
Route::get('mphome/{c}/', 'redirect@mphome')->name('mphome');
Route::get('issuemedicine/{c}/', 'redirect@issuemedicine')->name('issuemedicine');
Route::get('Ingstock/{c}/', 'redirect@Ingstock')->name('Ingstock');
Route::get('medstock/{c}/', 'redirect@medstock')->name('medstock');
Route::get('ordering/{c}/', 'redirect@ordering')->name('ordering');
Route::post('/proedit', 'update@pro');
Route::post('/proaddmedicine', 'store@proaddmedicine');
Route::post('/proupdatemedicine', 'update@proupdatemedicine');
Route::get('promeddelete/{c}/{d}', 'update@promeddelete')->name('promeddelete');
Route::post('/proadding', 'store@proadding');
Route::get('proingdelete/{c}/{d}', 'update@proingdelete')->name('proingdelete');
Route::post('/proupdateing', 'update@proupdateing');
Route::post('/proingorder', 'store@proingorder');
Route::post('/propic', 'update@propic');
Route::post('/ordersearch', 'search@ordersearch');
Route::post('/issusearch', 'search@issusearch');
Route::get('reorder/{c}/{d}', 'update@reorder')->name('reorder');
Route::get('medicines/{c}/', 'redirect@medicines')->name('medicines');
Route::post('/newmedicine', 'store@newmedicine');

//Pharmacist Routings
Route::get('phahome/{c}/',[pharmacistController::class, 'phaHome'])->name('phahome');
Route::post('phaedit',[pharmacistController::class, 'phaEdit']);
Route::patch('pharprofilepic/{c}/',[pharmacistController::class, 'pharprofilepicture'])->name('pharprofilepic');

Route::get('medicalstock/{c}/',[pharmacistController::class, 'medicalstock'])->name('medicalstock');
Route::post('addmedicine/',[pharmacistController::class, 'AddMedicine']);
Route::post('updatemedicine/{c}',[pharmacistController::class, 'Updatemedicine']);
Route::post('DelMedicine/{c}',[pharmacistController::class, 'DeleteMedicine']);

Route::get('issueMedicine/{c}/',[pharmacistController::class, 'issueMedicine'])->name('issueMedicine');
Route::post('issuepatorder/{c}',[pharmacistController::class, 'issuepatorder'])->name('issuepatorder');
Route::post('issuedocorder/{c}',[pharmacistController::class, 'issuedocorder'])->name('issuedocorder');

Route::get('phaordermedicine/{c}/',[pharmacistController::class, 'ordermedicine'])->name('phaordermedicine');
Route::post('oredertopro/{c}/',[pharmacistController::class, 'oredertopro'])->name('oredertopro');

//supplier routings
Route::get('suphome/{c}/', 'redirect@suphome')->name('suphome');
Route::post('/supedit', 'update@sup');
Route::post('/suppic', 'update@suppic');
Route::get('issueing/{c}/', 'redirect@issueing')->name('issueing');
Route::get('newing/{c}/', 'redirect@newing')->name('newing');
Route::get('supreorder/{c}/{d}', 'update@supreorder')->name('supreorder');
Route::post('/newingredient', 'store@newingredient');
Route::post('/issuingsearch', 'search@issuingsearch');


//admin routings
Route::get('adminpage/{c}',[AdminController::class, 'adminhome'])->name('adminpage');
Route::post('admedit',[AdminController::class, 'adminedit']);

Route::get('regist/{c}',[AdminController::class, 'register'])->name('regist');
Route::post('/addnew',[AdminController::class, 'addnew']);

Route::get('/profit/{c}',[AdminController::class, 'profit'])->name('profit');
Route::post('/patbill',[AdminController::class, 'patbill'])->name('patbill');
Route::get('patbill',function(){
     $c =  DB::table('admins')->first();
        $access = DB::table('pat_med_orderings')->where('status', 'Issued')->orderBy('created_at','desc');
       $access2 = DB::table('medical_histories')->where('issued','Issued');
        
        $patbill = $access->get();
        $patsum = $access->sum('bill');

        $drbill = $access2->get();
        $drsum = $access2->sum('bill');
        return view('admin/profit',compact('c','patbill','drbill','patsum','drsum'))->with( 'msg',"");
   
});
Route::post('/docbill',[AdminController::class, 'docbill']);
Route::get('docbill',function(){
     $c =  DB::table('admins')->first();
        $access = DB::table('pat_med_orderings')->where('status', 'Issued')->orderBy('created_at','desc');
       $access2 = DB::table('medical_histories')->where('issued','Issued');
        
        $patbill = $access->get();
        $patsum = $access->sum('bill');

        $drbill = $access2->get();
        $drsum = $access2->sum('bill');
        return view('admin/profit',compact('c','patbill','drbill','patsum','drsum'))->with( 'msg',"");
   
});

Route::get('profview/{c}',[AdminController::class, 'profview'])->name('profview');



//forget password
Route::get('/forgotp','redirect@forgotp')->name('forgotp');
Route::post('/forgotpass', 'update@forgotpass');
