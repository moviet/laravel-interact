<?php

namespace App\Http\Resources;

use App\Bubble\Core\DateParser as SimpleParser;
use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{
    use SimpleParser;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'division'  => $this->division,
            'message'   => $this->message,
            'token'     => $this->token,
            'posted_at' => $this->dateTime($this->posted_at),
            'ip'        => $this->ip,
        ];
    }
}
