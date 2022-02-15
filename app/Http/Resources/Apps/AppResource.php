<?php

namespace App\Http\Resources\Apps;

use App\Models\Api\Apps\App;
use Illuminate\Http\Resources\Json\JsonResource;

class AppResource extends JsonResource
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
            'identification' => $this->app_id,
            'name' => $this->app_name,
            'comercial_name' => $this->comercial_name,
            'tax' => $this->iva,
            'social' => [
                'phone_number' => $this->phone_number,
                'whatsapp' => $this->sociable_whatsapp,
                'instragram' => $this->sociable_instagram,
                'facebook' => $this->sociable_facebook,
                'twiter' => $this->sociable_twiter,
                'linkedin' => $this->sociable_linkedin,
            ],            
            'description' => $this->description,
        ];
    }
}