<?php

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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
    
    $encryptedValue = Crypt::encryptString('888888888');

    $data = User::find(1); 

    // $token = $user->createtoken('costumerToken')->plainTextToken;
    // return $encryptedValue;
    return $data->createtoken('costumerToken')->plainTextToken;

    // $da = 'eyJpdiI6ImZ0NEFJbndLUERmeEtZZC9sVHRDVHc9PSIsInZhbHVlIjoiV2lyZFRJWGNnVWR4eE1TNSs2MUxiT0lrVGZnNUF6ckNZeHlmclRlMlMxczRhSVVIcVhOZlZHM2ZJYzhSS2UxbEdGRE5lMWV1aS9EaXhzRE52bGw1Qnc9PSIsIm1hYyI6IjQxYTU4NGUxODU5YjVkMDg0ZTA0NzQ3NDk0YzU4Mjg1OWM4NzUyZTlhZTU3ODBlYTcwZGQxNzkwMzc4MzU1NTgiLCJ0YWciOiIifQ==';
    // $decrypted = Crypt::decryptString($da);


    // return $decrypted;
    
});
