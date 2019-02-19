<?php

namespace App\Scopes;

use App\Models\Status\Likeable as Like;

class Likeable
{
    public function findUserLikes(int $id, $status, $token)
    {
        return Like::with('postings')
                ->where('id', $id)
                ->where('status', $status)
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

    public function findAllDislikes()
    {
        return Like::with('postings')->where('dislikes', 2)->get();
    }


    /*
    public function findWithLikes(int $id, int $bridge, $status)
    {
        return Like::with('postings')->whereNotIn('id', [$id])
                ->whereNotIn('bridge', [$bridge])
                ->where('status', $status)
                ->get();
    }

    public function findWithUserLikes(int $id, $bridge, $status)
    {
        return Like::with('postings')->where('id', $id)
                ->whereNotIn('bridge', [$bridge])
                ->where('status', $status)
                ->get();
    }

    public function findWithUserNotLikes(int $id, int $bridge, $status)
    {
        return Like::with('postings')->where('id', $id)
                ->whereNotIn('bridge', [$bridge])
                ->where('status', $status)
                ->get();
    }	

    public function findWithUserAdminLikes(int $bridge, $status)
    {
        return Like::with('postings')
                ->whereIn('bridge', [$bridge])
                ->where('status', $status)
                ->get();
    }
    */

    public function findUserToken($token)
    {
        return Like::where('id', Auth::user()->uid)->where('token', $token)->get();
    }

    public function findWithLikesAll()
    {
        return Like::with('postings')->get();
    }
}