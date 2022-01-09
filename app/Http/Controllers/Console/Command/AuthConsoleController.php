<?php

namespace App\Http\Controllers\Console\Command;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AuthConsoleController extends Controller
{
    public static function getAccessToken($required, $type=null, $validator=null){
        try{
            $user = User::where($type, $validator, $required)->first();
            return $user ? $user->createtoken('costumerToken')->plainTextToken : 'Not Found';
        }catch(Exception $e){
            return ' Invalid options, please check --type or --validator, ' . ' Error code: ' . $e->getCode();
        }
    }
}
