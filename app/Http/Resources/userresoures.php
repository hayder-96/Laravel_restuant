<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userresoures extends JsonResource
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
             'longtude'=>$this->longtude,
             'latidtude'=>$this->latitude,
              'user_id'=>$this->user_id,
              'delivery'=>$this->delivery
        ];
    }
}
