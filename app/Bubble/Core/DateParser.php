<?php

namespace App\Bubble\Core;

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

    public function toOneDay($date)
    {
        return date('j', strtotime($date));
    }

    public function toShortDay($date)
    {
        return date('D', strtotime($date));
    }

    public function toDay($date)
    {
        return date('d', strtotime($date));
    }

    public function toLongMonth($date)
    {
        return date('F', strtotime($date));
    }

    public function toShortMonth($date)
    {
        return date('M', strtotime($date));
    }

    public function toNumMonth($date)
    {
        return date('m', strtotime($date));
    }

    public function toTime($date)
    {
        return date('H:i:s', strtotime($date));
    }

    public function toClock($date)
    {
        return date('H:i', strtotime($date));
    }
}
