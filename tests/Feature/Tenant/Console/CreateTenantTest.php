<?php

namespace Tests\Feature\Tenant\Console;

use App\Libraries\Tenancy\Tenant;
use App\Models\User;
use Tests\TenantAwareTestCase;
use Tests\TestCase;
use Faker;

class CreateTenantTest extends TenantAwareTestCase
{
    public function xtestCreateTenant()
    {
        $user = factory(User::class)->create();
        $faker = Faker\Factory::create();
        $host = $faker->domainName;
        $tenant = Tenant::CreateTenant($user,$host);




    }
}
