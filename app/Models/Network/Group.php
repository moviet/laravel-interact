<?php

namespace App\Models\Network;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'bridge', 'name', 'adds', 'status', 'token',
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
     * @return \models\profile\
     */
    public function profiles()
    {
        return $this->belongsTo('App\Models\Network\Profile');
    }

    /**
     * Get eloquent relationships
     *
     * @return \models\posting\
     */
    public function postings()
    {
        return $this->belongsTo('App\Models\Status\Posting');
    }
}
