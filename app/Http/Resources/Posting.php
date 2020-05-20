<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Posting extends JsonResource
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
            'id'         => $this->id,
            'name'       => $this->name,
            'status'     => $this->status,
            'likes'      => $this->likes,
            'image'      => $this->image,
            'token'      => $this->token,        
            'created_at' => $this->dateTime($this->created_at),
            'updated_at' => $this->dateTime($this->updated_at),
        ];
    }
}
