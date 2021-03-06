<?php

namespace App\Scopes;

use App\Models\Status\Likeable as Like;

class Likeable
{
    public function findUserLikes(int $id, $token)
    {
        return Like::with('postings')
                ->where('id', $id)
                ->where('token', $token)
                ->get();
    }

    public function findUserOnLikes(int $id, $bridge, $status, $token)
    {
        return Like::with('postings')
                ->where('id', $id)
                ->OrWhere('bridge', $bridge)
                ->where('status', $status)
                ->where('token', $token)
                ->get();
    }

 
    public function findAllLikes(int $counts, $token)
    {
        return Like::where('status', $counts)->where('token', $token)->get();
    }

    public function findUserToken($token)
    {
        return Like::where('id', Auth::user()->uid)->where('token', $token)->get();
    }

    public function findWithLikesAll()
    {
        return Like::with('postings')->get();
    }

    public function destroy($data)
    {
        return Like::where('token', $data)->delete();
    }
}