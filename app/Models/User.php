<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'name', 'email', 'id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Disable auto incrementing
     *
     * @return false
     */
    public $incrementing = false;

    /**
     * Change id to string
     *
     * @var string
     */
    public $keyType = 'string';
    
     /**
     * Get eloquent relationships
     *
     * @return \models\profile\
     */
    public function profiles()
    {
        return $this->hasMany('App\Models\Network\Profile','id');
    }
}
