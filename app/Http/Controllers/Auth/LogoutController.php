<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Bubble\Core\Identicated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    use Identicated;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectPath = '/login';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gone(Request $request)
    {   
        $request->session()->flush();
 
        Auth::logout();

        return redirect($this->redirectPath);
    }
}
