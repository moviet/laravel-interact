<?php

namespace App\Observers\Forks;

use App\Scopes\Profile as Users;
use App\Observers\Repos\Profile;
use App\Bubble\Core\Identicated;
use Illuminate\Support\Facades\Auth;

class Authenticable
{
    use Identicated;
    
    protected $redirectTo = 'home/';

    /**
     * Redirect if user login / register.
     *
     * @return App\Http\Redirect
     */
    public function setUser()
    {
        if (!count($this->profiler()) > 0) {
            $this->profiles();
        }

        session([
            $this->tokenId   => base64_encode($this->validate()),
        ]);
        
        return redirect($this->generate());
    }

    protected function profiles()
    {
        return (new Profile)->store();
    }

    protected function generate()
    {
        return $this->redirectTo . $this->validate();
    }

    protected function profiler()
    {
        return Users::findById($this->identify, $this->validate());
    }

    protected function validate()
    {
        return Auth::user()->uid;
    }
}
