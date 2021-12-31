<?php

use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('welcome');
    
});


Route::post('/send-message', function (Request $request) {

    event( 
        new Message( 
            $request->input('username'), 
            $request->input('message') 
        ) 
    );
    return ['Successfully'=>true];
});