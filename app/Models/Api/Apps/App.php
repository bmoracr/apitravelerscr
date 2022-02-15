<?php

namespace App\Models\Api\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_id',
        'app_name',
        'comercial_name',
        'iva',
        'phone_number',
        'sociable_whatsapp',
        'sociable_instagram',
        'sociable_facebook',
        'sociable_twiter',
        'sociable_linkedin',
        'description',
        'last_used_at'
    ];
}