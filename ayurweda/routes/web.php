<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\patientsController;
use App\Http\Controllers\medproducer;
use App\Http\Controllers\pharmacistController;
use App\Http\Controllers\ingsupplier;

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

Route::get('/login', 'PageController@login');
Route::get('/register', 'PageController@register');

Route::post('/saveuser', 'Store@register');
Route::post('/log', 'login@log');

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
Route::get('discharge/{c}/', 'update@discharge')->name('discharge');


//Patients Routings
Route::patch('/patedit',[patientsController::class,'edit']);
Route::get('pathome/{c}/','redirect@pathome')->name('pathome');
Route::get('symp/{c}/','redirect@symp')->name('symp');
Route::get('order/{c}/','redirect@order')->name('order');
Route::get('book/{c}/','redirect@book')->name('book');



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
Route::get('promeddelete/{c}/', 'update@promeddelete')->name('promeddelete');
Route::post('/proadding', 'store@proadding');
Route::get('proingdelete/{c}/', 'update@proingdelete')->name('proingdelete');
Route::post('/proupdateing', 'update@proupdateing');
Route::post('/proingorder', 'store@proingorder');
Route::post('/propic', 'update@propic');
Route::post('/ordersearch', 'search@ordersearch');
Route::post('/issusearch', 'search@issusearch');
Route::get('reorder/{c}/', 'update@reorder')->name('reorder');
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
Route::post('issuepatorder',[pharmacistController::class, 'issuepatorder'])->name('issuepatorder');
Route::post('issuedocorder',[pharmacistController::class, 'issuedocorder'])->name('issuedocorder');

Route::get('phaordermedicine/{c}/',[pharmacistController::class, 'ordermedicine'])->name('phaordermedicine');
Route::post('oredertopro/{c}/',[pharmacistController::class, 'oredertopro'])->name('oredertopro');

//supplier routings
Route::get('suphome/{c}/', 'redirect@suphome')->name('suphome');
Route::post('/supedit', 'update@sup');
Route::post('/suppic', 'update@suppic');
Route::get('issueing/{c}/', 'redirect@issueing')->name('issueing');
Route::get('newing/{c}/', 'redirect@newing')->name('newing');
Route::get('supreorder/{c}/', 'update@supreorder')->name('supreorder');
Route::post('/newingredient', 'store@newingredient');
Route::post('/issuingsearch', 'search@issuingsearch');