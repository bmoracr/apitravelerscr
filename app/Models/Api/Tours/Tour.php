<?php

namespace App\Models\Api\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'category',
        'includes',
        'additional',
        'p_web_plus',
        'p_web_less',
        'p_brouchure_rack',
        'p_brouchure_neto',
        'p_brouchure_comission',
        'status',
        'to_brouchure',
        'to_web',
        'to_seasonal',
        'username',
    ];
}
