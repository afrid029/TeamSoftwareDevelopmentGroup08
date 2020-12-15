<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\patientsController;
use App\Http\Controllers\medproducer;

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
Route::get('/test', function () {
    return view('test');
});
Route::get('/login', 'PageController@login');
Route::get('/register', 'PageController@register');

Route::post('/saveuser', 'Store@register');
Route::post('/log', 'login@log');
Route::post('/docedit', 'update@doc');
Route::get('dochome/{c}/', 'redirect@dochome')->name('dochome');
Route::get('prescription/{c}/', 'redirect@prescription')->name('prescription');
Route::get('admitted/{c}/', 'redirect@admitted')->name('admitted');
Route::get('available/{c}/', 'redirect@available')->name('available');
Route::get('addpatdetails/{c}/', 'redirect@addpatdetails')->name('addpatdetails');
Route::post('/savepres', 'Store@prescript');
Route::post('/pressearch', 'search@pressearch');
Route::post('/saveadmit', 'Store@admit');
Route::post('/adsearch', 'search@adsearch');
Route::post('/saveavailable', 'Store@available');
Route::get('/avedit/{id}/{docid}', 'update@avedit')->name('avedit');
Route::get('/avdelete/{id}/{docid}', 'update@avdelete')->name('avdelete');
Route::post('/patadmit', 'Store@patadmit');
Route::post('/admitsearch', 'search@admitsearch');
Route::post('/proedit', 'update@pro');
Route::get('docsymp/{c}/', 'redirect@docsymp')->name('docsymp');
Route::get('docviewSymp/{i}/{j}/','redirect@show')->name('docviewSymp');
Route::post('/docreply', 'update@docreply');



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
Route::get('viewSymp/{i}/{j}/',[patientsController::class, 'show'])->name('viewSymp');
Route::get('showAvail/',[patientsController::class , 'showAvailable']);
Route::get('appoint',[patientsController::class, 'appoint']);
Route::post('/confirmAppoinment',[patientsController::class, 'confirmAppoinment']);
Route::get('/deleteAppoint',[patientsController::class, 'deleteAppointment']);
Route::patch('changeprofile/{c}/',[patientsController::class, 'changeprofile'])->name('changeprofile');
Route::post('/ordermedicine', [patientsController::class , 'ordermedicine'])->name('ordermedicine');
Route::get('/history/{c}',[patientsController::class, 'history'])->name('history');



//Medicine Producer Routings
Route::get('mphome/{c}/', 'medproducer@mphome')->name('mphome');
Route::get('issuemedicine/{c}/', 'medproducer@issuemedicine')->name('issuemedicine');
Route::get('Ingstock/{c}/', 'medproducer@Ingstock')->name('Ingstock');
Route::get('medstock/{c}/', 'medproducer@medstock')->name('medstock');
Route::get('ordering/{c}/', 'medproducer@ordering')->name('ordering');
