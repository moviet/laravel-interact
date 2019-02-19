<?php

namespace App\Http\Controllers\USER\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\AddRequest;
use App\Observers\Repos\Approved as Acc;
use App\Observers\Repos\Groups As Friend;

class InteractController extends Controller
{
    //use Identicated;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Auth $auth, AddRequest $request, Friend $friend)
    {
        $approved = $friend->store($auth, $request);

        if ($approved) {
            (new Acc)->destroy($request, $auth);
        }

        return redirect()->back();
    }
}
