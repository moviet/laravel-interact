<?php

namespace App\Bubble\Seeders;

use App\Bubble\Core\Ruin;

class SeedRandom
{
    use Ruin;

    /**
     * Auto generate random user id
     * for database seeder
     * 
     * @return int
     */
    public function userSeedRuin()
    {
        return $this->randInt(9);
    }

    /**
     * Auto generate random profile token
     * for database seeder
     * 
     * @return int
     */
    public function profileSeedRuin()
    {
        return $this->uin();
    }
}