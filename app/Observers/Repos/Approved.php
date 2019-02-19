<?php

namespace App\Observers\Repos;

use Illuminate\Support\Str;
use App\Models\Network\Approved As Acc;

class Approved
{
    public function store($auth, $request)
    {
        $request->authorize();

        return Acc::create([
            'id'    => $auth::user()->uid,
            'bridge'=> $request->input('id'),
            'name'  => $auth::user()->name,
            'adds'  => $request->input('name'),
            'token' => Str::uuid(),

        ], $request->validated());
    }

    public static function destroy($id, $auth)
    {
        return Acc::where('id', $id->input('id'))->where('bridge', $auth::user()->uid)->limit(1)->delete();
    }
}
