<?php

namespace App\Http\Controllers\USER\Pages;

use App\Scopes\Profile;
use App\Bubble\Core\Ruin;
use App\Bubble\Core\UrlMap;
use App\Bubble\Core\Authorizm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SearchRequest;

class SearchProfileController extends Controller
{
    use Authorizm, UrlMap;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        $profile = Profile::findByAllName();

        return view('user.search', [
            'profile'   => $profile,
        ]);
    }

    /**
     * Store a new resource in storage.
     *
     * @param  App\Http\Requests\User\SearchRequest $request
     * @return \Illuminate\Http\View
     */
    public function store(SearchRequest $request)
    {
        $request->validated();

        $names = $request->input('name');

        $getName = explode(' ', $request->input('name'));

        if (empty($getName[1])) {
            $getName[1] = $getName[0];
        }

        $name = Profile::findByName($getName[0], $getName[1]);

        return view('user.search', [
            'name'     => $name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @var string $names
     * @return \Illuminate\Http\View
     */
    public function show($names)
    {
        if ($this->isUser() !== 'active') {
            $this->backToLogin();
            return redirect($this->pathLogin);
        }

        $valid = (!preg_match('/^[a-zA-Z0-9 ]*$/', urldecode($names))) ? 'invalid' : urldecode($names);

        $getName = explode(' ', $valid);

        if (empty($getName[1])) {
            $getName[1] = $getName[0];
        }

        $name = Profile::findByName($getName[0], $getName[1]);

        return view('user.search', [
            'name'     => $name,
        ]);
    }
}
