<?php

namespace App\Scopes;

use App\Models\User as Users;

class User
{
    public static function findById($userId, int $id)
    {
        return Users::where($userId, $id)->limit(1)->get();
    }

    public static function findByEmail($email)
    {
        return Users::where('email', $email)->limit(1)->get();
    }

    public static function findByPassword($password)
    {
        return Users::where('password', $password)->limit(1)->get();
    }

    public static function findByAll()
    {
        return Users::select('*')->orderBy('created_at','DESC')->limit(30)->get();
    }
}