<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function testCanAssignRoleToUser()
    {
        $user = factory(User::class)->create();
        $user->assignRole('admin');
        $this->assertTrue($user->hasRole('admin'));
    }

    public function testAdminPermissions()
    {
        $user = factory(User::class)->create();
        $user->assignRole('admin');
        $this->assertTrue($user->can('create user'));
        $this->assertTrue($user->can('edit user'));
        $this->assertTrue($user->can('delete user'));
    }



}
