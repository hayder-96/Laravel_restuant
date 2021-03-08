<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class resnoty extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
      return [
        'id'=>$this->id,
         'noty'=>$this->noty,
         'user_id'=>$this->user_id,
         
    ];
    }
}
