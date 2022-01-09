<?php

namespace App\Http\Resources\Tours;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ToursCollection extends ResourceCollection
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
