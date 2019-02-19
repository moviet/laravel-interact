<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Network\Profile;
use App\Bubble\Seeders\SeedRandom;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * Setup contact instance
     */
    public function setup()
    {
        parent::setUp();
    }

    /**
     * A functional test.
     *
     * @return void
     */
    public function test_create_profile()
    {
        $dom = new SeedRandom;
        $uid = $dom->userSeedRuin();
        $token = $dom->profileSeedRuin();

        $this->profile = factory(Profile::class)->create([
            'id'    => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',
            'token' => $token,
        ]);

        $this->assertEquals($this->profile->token, $token);
    }

    public function user_auth_can_update_profile()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => '123456789',     
        ]);

        $response = $this->post('/photo/post', [
            'email' => $user->email,     
            'password' => '123456789',    
        ]);
       
        $response->assertStatus(200);
    }
}
