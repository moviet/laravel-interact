<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Contact;
use App\Bubble\Seeders\SeedRandom;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
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
     * Test contact form insertion to DB
     *
     * @return void
     */
    public function test_route_contact()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    /**
     * Test contact form insertion to DB
     *
     * @return void
     */
    public function test_insert_contact_form_data()
    {
        $id = (new SeedRandom())->userSeedRuin();
        $contact = factory(Contact::class)->create([
            'id' => $id, 
            'posted_at' => Carbon::now(),
            'ip' => request()->ip(), 
        ]);

        $this->assertDatabaseHas('contacts', [
            'id' => $id,
            'name' => 'Contact Testing',
            'email' => 'moviet@simply-interact.com',
            'division' => 'Customer Service',
            'token' => 'abcdefgh-ijkl-yayayay-yayaya',
            'message'  => 'Helloow, This is just test',
            'posted_at' => Carbon::now(),
            'ip'  => request()->ip(), 
        ]);
    }
}
