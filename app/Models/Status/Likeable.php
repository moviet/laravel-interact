<?php

namespace App\Models\Status;

use Illuminate\Database\Eloquent\Model;

class Likeable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'bridge', 'status', 'token',
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
    public function postings()
    {
        return $this->belongsTo('App\Models\Status\Posting','id');
    }
}
