<?php

namespace App\Bubble\Core;

use Carbon\Carbon;

/**
 * Generate trait helper date and time
 * 
 * @var string
 */	
trait DateParser
{ 	
    public function dateTime($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    public function toOneDay()
    {
        return date('j', strtotime($date));
    }

    public function toShortDay()
    {
        return date('D', strtotime($date));
    }

    public function toDay()
    {
        return date('d', strtotime($date));
    }

    public function toLongMonth()
    {
        return date('F', strtotime($date));
    }

    public function toShortMonth()
    {
        return date('M', strtotime($date));
    }

    public function toNumMonth()
    {
        return date('m', strtotime($date));
    }

    public function toTime()
    {
        return date('H:i:s', strtotime($date));
    }

    public function toClock()
    {
        return date('H:i', strtotime($date));
    }
}
