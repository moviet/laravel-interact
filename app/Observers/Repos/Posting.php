<?php

namespace App\Observers\Repos;

use Illuminate\Support\Facades\Auth;
use App\Models\Status\Posting as Post;

class Posting
{
    public function authorized($id, $auth, $back)
    {
        if ($id !== Auth::user()->uid) {
            return $back;
        }

        return $back;
    }

    public function show($data)
    {
        return Post::where('token', $data)->limit(1)->first();
    }

    public function store($auth, $data, $image = null, $token)
    {
        $data->authorize();

        return Post::create([
            'id'     => Auth::User()->uid,
            'name'   => Auth::User()->name,
            'status' => $data->input('status'),
            'likes'  => null,
            'image'  => $image,
            'token'  => $token,         

        ], $data->validated());
    }

    public function destroy($id, $data)
    {
        return Post::where('id', $id)->where('token', $data)->limit(1)->delete();
    }

    public function update($data, $like)
    {
        $data->authorize();
        $data->validated();

        return Post::where('token', $data->input('token'))
                ->where('id', $data->input('id'))
                ->limit(1)
                ->update([
                    'likes' => $like,
        ]);
    }
}
