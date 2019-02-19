<?php

namespace App\Bubble\Seeders;

trait SeedNames
{
    protected $mail = '@int.com';

    /**
     * Create a new bubble traits instance.
     *
     * @return void
     */
    public function generate()
    {
        return [
            'tony stark', 
            'hulk', 
            'thor', 
            'mark zuckerberg', 
            'bill gates', 
            'larry page', 
            'loki',
            'wonder woman', 
            'thanos', 
            'bilbo baggin', 
            'gal gadot', 
            'superman',
        ];
    }
}