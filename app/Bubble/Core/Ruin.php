<?php

namespace App\Bubble\Core;

trait Ruin
{
    /**
     * Generate strip
     */
    protected $strip = '-';

     /**
     * Generate Numeric
     */
    protected $num = '12345678987654321';

    /**
     * Handle binary 
     */
    protected $length = '8bit';
    
    /**
     * Handle simple random integer
     *
     * @param  $length
     * @return int
     */
    public function randInt($length)
    {
        $value = '';

        for ($i = 0; $i < $length; $i++) {
             $value .= $this->num[random_int(0, $this->ruleMax())];
        }
        
        return $value;
    }

    /**
     * Handle length string
     *
     * @param  $length
     * @return int
     */
    protected function ruleMax()
    {
        return mb_strlen($this->num, $this->length) - 1;
    }

    /**
     * Generate numeric uuid
     *
     * @param  $length
     * @return mixed
     */
    public function uin()
    {
        return $this->randInt(4)
            .$this->strip
            .$this->randInt(6)
            .$this->strip
            .$this->randInt(4)
            .$this->strip
            .time();
    } 
}
