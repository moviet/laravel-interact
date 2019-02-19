<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Bubble\Seeders\SeedRandom;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * Setup user instance
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
    public function test_register_user()
    {
        $uid = (new SeedRandom())->userSeedRuin();

        $this->user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',          
        ]);

        $this->assertEquals($this->user->email, 'moviet@interact1.com');
    }
}
