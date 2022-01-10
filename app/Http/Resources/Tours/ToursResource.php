<?php

namespace App\Http\Resources\Tours;

use App\Http\Resources\Tours\CategoryResource;
use App\Models\Api\Tours\Category;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ToursResource extends JsonResource
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

            'code' => $this->code,

            'status' => $this->status,
            
            'name' => $this->name,
            
            'category' => new CategoryResource(Category::findOrFail($this->category_id)),
            
            'includes' => $this->includes,
            
            'extras' => $this->extras,

            'files' => $this->image,
            
            'description' => $this->description,

            'prices' => [
                            "p_web_plus" => $this->p_web_plus,
                            "p_web_less" => $this->p_web_less,
                            "p_brouchure_rack" => $this->p_brouchure_rack,
                            "p_brouchure_neto" => $this->p_brouchure_neto,
                            "p_brouchure_comission" => $this->p_brouchure_comission,
                        ],

            'put_on' => [
                            "to_brouchure" => $this->to_brouchure,
                            "to_web" => $this->to_web,
                            "to_seasonal" => $this->to_seasonal,
                        ],

            'timestamps' => [
                                'created_at' => $this->updated_at,
                                'updated_at' => $this->updated_at,
                            ],
            
            'created_by' => new UsersToursResource(User::findOrFail($this->userId)),
  
        ];
    }
}
