<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Bubble\Seeders\SeedRandom;
use App\Models\Status\Likeable as Like;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeableTest extends TestCase
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
    public function test_user_and_like_any_user_different_true_id()
    {
        $id = (new SeedRandom())->userSeedRuin();
        $bridge = (new SeedRandom())->userSeedRuin();
        $user = factory(Like::class)->create([   
            'id'   => $id,
            'bridge' => $bridge,
            'status' => 1,
            'token' => 'test-test-test',   
        ]);
        
        $this->assertNotEquals($user->id, $user->bridge);

        if ($user->status == 1) {
            $like = true;
        }

        $this->assertTrue($like);
    }

    /**
     * A functional test.
     *
     * @return void
     */
    public function test_user_and_like_or_not()
    {
        $id = (new SeedRandom())->userSeedRuin();
        $bridge = (new SeedRandom())->userSeedRuin();
        $user = factory(Like::class)->create([   
            'id'   => $id,
            'bridge' => $bridge,
            'status' => 1,
            'token' => 'test-test-test',   
        ]);

        if ($user->status == 1) {
            $like = true;
        
        } 
        
        if ($user->status !== 0) {
            $unlike = false;
        }

        $this->assertTrue($like);
        $this->assertFalse($unlike);
    }

    public function user_auth_can_like_status()
    {
        $uid = (new SeedRandom())->userSeedRuin();
        $user = factory(User::class)->create([   
            'uid'   => $uid,
            'name'  => 'moviet interact',
            'email' => 'moviet@interact1.com',     
            'password' => '123456789',     
        ]);

        $response = $this->post('/post/reflect', [
            'email' => $user->email,     
            'password' => '123456789',    
        ]);
       
        $response->assertStatus(200);
    }
}
