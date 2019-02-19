<?php

namespace App\Observers\Repos;

use Illuminate\Support\Str;
use App\Bubble\Core\Identicated;
use App\Models\Network\Group as Friend;

class Groups
{
    use Identicated;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Redirect
     */
    public function store($auth, $data)
    {
        $data->authorize();

        return Friend::create([
            'id'       => $data->input('id'),
            'bridge'   => $auth::user()->uid,  
            'name'     => $data->input('name'),
            'adds'     => $auth::user()->name,
            'status'   => $this->react,
            'token'    => Str::uuid(),
            
        ], $data->validated());
    }
}
