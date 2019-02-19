<?php

namespace App\Http\Resources;

use App\Bubble\Core\DateParser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    use DateParser;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uid'               => Auth::user()->uid,
            'name'              => Auth::user()->name,
            'email'             => Auth::user()->email,
            'email_verified_at' => $this->dateTime(Auth::user()->email_verified_at),
            'id'                => Auth::user()->id,
            'password'          => Auth::user()->password,
            'created_at'        => $this->dateTime(Auth::user()->created_at),
            'updated_at'        => $this->dateTime(Auth::user()->updated_at),
        ];
    }
}
