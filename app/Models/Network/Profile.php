<?php

namespace App\Models\Network;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'token', 'desc', 'avatar',
    ];

    /**
     * Disable auto incrementing
     *
     * @return false
     */
    public $incrementing = false;

    /**
     * Get eloquent relationships
     *
     * @return \models\group\
     */
    public function tokens()
    {
        return $this->hasMany('App\Models\Network\Group','id');
    }

    /**
     * Get eloquent relationships
     *
     * @return \models\group\
     */
    public function bridges()
    {
        return $this->hasMany('App\Models\Network\Group','bridge');
    }

    /**
     * Get eloquent relationships
     *
     * @return \models\posting\
     */
    public function postings()
    {
        return $this->hasMany('App\Models\Status\Posting','id');
    }
}
