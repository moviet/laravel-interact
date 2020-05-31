<?php

namespace App\Observers\Repos;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Network\Profile As Cycles;

class Profile
{
    public function show()
    {
        return Cycles::where('id', Auth::user()->uid)->first();
    }

    public function store()
    {
        return Cycles::create([
            'id'       => Auth::user()->uid,
            'name'     => Auth::user()->name,
            'email'    => Auth::user()->email,
            'token'    => Str::uuid(),

        ]);
    }

    public function update($data, $image)
    {
        $data->authorize();

        $data->validated();

        return Cycles::where('id', Auth::user()->uid)
                ->limit(1)
                ->update([
                    'avatar' => $image,
        ]);
    }
}
