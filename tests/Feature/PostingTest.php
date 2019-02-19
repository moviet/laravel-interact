<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Status\Posting;
use App\Bubble\Seeders\SeedRandom;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostingTest extends TestCase
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
    public function test_user_post_status_without_image()
    {
        $id = (new SeedRandom())->userSeedRuin();
        $user = factory(Posting::class)->create([   
            'id'   => $id,
            'status' => 'hello',
            'image' => null,
            'token' => 'test-test-test',   
        ]);
        
        $this->assertEquals($user->status, 'hello');
        $this->assertNull($user->image);
    }

    /**
     * A functional test.
     *
     * @return void
     */
    public function test_user_post_image_without_status()
    {
        $id = (new SeedRandom())->userSeedRuin();
        $user = factory(Posting::class)->create([   
            'id'   => $id,
            'status' => null,
            'image' => '/img/test.png',
            'token' => 'test-test-test',   
        ]);
        
        $this->assertEquals($user->image, '/img/test.png');
        $this->assertNull($user->status);
    }

    /**
     * A functional test.
     *
     * @return void
     */
    public function test_user_get_likes()
    {
        $id = (new SeedRandom())->userSeedRuin();
        $user = factory(Posting::class)->create([   
            'id'   => $id,
            'status' => null,
            'likes' => 5,
            'token' => 'test-test-test',   
        ]);
        
        $this->assertEquals($user->likes, 5);
    }

    public function user_auth_can_post_status()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => '123456789',     
        ]);

        $response = $this->post('/holiday', [
            'email' => $user->email,     
            'password' => '123456789',    
        ]);
       
        $response->assertStatus(200);
    }
}
