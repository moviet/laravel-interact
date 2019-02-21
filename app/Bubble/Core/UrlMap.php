<?php

namespace App\Bubble\Core;

use Illuminate\Support\Facades\Auth;

trait UrlMap
{
    /**
     * Get url home
     *
     * @var string
     */
    protected $pathHome = '/home/';

    /**
     * Get url user
     *
     * @var string
     */
    protected $pathUser = '/user/';

    /**
     * Get url user
     *
     * @var string
     */
    protected $pathLogin = '/login';

    /**
     * Get url user
     *
     * @var string
     */
    protected $pathSearch = '/search';

    /**
     * Redirect If user explores restrict routes 
     * 
     * @var $id 
     * @var $auth
     * @return App\Http\Redirect
     */
    protected function backToHome()
    {
        return redirect($this->pathHome . Auth::user()->uid);
    }

    /**
     * Redirect If user explores restrict routes 
     * 
     * @var $id 
     * @var $auth
     * @return App\Http\Redirect
     */
    protected function backToUser()
    {
        return redirect($this->pathUser . Auth::user()->uid);
    }
}
