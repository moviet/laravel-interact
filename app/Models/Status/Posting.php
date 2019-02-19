<?php

namespace App\Models\Status;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'status', 'token', 'likes', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'capture', 'remember_token',
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
     * Change primary key
     *
     * @var string
     */
    protected $primaryKey = 'token'; 

    /**
     * Get eloquent relationships
     *
     * @return \models\group\
     */
    public function groupids()
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
     * @return \models\group\
     */
    public function likes()
    {
        return $this->hasMany('App\Models\Status\Likeable','id');
    }
}
