<?php

namespace App\Bubble\Core;

use App\Bubble\Core\Identicated;

trait Authorizm
{
    use Identicated;

    public function admin()
    {
        return intval(base64_decode(session($this->tokenId))); 
    }

    public function isUser()
    {
        return (session()->has($this->tokenId)) ? 'active' : 'inactive';
    }

    public function backToLogin()
    {
        return session()->flush();
    }

    public function getToken()
    {
        return session()->flash(
            $this->token, $this->uin()
        );
    }
}
