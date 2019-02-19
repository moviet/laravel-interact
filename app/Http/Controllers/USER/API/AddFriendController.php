<?php

namespace App\Http\Controllers\USER\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\AddRequest;
use App\Observers\Repos\Approved as Acc;

class AddFriendController extends Controller
{
    /**
     * Limiting Access Query
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Support\Facades\Auth $auth
     * @param  App\Http\Requests\User\AddRequest $request
     * @param  App\Observers\Repos\Acc $acc
     * @return \Illuminate\Http\Redirect
     */
    public function store(Auth $auth, AddRequest $request, Acc $acc)
    {
        $saved = $acc->store($auth, $request);

        return redirect()->back();
    }
}
