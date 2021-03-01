<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userfood extends JsonResource
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
             'user_id'=>$this->user_id,
             'number'=>$this->number,
        ];
    }
}
