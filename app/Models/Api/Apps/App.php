<?php

namespace App\Models\Api\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'url',
        'contact_mail',
        'support_mail',
        'sales_mail',
        'phone_contact',
        'legacy_id',
        'address',
        'status',
        'p_brouchure_comission',
        'status',
        'to_brouchure',
        'to_web',
        'to_seasonal',
        'username',
    ];
}
 