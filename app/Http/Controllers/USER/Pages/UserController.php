<?php

namespace App\Http\Controllers\USER\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Observers\Forks\Authenticable;

class UserController
{
    /**
     * Display authenticated user.
     *
     * @param mixed $authenticate
     * @return App\Observers\Forks\Authenticable
     */
    public function index(Authenticable $authenticate)
    {
        return $authenticate->setUser();
    }

    /**
     * Display authenticated user.
     *
     * @return App\Http\Request
     */
    public function show(Request $request)
    {
        return $request->user();
    }
}
