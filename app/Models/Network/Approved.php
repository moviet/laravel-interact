<?php

namespace App\Models\Network;

use Illuminate\Database\Eloquent\Model;

class Approved extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'bridge', 'name', 'adds', 'token', 
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
}
