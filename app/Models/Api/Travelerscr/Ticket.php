<?php

namespace App\Models\Api\Travelerscr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'tax',
        'subTotal',
        'totalPrice',
        'costumerCode',
        'title',
        'costumerName',
        'email',
        'phoneNumber',
        'acceptTerms',
        'productsId',
    ];
}
