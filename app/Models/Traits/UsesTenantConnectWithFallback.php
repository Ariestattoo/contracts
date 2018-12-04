<?php

/*
 * This file is part of the hyn/multi-tenant package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://laravel-tenancy.com
 * @see https://github.com/hyn/multi-tenant
 */

namespace App\Models\Traits;

use Hyn\Tenancy\Database\Connection;
use Hyn\Tenancy\Traits\UsesTenantConnection;

trait UsesTenantConnectionWithFallback
{
    use UsesTenantConnection {
        UsesTenantConnection::getConnectionName as UsesTenantConnectionWithFallback;
    }

    public function getConnectionName()
    {
        return app(\Hyn\Tenancy\Environment::class)->tenant() ? app(Connection::class)->tenantName() : app(Connection::class)->systemName();
    }
}
