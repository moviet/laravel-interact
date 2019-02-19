<?php

use Illuminate\Database\Seeder;
use App\Bubble\Seeders\SeedNames;
use App\Bubble\Seeders\SeedRandom;

class UsersTableSeeder extends Seeder
{ 
    /**
     * Create traits list names
     */
    use SeedNames;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->generate() as $key=>$name) {
            $names = explode(' ', $name);
            $email[$key] = $names[0].$this->mail;
            $dom = new SeedRandom;
            $uid = $dom->userSeedRuin();
            $token = $dom->profileSeedRuin();
        
            $user = factory(App\Models\User::class)->create([   
                'uid'   => $uid,
                'name'  => $name,
                'email' => $email[$key],               
            ]); 

            $profile = factory(App\Models\Network\Profile::class)->create([
                'id'    => $uid,
                'name'  => $name,
                'email' => $email[$key],
                'token' => $token,
            ]);
        }   
    }
}
