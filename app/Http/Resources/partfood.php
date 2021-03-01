<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class partfood extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
             'name'=>$this->name,
             'image'=>$this->image,
             'price'=>$this->price,
             'food_id'=>$this->food_id,
        ];
    }
}
