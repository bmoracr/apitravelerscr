<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {

    Log::debug('An informational message.'); 
    return 'yes';
    
});