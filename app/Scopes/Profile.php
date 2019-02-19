<?php

namespace App\Scopes;

use App\Models\Network\Profile as ProScope;

class Profile
{
    public static function findById($profileId, int $id)
    {
        return ProScope::where($profileId, $id)->limit(1)->get();
    }

    public static function findByName($firstName, $lastName)
    {
        return ProScope::where('name', 'LIKE', "%$firstName%")->orWhere('name', 'LIKE', "%$lastName%")->get();
    }

    public static function findNotById($column, $id)
    {
        return ProScope::select('*')->whereNotIn($column, [$id])->limit(100)->get();
    }

    public static function findByLimitFriend()
    {
        return ProScope::select('*')->orderBy('created_at','DESC')->limit(6)->get();
    }

    public static function findByAll()
    {
        return ProScope::select('*')->orderBy('created_at','DESC')->limit(50)->get();
    }

    public static function findByAllName()
    {
        return ProScope::select('*')->orderBy('created_at','DESC')->limit(50)->get();
    }
}