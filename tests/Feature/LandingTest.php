<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLandingAuthenticatedUser()
    {
        $user = factory(User::class)->create();
        $response = $this->get('/');
        $response->assertOk();


    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLandingUnauthenticatedUser()
    {
        $response = $this->get('/');
        $response->assertOk();
    }
}
