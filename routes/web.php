<?php

use Illuminate\Support\Facades\Route;
use App\Email;
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
     $get_Data  = Email::where('id',1)->first();
    return view('welcome',['data'=>$get_Data]);
});

Route::post('/sent-email', 'EmailController@index')->name('sent-email');
