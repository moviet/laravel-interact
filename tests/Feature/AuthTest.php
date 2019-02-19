<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Bubble\Seeders\SeedRandom;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
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
    public function test_login_with_wrong_passsword()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $this->user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => bcrypt('laravel-interact'),     
        ]);
        
        $response = $this->from('/login')->post('/login', [
            'email' => $this->user->email,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_login()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => '123456789',     
        ]);

        $response = $this->from('/home')->post('/login', [
            'email' => $user->email,     
            'password' => '123456789',    
        ]);
       
        $response->assertRedirect('/home');
    }

    public function test_user_logout()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => '123456789',     
        ]);

        $response = $this->from('/login')->get('/logout', [
            'email' => $user->email,     
            'password' => $user->password,     
        ]);
       
        $response->assertRedirect('/login');
    }

    public function test_user_enter_dashboard_must_be_login()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $user = factory(User::class)->create([   
            'uid'   => $uid,
            'email_verified_at' => null,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => '123456789',     
        ]);

        $response = $this->get('/home', [
            'email' => $user->email,     
            'password' => $user->password,     
        ]);
       
        $response->assertRedirect('/login');
    }
}
