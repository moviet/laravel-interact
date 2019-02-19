<?php

namespace App\Scopes;

use App\Models\Status\Posting as Post;

class Posting
{
    public function findById($postId, int $id)
    {
        return Post::where($postId, $id)->get();
    }

    public static function findPostById(int $id)
    {
        return Post::where('id', $id)->orderBy('created_at','DESC')->limit(6)->get();
    }

    public static function findWithGroupId(int $id)
    {
        return Post::with('groupids')->find($id);
    }

    public static function findWithLikesId(int $id, int $status)
    {
        return Post::with('likes')->where('id', $id)->where('status', $status)->get();
    }

    public static function findIdByAll($id)
    {
        return Post::select('*')->where('id', $id)->orderBy('created_at','DESC')->limit(40)->get();
    }

    public function findByAll()
    {
        return Post::orderBy('created_at','DESC')->limit(30)->get();
    }	
}