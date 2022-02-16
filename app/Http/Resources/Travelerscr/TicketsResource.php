<?php

namespace App\Http\Resources\Travelerscr;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'billing' => [
                'tax' => $this-> tax,
                'subTotal' => $this-> subTotal,
                'totalPrice' => $this-> totalPrice,
            ],
            'costumer_info' => [
                'costumerCode' => $this-> costumerCode,
                'title' => $this-> title,
                'costumerName' => $this-> costumerName,
                'phoneNumber' => $this-> phoneNumber,
                'totalPrice' => $this-> totalPrice,
            ],
            'legacy' => [
                'acceptTerms' => $this->acceptTerms,
            ], 
            'productsId' => $this->productsId,    
            'timestamps' => [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at, 
            ]
        ];
    }
}
