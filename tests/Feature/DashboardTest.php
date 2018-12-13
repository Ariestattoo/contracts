<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{

    public function testAuthenticatedUserCanAccessDashboard()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertOk();

    }

    public function testUnauthenticatedUserCantAccessDashboard()
    {
        $user = factory(User::class)->create();
        $response = $this->get('/dashboard');
        $response->assertRedirect(route('login'));

    }
}
