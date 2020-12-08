<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\patientsController;

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
Route::post('/savepres', 'Store@prescript');
Route::post('/pressearch', 'search@pressearch');
Route::post('/saveadmit', 'Store@admit');
Route::post('/adsearch', 'search@adsearch');
Route::post('/saveavailable', 'Store@available');
Route::get('/avedit/{id}/{docid}', 'update@avedit')->name('avedit');
Route::get('/avdelete/{id}/{docid}', 'update@avdelete')->name('avdelete');


//Patients Routings
Route::patch('/patedit',[patientsController::class,'edit']);
Route::get('pathome/{c}/','redirect@pathome')->name('pathome');
Route::get('symp/{c}/','redirect@symp')->name('symp');
Route::get('order/{c}/','redirect@order')->name('order');
Route::get('book/{c}/','redirect@book')->name('book');



