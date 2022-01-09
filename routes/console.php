<?php
#Setting namespaces required

use App\Http\Controllers\Console\Command\AuthConsoleController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('auth:token {required} {--type=false} {--validator=false}', function ($required, $type, $validator) {

    $password = $this->secret('What is the password?');
    
    if($type === 'false'){
        $this->comment('Missing type: --type={code,username,id...}');    
    }else{
        $validator = ($validator === 'false') ? $validator : '=';
        $this->comment(AuthConsoleController::getAccessToken($required, $type, $validator));         
    }
})->purpose('Display an inspiring quote');