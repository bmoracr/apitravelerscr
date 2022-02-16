<?php

namespace App\Http\Resources\Travelerscr;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TicketsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'code' => 200,
            'result' => $this->collection,
        ];
    }
}
