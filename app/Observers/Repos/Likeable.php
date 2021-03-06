<?php

namespace App\Observers\Repos;

use Illuminate\Support\Facades\Auth;
use App\Models\Status\Likeable As Like;

class Likeable
{
    public function show($request)
    {
        return Like::where('id', Auth::user()->uid)->where('token', $request->input('token'))->limit(1)->get();
    }

    public function store($data, $value)
    {
        $data->authorize();

        return Like::create([
            'id'       => (int) Auth::user()->uid,
            'bridge'   => (int) $data->input('id'),
            'status'   => (int) $value,
            'token'    => $data->input('token'),

        ], $data->validated());
    }

    public function update($data, $value)
    {
        $data->authorize();

        $data->validated();

        return Like::where('token', $data->input('token'))
                ->where('id', Auth::user()->uid)
                ->limit(1)
                ->update([
                    'status' => (int) $value,
        ]);
    }

    public function destroy($request)
    {
        return Like::where('id', Auth::user()->uid)->where('token', $request->input('token'))->limit(1)->delete();
    }
}
